<?php
    use Cake\Core\Configure;
?>
<!doctype html>
<html lang="pt_BR">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="<?= Configure::read('App.description'); ?>" />
    <meta name="author" content="<?= Configure::read('App.author'); ?>" />
    <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <title><?= Configure::read('App.name'); ?></title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css([
            ASSETS_CSS.'admin/bootstrap.min.css',
            ASSETS_CSS.'vendor/font-awesome/css/font-awesome.min.css',
            ASSETS_CSS.'admin/style.css',
            ASSETS_CSS.'admin/themes/satblue.css',
            ASSETS_CSS.'app.css',
            ASSETS_CSS.'admin/general.css'
        ]);
    ?>
    <link rel="apple-touch-icon-precomposed" href="<?= $this->Url->build(ASSETS_IMG.'admin/apple-touch-icon-precomposed.png') ?>" />
</head>
<body class="users login <?= $this->request->params['action'] ?>">
    <div class="wrapper">
        <h1>
            <a href="<?= $this->Url->build('/login') ?>" id="brand"><img src="<?= ASSETS_IMG ?>admin/logo.png" /></a>
        </h1>
        <div class="login-body">
            <?= $this->fetch('content') ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var URL = {"base":"<?= $this->Url->build('/') ?>","upload":"<?php echo ASSETS_UPLOAD; ?>"};
        var LOCALE = '<?= Locale::getDefault() ?>';
        /* ]]> */
    </script>
    <?php
        echo $this->Html->script([
            ASSETS_JS.'vendor/jquery/jquery-1.11.3.min.js',
            ASSETS_JS.'vendor/bootstrap/bootstrap.min.js',
            ASSETS_JS.'vendor/jquery/jquery.validate.min.js',
            ASSETS_JS.'admin/application.min.js'
        ]);
        echo $this->fetch('scriptBottom');
        echo $this->Html->script([
            ASSETS_JS.'form.js',
            ASSETS_JS.'app.js'
        ]);
    ?>
    <!--[if lte IE 9]>
        <?php echo $this->Html->script(ASSETS_JS.'admin/plugins/placeholder/jquery.placeholder.min.js'); ?>
        <script>
            $(document).ready(function() {
                $('input, textarea').placeholder();
            });
        </script>
    <![endif]-->
</body>
</html>