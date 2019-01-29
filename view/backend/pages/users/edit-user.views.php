<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-edit"></i> Update User</h2>
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
                            <div class="col-md-12">
                                <?= message(); ?>
                                <?= errorMessage(); ?>
                                <?php $getToken = _token(); ?>

                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="<?= admin_url('edit-user') ?>" method="post"
                                              enctype="multipart/form-data">
                                            <?=$getToken ?>
                                            <input type="hidden" name="criteria" value="<?= $userData->u_id ?>">

                                            <div class="form-group form-group-sm">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="<?= $userData->name ?>"
                                                       class="form-control"
                                                       placeholder="enter your name" id="name">
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" value="<?= $userData->username ?>"
                                                       class="form-control"
                                                       placeholder="enter your username" id="username">
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" value="<?= $userData->email ?>"
                                                       class="form-control"
                                                       placeholder="enter your email" id="email">
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <label for="change_image">Profile Picture</label>
                                                <input type="file" name="upload" id="change_image"
                                                       class="btn btn-default btn-sm">

                                            </div>
                                            <div class="form-group form-group-sm">
                                                <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit
                                                    User
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?= url('lib/uploads/users/' . $userData->image) ?>" id="target_image"
                                             alt="" class="img-responsive thumbnail" style="margin-top: 23px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <div class="row">
                                    <form action="<?= admin_url('update-user-password') ?>" method="post">
                                        <?=$getToken?>
                                        <input type="hidden" name="criteria" value="<?= $userData->u_id ?>">
                                        <div class="col-md-4">
                                            <div class="form-group form-group-sm">
                                                <label for="old_password">Old Password</label>
                                                <input type="password" name="old_password" class="form-control"
                                                       placeholder="enter your password" id="old_password">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-sm">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                       placeholder="enter your password" id="password">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-sm">
                                                <label for="password_confirmation">Password Confirm</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                       placeholder="enter your password confirmation"
                                                       id="password_confirmation">
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-lock"></i> Change Password
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

