<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-dashboard"></i> Dashboard</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <a href="<?= admin_url('manage-privilege') ?>">
                                <div class="col-md-3">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-lock"></i></div>
                                        <div class="count"><?= $privilegeData ?></div>
                                        <p>Total Privilege</p>
                                    </div>
                                </div>
                            </a>

                            <a href="<?= admin_url('users') ?>">
                                <div class="col-md-3">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-users"></i></div>
                                        <div class="count"><?= $usersData ?></div>
                                        <p>Total Users</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



