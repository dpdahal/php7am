<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-eye"></i> Show Slider</h2>
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
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S.n</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($sliderData as $key => $slider) : ?>
                                        <tr>
                                            <td><?= ++$key; ?></td>
                                            <td><?= $slider->title; ?></td>
                                            <td>
                                                <form action="<?= admin_url('update-user-status') ?>"
                                                      method="post">
                                                    <input type="hidden" name="criteria"
                                                           value="<?= $slider->id ?>">
                                                    <?php if ($slider->status == 1) : ?>
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
                                            <td>
                                                <img src="<?= url('lib/uploads/sliders/' . $slider->image); ?>" alt=""
                                                     width="30">
                                            </td>
                                            <td>
                                                <a href="<?= admin_url('edit-user' . '?criteria=' . $slider->u_id) ?>" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a> <a href="<?= admin_url('delete-user' . '?criteria=' . $slider->u_id) ?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
