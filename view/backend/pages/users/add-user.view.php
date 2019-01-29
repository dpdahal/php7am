<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add User</h2>
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
                                <?= errorMessage();  ?>
                                <form action="<?= admin_url('add-user') ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="enter your name" id="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" class="form-control"
                                                       placeholder="enter your username" id="username">
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group form-group-sm">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control"
                                                       placeholder="enter your email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm">
                                                <label for="privilege">Select Privilege</label>
                                                <select name="privilege[]" id="privilege_id" multiple
                                                        class="form-control">
                                                    <?php foreach ($privilegeData as $privilege) : ?>
                                                        <option value="<?= $privilege->id ?>"><?= $privilege->privilege_name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                       placeholder="enter your password" id="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm">
                                                <label for="password_confirmation">Password Confirm</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                       placeholder="enter your password confirmation"
                                                       id="password_confirmation">
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-sm">
                                                <label for="change_image">Profile Picture</label>
                                                <input type="file" name="upload" id="change_image"
                                                       class="btn btn-default btn-sm">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="" id="target_image" alt="" width="30" class="pull-left">
                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group form-group-sm">
                                                <button class="btn btn-success">Add User</button>

                                            </div>

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
<!-- /page content -->
