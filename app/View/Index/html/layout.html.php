<!DOCTYPE HTML>
<html lang="<?php wh(__('en')); ?>">
    <head>
        <meta charset="utf-8">
        <title><?php wh(__('Demo')); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo App::getRequest()->getBaseUrl('/'); ?>" />
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link type="text/css" href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <?php echo $this->block('css'); ?>
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <?php echo $this->block('js'); ?>
    </head>

    <body>

        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <?php if (App::getUser()->acl('admin')) : ?>
                        <li class="active"><a href="#"><?php wh(__('Admin')); ?></a></li>
                    <?php endif ?>
                    <li class="active"><a href="login"><?php wh(__('Logout')); ?></a></li>
                </ul>
                <h3 class="text-muted"><?php wh(__('Demo')); ?></h3>
            </div>
            <div id="content">
                <?php echo $this->block('content'); ?>
            </div>
            <div class="footer">
                <p>&copy; <?php wh(__('Demo') . ' ' . date('Y')); ?></p>
            </div>

        </div>
    </body>

</html>
