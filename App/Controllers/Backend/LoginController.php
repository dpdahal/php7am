<?php


namespace Application\App\Controllers\Backend;

use Application\App\model\User;
use Application\system\Input;
use Application\system\Session;
use Application\system\Token;
use Application\system\Validation;

class LoginController extends BackendController
{
    protected $_backendPath = 'Backend';

    protected $validation;

    private $_users;

    public function __construct()
    {
        parent::__construct();
        $this->validation = new Validation();

        $this->_users = new User();

    }

    public function index()
    {
        $this->data('title', $this->makeTitle('login'));
        $this->data('pages', 'login/index.php');
        return view($this->_backendPath . '/login/index.php');

    }


    public function login()
    {

        $tokenValue = Input::post('_token');
        if (!Token::check($tokenValue)) return redirect()->back();

        $validationRules = [
            'username' => 'required',
            'password' => 'required'

        ];

        $this->validation->validation($validationRules);
        if (!$this->validation->isValid()) {
            Session::put('errorsMessages', $this->validation->getErrors());
            return redirect()->back();
        }

        $userName = Input::post('username');
        $password = Input::post('password');
        $rememberMe = Input::post('remember');

        $this->_users->isLogin(['username' => $userName, 'password' => $password], $rememberMe);


    }


    public function logout()
    {

        $this->_users->AuthLogout();

        return redirect()->to('@admin/login');

    }
}