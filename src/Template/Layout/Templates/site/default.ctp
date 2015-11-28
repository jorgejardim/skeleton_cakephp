<?php
    use Cake\Core\Configure;
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="<?= Configure::read('App.description'); ?>" />
        <meta name="author" content="<?= Configure::read('App.author'); ?>" />
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <title><?= Configure::read('App.name'); ?></title>
        <?php
            echo $this->Html->css([
                ASSETS_CSS.'vendor/bootstrap/bootstrap.min.css',
                ASSETS_CSS.'vendor/font-awesome/css/font-awesome.min.css',
                ASSETS_CSS.'site/style',
                ASSETS_CSS.'site/responsive.css',
                ASSETS_CSS.'site/skin/default.css',
                ASSETS_CSS.'app.css',
                ASSETS_CSS.'general.css'
            ]);
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        <link rel="shortcut icon" href="<?= ASSETS_IMG ?>site/icons/favicon.ico">
        <link rel="apple-touch-icon" href="<?= ASSETS_IMG ?>site/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= ASSETS_IMG ?>site/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= ASSETS_IMG ?>site/icons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= ASSETS_IMG ?>site/icons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon-precomposed" href="<?= $this->Url->build(ASSETS_IMG.'/admin/apple-touch-icon-precomposed.png') ?>" />
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="<?= ASSETS_JS ?>vendor/html/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body class="<?= strtolower($this->request->params['controller']).' '.$this->request->params['action'] ?>">
        <div id="entire">
            <div class="loader"></div>
            <?php
                echo $this->cell('Menus::config', [], [
                    'cache' => ['config' => 'year', 'key' => 'app_menu_config_site']
                ])->render('config_site');
            ?>
            <div class="top-bar clearfix">
                <div class="container">
                    <div class="fl top-social-icons">
                        <ul class="clearfix">
                            <li><a href="#" class="fb-icon ln-tr"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="tw-icon ln-tr"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="gp-icon ln-tr"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="pn-icon ln-tr"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" class="vm-icon ln-tr"><i class="fa fa-vimeo-square"></i></a></li>
                            <li><a href="#" class="in-icon ln-tr"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="yt-icon ln-tr"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#" class="yt-icon ln-tr"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="#" class="rss-icon ln-tr"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                    <div class="fr top-contact">
                        <ul class="clearfix">
                            <li class="fl"><i class="fa fa-phone"></i><span class="text">Telefone: 11 55555-55555</span></li>
                            <li class="fl divider"><span>&#124;</span></li>
                            <li class="fl"><i class="fa fa-envelope"></i><span class="text">E-mail: <a href="mailto:email@gmail.com">email@gmail.com</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <header class="alt">
                <div class="container">
                    <div class="logo-container fl clearfix">
                        <a href="<?= $this->Url->build('/') ?>" class="ib">
                            <img src="<?= ASSETS_IMG ?>site/logo@2x.png" class="fl" alt="Logo">
                            <span class="site-name">SiteTemplate<span>.</span></span>
                        </a>
                    </div>
                    <?php
                        echo $this->cell('Menus::header', [], [
                            'cache' => ['config' => 'year', 'key' => 'app_menu_header_site']
                        ])->render('header_site');
                    ?>
                    <div class="mobile-navigation fr">
                        <a href="#" class="mobile-btn"><span></span></a>
                        <div class="mobile-container"></div>
                    </div>
                </div>
            </header>
            <?= $this->fetch('content') ?>
            <div class="clearfix"></div>
            <footer id="footer">
                <div id="bottom">
                    <div class="container">
                        <div class="fl copyright">
                            <p>Todos os direitos reservados &copy; Skeleton CakePHP | By <a target="_blank" href="http://www.jorgejardim.com.br/" class="ln-tr">Jorge Jardim</a></p>
                        </div>
                        <div class="fr footer-social-icons">
                            <ul class="clearfix">
                                <li><a href="#" class="fb-icon ln-tr"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="tw-icon ln-tr"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="gp-icon ln-tr"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="in-icon ln-tr"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="yt-icon ln-tr"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="rss-icon ln-tr"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
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
                ASSETS_JS.'vendor/jquery/jquery.easydropdown.min.js',
                ASSETS_JS.'vendor/jquery/jquery.flexslider-min.js',
                ASSETS_JS.'vendor/jquery/jquery.themepunch.tools.min.js',
                ASSETS_JS.'vendor/jquery/jquery.themepunch.revolution.min.js',
                ASSETS_JS.'vendor/jquery/jquery.viewportchecker.min.js',
                ASSETS_JS.'vendor/jquery/jquery.validate.min.js',
                ASSETS_JS.'vendor/jquery/jquery.maskedinput-1.4.0.min.js',
                ASSETS_JS.'vendor/jquery/jquery-autonumeric/autoNumeric.min.js',
                ASSETS_JS.'site/scripts.js',
            ]);
            echo $this->fetch('scriptBottom');
            echo $this->Html->script([
                ASSETS_JS.'form.js',
                ASSETS_JS.'app.js'
            ]);
        ?>
    </body>
</html>