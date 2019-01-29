<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-plus"></i> Add Slider</h2>
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
                                <form action="<?= admin_url('add-slider') ?>" method="post" enctype="multipart/form-data">

                                    <div class="form-group form-group-sm">
                                        <label for="title">Title</label>
                                        <textarea  name="title" class="form-control" id="title" style="resize: none;"></textarea>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="image">Image </label>
                                        <input type="file" name="upload" id="image"
                                               class="btn btn-default btn-sm">

                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description-text-area"></textarea>
                                    </div>


                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Slider</button>

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
