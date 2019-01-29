<?php


namespace Application\App\Controllers\Backend;

use Application\App\model\Privilege;
use Application\system\Input;
use Application\system\Request;
use Application\system\Session;
use Application\system\Token;
use Application\system\Validation;

/**
 * Class PrivilegeController
 * @package Application\App\Controllers\Backend
 */
class PrivilegeController extends BackendController
{
    /**
     * @var Privilege
     */

    protected $privilegeObject;

    /**
     * PrivilegeController constructor.
     *
     *
     */

    protected $validation;

    public function __construct()
    {
        parent::__construct();

        $this->privilegeObject = new Privilege();

        $this->validation = new Validation();
    }

    /**
     * @return bool
     */
    public function index()
    {
        $this->data('title', $this->makeTitle('Privilege'));
        $this->data('pages', 'privilege/manage-privilege.views.php');
        $this->data('privilegeData', $this->privilegeObject->Select());
        return view($this->_backendPath, $this->data);
    }

    /**
     * @return \Application\system\Redirect|bool
     */

    public function createPrivilege()
    {
        $tokenValue = Input::post('_token');
        if (!Token::check($tokenValue)) return redirect()->back();

        $validationRules = [
            'privilege_name' => 'required|min:3|max:10|unique:tbl_privilege,privilege_name'

        ];

        $this->validation->validation($validationRules);
        if (!$this->validation->isValid()) {
            Session::put('errorsMessages', $this->validation->getErrors());
            return redirect()->back();
        }
        $data['privilege_name'] = Input::post('privilege_name');
        try {
            $result = $this->privilegeObject->Insert($data);
            if ($result) {
                $_SESSION['success'] = 'Privilege was created';
                redirect()->to('admin/manage-privilege');
            }
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }


        return false;

    }

    /**
     * @return bool
     */
    public function deletePrivilege()
    {
        $criteriaValue = Input::get('criteria');
        if (empty($criteriaValue) || !(int)$criteriaValue) return redirect()->to('admin/manage-privilege');
        try {
            $result = $this->privilegeObject->Delete($criteriaValue);

            if ($result) {
                $_SESSION['success'] = 'Privilege was deleted';
                redirect()->to('admin/manage-privilege');
            }

        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

        return false;


    }

    public function deleteAllPrivilege()
    {
        $criteriaValue = $_POST['criteria'];
        if (empty($criteriaValue) || !(int)$criteriaValue) return redirect()->to('admin/manage-privilege');
        if (!Request::method('post')) redirect()->to('admin/manage-privilege');
        if (!isset($_POST['delete'])) {
            redirect()->to('admin/manage-privilege');
        }

        $increment = 0;
        $totalId = count($criteriaValue);

        foreach ($criteriaValue as $id) {
            $this->privilegeObject->Delete($id);
            $increment++;
        }

        if ($totalId == $increment) {
            $_SESSION['success'] = 'Privilege was successfully deleted';
            redirect()->to('admin/manage-privilege');
        }

        return redirect()->back();

    }

    /**
     * @return bool
     */
    public function editPrivilege()
    {
        $criteriaValue = Input::get('criteria');
        if (empty($criteriaValue) || !(int)$criteriaValue) return redirect()->to('admin/manage-privilege');
        $this->data('title', $this->makeTitle('edit privilege'));
        $result = $this->privilegeObject->SelectBy($criteriaValue);
        $this->data('privilegeData', $result);
        $this->data('pages', 'privilege/edit-privilege.views.php');
        return view($this->_backendPath, $this->data);
    }

    /**
     * edit privilege
     */
    public function editPrivilegeAction()
    {
        if (!Request::method('post')) redirect()->to('admin/manage-privilege');
        $criteriaValue = Input::post('criteria');
        $validationRules = [
            'privilege_name' => 'required|min:3|max:10|unique:tbl_privilege,privilege_name,id:' . $criteriaValue

        ];

        $this->validation->validation($validationRules);
        if (!$this->validation->isValid()) {
            Session::put('errorsMessages', $this->validation->getErrors());
            return redirect()->back();
        }
        $data['privilege_name'] = Input::post('privilege_name');
        $result = $this->privilegeObject->Update($data, $criteriaValue);
        if ($result) {
            $_SESSION['success'] = 'Privilege was updated';
            redirect()->to('admin/manage-privilege');
        }

    }

    /**
     * update privilege
     */
    public function updatePrivilegeStatus()
    {
        if (!Request::method('post')) redirect()->to('admin/manage-privilege');
        $criteria = Input::post('criteria');
        if (isset($_POST['active'])) {
            $data['status'] = 0;
            $message = 'Status was inactive';
        }
        if (isset($_POST['inactive'])) {
            $data['status'] = 1;
            $message = 'Status was active';
        }

        $result = $this->privilegeObject->Update($data, $criteria);
        if ($result) {
            $_SESSION['success'] = $message;
            redirect()->to('admin/manage-privilege');
        }
    }


    public function getPrivilege()
    {

        return $this->privilegeObject->Select();
    }


    public function totalData()
    {

        return $this->privilegeObject->count();
    }
}