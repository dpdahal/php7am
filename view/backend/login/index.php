<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="<?= url('backend/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') ?>"
          rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= url('backend/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') ?>"
          rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= url('backend/bower_components/gentelella/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?= url('backend/bower_components/gentelella/vendors/google-code-prettify/bin/prettify.min.css') ?>"
          rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="<?= url('backend/bower_components/gentelella/vendors/select2/dist/css/select2.min.css') ?>"
          rel="stylesheet">
    <link href="<?= url('backend/bower_components/gentelella/build/css/custom.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('backend/custom/custom.css') ?>">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="<?= url('@admin/login') ?>" method="post">
                    <?= _token() ?>
                    <h1>Login Form</h1>
                    <div class="form-group form-group-sm">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group form-group-sm">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="pull-left" for="remember">
                            <input type="checkbox" name="remember" class="pull-left">
                            &nbsp; Remember Me
                        </label>
                    </div>
                    <div class="form-group form-group-sm">
                        <button type="submit" class="btn btn-success btn-sm submit pull-right">Log in
                        </button>
                    </div>

                </form>

              <div class="form-group pull-left">
                  <?=message()?>
                 <?=errorMessage()?>

              </div>

            </section>
        </div>

    </div>
</div>
<script src="<?= url('backend/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= url('backend/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= url('backend/bower_components/gentelella/vendors/fastclick/lib/fastclick.js') ?>"></script>
<!-- NProgress -->
<script src="<?= url('backend/bower_components/gentelella/vendors/nprogress/nprogress.js') ?>"></script>
<!-- Custom Theme Scripts -->
<script src="<?= url('backend/bower_components/gentelella/vendors/select2/dist/js/select2.full.min.js') ?>"></script>
<script src="<?= url('backend/bower_components/gentelella/build/js/custom.min.js') ?>"></script>
<script src="<?= url('backend/custom/custom.js') ?>"></script>
</body>
</html>
