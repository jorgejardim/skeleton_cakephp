<?php
    use Cake\Core\Configure;
    $default_sidebar = 'nav-show'; // nav-hidden / nav-show
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
            ASSETS_CSS.'vendor/bootstrap/bootstrap.min.css',
            ASSETS_CSS.'vendor/font-awesome/css/font-awesome.min.css',
            ASSETS_CSS.'admin/style.css',
            ASSETS_CSS.'admin/themes/satblue.css',
            ASSETS_CSS.'app.css',
            ASSETS_CSS.'general.css'
        ]);
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <link rel="apple-touch-icon-precomposed" href="<?= $this->Url->build(ASSETS_IMG.'/admin/apple-touch-icon-precomposed.png') ?>" />
</head>
<body class="<?= strtolower($this->request->params['controller']).' '.$this->request->params['action'] ?>" data-mobile-sidebar="button">
    <div id="navigation">
        <div class="container-fluid">
            <div class="nav-brand">
                <a href="#" class="mobile-sidebar-toggle" data-toggle="tooltip" data-placement="bottom" title="Menu">
                    <i class="fa fa-bars"></i>
                </a>
                <a class="hidden-xs" href="<?= $this->Url->build('/') ?>" id="brand"><img src="<?= ASSETS_IMG ?>admin/logo.png" /></a>
            </div>
            <div class="toggle-left-sidebar">
                <a href="#" class="toggle-nav" data-toggle="tooltip" data-placement="bottom" title="<?= __('Show/Hide Menu') ?>">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <?php
                echo $this->cell('Menus::header', [], [
                    'cache' => ['config' => 'year', 'key' => 'app_menu_header_admin']
                ])->render('header_admin');
            ?>
            <div class="user">
                <div class="dropdown">
                    <a href="#" class='dropdown-toggle' data-toggle="dropdown">
                        <span class="hidden-xs"><?= $this->request->session()->read('Auth.User.first_name'); ?></span>
                        <img height="27" width="27" src="<?php echo $this->request->session()->read('Auth.User.avatar')?ASSETS_UPLOAD.'avatar/'.$this->request->session()->read('Auth.User.avatar'):$this->Url->build(ASSETS_IMG.'admin/avatar.jpg'); ?>">
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <?= $this->Html->link(__('Profile'), '/me') ?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Logout'), '/logout') ?>
                        </li>
                    </ul>
                </div>
                <?php
                    echo $this->cell('Menus::config', [], [
                        'cache' => ['config' => 'year', 'key' => 'app_menu_config_admin']
                    ])->render('config_admin');
                ?>
            </div>
        </div>
    </div>
    <div id="brand-mobile" class="hidden-sm hidden-md hidden-lg">
        <div class="container-fluid text-center">
            <a class="dib no-float" href="<?= $this->Url->build('/') ?>" id="brand"><img src="<?= ASSETS_IMG ?>admin/logo.png" /></a>
        </div>
    </div>
    <div class="container-fluid <?= $default_sidebar ?>" id="content">
        <div id="left">
            <?php
                echo $this->cell('Menus::sidebar', [], [
                    'cache' => ['config' => 'year', 'key' => 'app_menu_sidebar_admin']
                ])->render('sidebar_admin');
            ?>
        </div>
        <div id="main">
            <div class="container-fluid">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <div class="top-loading">
            <img src="<?= ASSETS_IMG ?>admin/loader.gif" /> <span>Salvando</span>...
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
            ASSETS_JS.'vendor/jquery/jquery.cookie.min.js',
            ASSETS_JS.'vendor/jquery/jquery.validate.min.js',
            ASSETS_JS.'vendor/jquery/jquery.maskedinput-1.4.0.min.js',
            ASSETS_JS.'vendor/jquery/jquery-autonumeric/autoNumeric.min.js',
            ASSETS_JS.'admin/plugins/nicescroll/jquery.nicescroll.min.js',
            ASSETS_JS.'admin/plugins/touchwipe/touchwipe.min.js',
            ASSETS_JS.'admin/application.min.js',
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