<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage Privilege</h2>
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
                                <?= errorMessage(); ?>
                                <?= message(); ?>
                                <form action="<?= admin_url('manage-privilege') ?>" method="post">
                                    <?= _token(); ?>
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 0;">
                                            <div class="form-group form-group-sm">
                                                <input type="text" name="privilege_name"
                                                       placeholder="enter privilege name"
                                                       class="form-control"></div>
                                        </div>
                                        <div class="col-md-6" style="padding-left: 1px;">
                                            <div class="form-group form-group-sm">
                                                <button class="btn btn-success btn-sm">Created Privilege</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <form action="<?= admin_url('delete-all-privilege') ?>" method="post">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="3%"><input type="checkbox" id="select_all"></th>
                                            <th width="5%">S.n</th>
                                            <th>Privilege Name</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($privilegeData as $key => $privilege) : ?>
                                            <tr>
                                                <td><input type="checkbox" name="criteria[]"
                                                           value="<?= $privilege->id ?>" class="checkbox"></td>
                                                <td><?= ++$key ?></td>
                                                <td><?= ucfirst($privilege->privilege_name) ?></td>
                                                <td>
                                                    <form action="<?= admin_url('update-privilege-status') ?>"
                                                          method="post">
                                                        <input type="hidden" name="criteria"
                                                               value="<?= $privilege->id ?>">
                                                        <?php if ($privilege->status == 1) : ?>
                                                            <button name="active" class="btn btn-success btn-xs"><i
                                                                        class="fa fa-check"></i>
                                                            </button>

                                                        <?php else: ?>
                                                            <button name="inactive" class="btn btn-warning btn-xs"><i
                                                                        class="fa fa-times"></i>
                                                            </button>

                                                        <?php endif; ?>
                                                    </form>
                                                </td>
                                                <td><?= diffForHumans($privilege->created_at) ?></td>
                                                <td>
                                                    <a href="<?= admin_url('edit-privilege?criteria=' . $privilege->id) ?>"
                                                       class="btn btn-success btn-xs">
                                                        <i class="fa fa-edit"></i> Edit</a>
                                                    <a href="<?= admin_url('delete-privilege' . '?criteria=' . $privilege->id) ?>"
                                                       class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                    <button class="btn btn-danger btn-xs" name="delete" id="my_button">
                                        <i class="fa fa-trash"></i>Delete All
                                    </button>
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
