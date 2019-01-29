<?php


namespace Application\App\Controllers\Backend;


class DashboardController extends BackendController
{

    public function index()
    {
        $obj = new PrivilegeController();
        $objUser = new UserController();
        $this->data('privilegeData', $obj->totalData());
        $this->data('usersData', $objUser->totalData());
        $this->data('title', $this->makeTitle('Dashboard'));
        $this->data('pages', 'dashboard/dashboard.view.php');
        return view($this->_backendPath, $this->data);
    }

}