<?php


namespace Application\App\Controllers\Backend;


use Application\App\model\Privilege;
use Application\App\model\User;
use Application\system\Database;
use Application\system\Hash;
use Application\system\Input;
use Application\system\Mail;
use Application\system\Request;
use Application\system\Session;
use Application\system\Token;
use Application\system\UploadFile;
use Application\system\Validation;

class UserController extends BackendController
{
    private $_users;

    private $_validation;

    private $_upload;

    public function __construct()
    {
        parent::__construct();
        $this->_users = new User();

        $this->_validation = new Validation();

        $this->_upload = new UploadFile();
    }


    public function index()
    {
        $db = Database::Instance();

        $result = $db->CustomQuery("SELECT tbl_users.*,GROUP_CONCAT(tbl_privilege.privilege_name SEPARATOR ',')as privilege FROM tbl_users 
                                LEFT JOIN tbl_manage_privilege ON tbl_users.u_id=tbl_manage_privilege.user_id
                                LEFT JOIN tbl_privilege ON tbl_manage_privilege.privilege_id=tbl_privilege.id
                                GROUP BY tbl_manage_privilege.user_id");

        $this->data('userData', $result);
        $this->data('title', $this->makeTitle('users'));
        $this->data('pages', 'users/show-users.view.php');
        return view($this->_backendPath, $this->data);

    }

    public function addUser()
    {
        $obj = new PrivilegeController();
        $privilege = $obj->getPrivilege();
        $this->data('privilegeData', $privilege);
        $this->data('title', $this->makeTitle('users'));
        $this->data('pages', 'users/add-user.view.php');
        return view($this->_backendPath, $this->data);

    }

    /**
     * @return \Application\system\Redirect|bool
     */

    public function addUserAction()
    {
        $rules = [
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:10|unique:tbl_users,username',
            'email' => 'required|email|unique:tbl_users,email',
            'password' => 'required|min:5|max:20',
            'password_confirmation' => 'required|matches:password',
            'upload' => 'required|mimes:jpeg,jpg,gif,png'

        ];

        $this->_validation->validation($rules);

        if (!$this->_validation->isValid()) {
            Session::put('errorsMessages', $this->_validation->getErrors());
            return redirect()->back();
        }
        $data['name'] = Input::post('name');
        $data['username'] = Input::post('username');
        $data['email'] = Input::post('email');
        $data['password'] = Hash::make(Input::post('password'));


        if ($this->_upload->check('upload')) {
            $ext = $this->_upload->getExt();
            $imageName = string_hash() . '.' . $ext;
            $uploadPath = public_path('lib/uploads/users');
            if ($this->_upload->move($uploadPath . '/' . $imageName)) {
                $data['image'] = $imageName;
            }
        }

        $privilegeId = $_POST['privilege'];
        $increment = 0;
        $totalIds = count($privilegeId);

        try {

            $lastInsetId = $this->_users->Insert($data);
            foreach ($privilegeId as $id) {
                $priData['user_id'] = $lastInsetId;
                $priData['privilege_id'] = $id;
                $db = Database::Instance();
                $result = $db->Insert('tbl_manage_privilege', $priData);
                if ($result) {
                    $increment++;
                }

            }
            if ($totalIds == $increment) {
                $_SESSION['success'] = "User was successfully inserted";
                redirect()->to('admin/users');
            }


        } catch (\PDOException $exception) {
            throw new \PDOException('There was a problems');
        }


    }


    public function totalData()
    {

        return $this->_users->count();
    }

    public function updateUsersStatus()
    {
        if (!Request::method('post')) redirect()->to('admin/users');
        $criteria = Input::post('criteria');
        if (isset($_POST['active'])) {
            $data['status'] = 0;
            $message = 'Status was inactive';
        }
        if (isset($_POST['inactive'])) {
            $data['status'] = 1;
            $message = 'Status was active';
        }

        $result = $this->_users->Update($data, $criteria);
        if ($result) {
            $_SESSION['success'] = $message;
            redirect()->to('admin/users');
        }
    }

    public function deleteFile($criteria)
    {
        $id = $criteria;
        $findData = $this->_users->getSingle('u_id', $id);
        $fileName = $findData->image;
        $removePath = public_path('lib/uploads/users/' . $fileName);
        if (file_exists($removePath) && is_file($removePath)) {
            return unlink($removePath);
        }

        return true;

    }

    public function deleteUser()
    {
        $criteriaValue = Input::get('criteria');
        if (empty($criteriaValue) || !(int)$criteriaValue) return redirect()->to('admin/users');
        $db = Database::Instance();
        $db->Delete('tbl_manage_privilege', 'user_id', array($criteriaValue));
        if ($this->deleteFile($criteriaValue) && $this->_users->Delete($criteriaValue)) {
            $_SESSION['success'] = "User was deleted";
            return redirect()->to('admin/users');

        }

        return false;

    }

    public function editUser()
    {
        $criteriaValue = Input::get('criteria');
        if (empty($criteriaValue) || !(int)$criteriaValue) return redirect()->to('admin/users');
        $this->data('title', $this->makeTitle('edit user'));
        $result = $this->_users->SelectBy($criteriaValue);
        $this->data('userData', $result);
        $this->data('pages', 'users/edit-user.views.php');
        return view($this->_backendPath, $this->data);
    }

    public function editUserAction()
    {
        $tokenValue = Input::post('_token');
        if (!Token::check($tokenValue)) return redirect()->back();
        $criteria = Input::post('criteria');
        $rules = [
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:10|unique:tbl_users,username,u_id:' . $criteria,
            'email' => 'required|email|unique:tbl_users,email,u_id:' . $criteria,
            'upload' => 'mimes:jpeg,jpg,gif,png'

        ];

        $this->_validation->validation($rules);

        if (!$this->_validation->isValid()) {
            Session::put('errorsMessages', $this->_validation->getErrors());
            return redirect()->back();
        }

        $data['name'] = Input::post('name');
        $data['username'] = Input::post('username');
        $data['email'] = Input::post('email');

        if ($this->_upload->check('upload')) {
            $ext = $this->_upload->getExt();
            $imageName = string_hash() . '.' . $ext;
            $uploadPath = public_path('lib/uploads/users');
            if ($this->deleteFile($criteria) && $this->_upload->move($uploadPath . '/' . $imageName)) {
                $data['image'] = $imageName;
            }
        }


        try {

            if ($this->_users->Update($data, $criteria)) {
                $_SESSION['success'] = "User was successfully updated";
                redirect()->to('admin/users');
            }


        } catch (\PDOException $exception) {
            throw new \PDOException('There was a problems');
        }


    }


    public function updatePassword()
    {
        if (!Request::method('post')) redirect()->to('admin/users');
        $tokenValue = Input::post('_token');
        if (!Token::check($tokenValue)) return redirect()->back();
        $criteria = Input::post('criteria');
        $rules = [
            'old_password' => 'required',
            'password' => 'required|min:5|max:20',
            'password_confirmation' => 'required|matches:password',

        ];

        $this->_validation->validation($rules);

        if (!$this->_validation->isValid()) {
            Session::put('errorsMessages', $this->_validation->getErrors());
            return redirect()->back();
        }

        $oldPassword = Input::post('old_password');
        $findData = $this->_users->getSingle('u_id', $criteria);
        $oldHashPassword = $findData->password;
        if (Hash::check($oldPassword, $oldHashPassword)) {
            $data['password'] =Hash::make(Input::post('password'));
            if ($this->_users->Update($data, $criteria)) {
                $_SESSION['success'] = "Password was successfully updated";
                return redirect()->to('admin/users');
            }
        } else {
            $_SESSION['error'] = "Old Password not match";
            return redirect()->back();
        }


        return false;
    }

}