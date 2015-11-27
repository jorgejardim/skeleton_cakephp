<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?= $this->Html->charset() ?>
        <title><?= $this->fetch('title') ?></title>
        <meta name="description" content="">
        <meta name="author" content="jorgejardim.com.br">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
        <?php
          echo $this->Html->css(['vendor/bootstrap/bootstrap.min.css',
                                 'general',
                                 'modern/style',
                                 'modern/responsive.css' ]);
          echo $this->fetch('css');
        ?>
        <link rel="shortcut icon" href="<?= ASSETS_IMG ?>modern/icons/favicon.ico">
        <link rel="apple-touch-icon" href="<?= ASSETS_IMG ?>modern/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= ASSETS_IMG ?>modern/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= ASSETS_IMG ?>modern/icons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= ASSETS_IMG ?>modern/icons/apple-touch-icon-144x144.png">
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="<?= ASSETS_JS ?>vendor/html/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body class="<?= strtolower($this->request->params['controller']).' '.$this->request->params['action'] ?>">
        <div id="entire">
            <div class="loader"></div>
            <?php echo $this->element('Menu/top_menu'); ?>
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
                    </div><!-- End Social Container -->
                    <div class="fr top-contact">
                        <ul class="clearfix">
                            <li class="fl"><i class="fa fa-phone"></i><span class="text">Telefone: 11 55555-55555</span></li>
                            <li class="fl divider"><span>&#124;</span></li>
                            <li class="fl"><i class="fa fa-envelope"></i><span class="text">E-mail: <a href="mailto:email@gmail.com">email@gmail.com</a></span></li>
                        </ul>
                    </div><!-- End Top Contact -->
                </div>
            </div><!-- End Tob Bar -->
            <header class="alt">
                <div class="container">
                    <div class="logo-container fl clearfix">
                        <a href="<?= $this->Url->build('/') ?>" class="ib">
                            <img src="<?= ASSETS_IMG ?>modern/logo@2x.png" class="fl" alt="Logo">
                            <span class="site-name">Modern<span>.</span></span>
                        </a>
                    </div><!-- End Logo Container -->
                    <nav class="main-navigation fr">
                        <ul class="clearfix">
                            <li class="parent-item current_page_item">
                                <a href="<?= $this->Url->build('/') ?>" class="ln-tr">Home</a>
                            </li>
                            <li class="parent-item haschild">
                                <a href="#" class="ln-tr">Menu</a>
                                <ul class="submenu">
                                    <li class="sub-item haschild">
                                        <a href="#" class="ln-tr">Sub 1</a>
                                        <ul>
                                            <li class="sub-item"><a href="#" class="ln-tr">Sub Sub 1</a></li>
                                            <li class="sub-item"><a href="#" class="ln-tr">Sub Sub 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-item"><a href="#" class="ln-tr">Sub 2</a></li>
                                    <li class="sub-item"><a href="#" class="ln-tr">Sub 3</a></li>
                                </ul>
                            </li>
                            <li class="parent-item">
                                <a href="#" class="ln-tr">Blog</a>
                            </li>
                            <li class="parent-item">
                                <a href="<?= $this->Url->build('/tests') ?>" class="ln-tr">Testes</a>
                            </li>
                            <li class="parent-item login">
                                <?php if($this->request->session()->check('Auth.User.id')) { ?>
                                    <a href="#" class="ln-tr"><span class="grad-btn"><i class="fa fa-user m-r-5"></i> <?= $this->request->session()->read('Auth.User.name'); ?></a>
                                    <ul class="submenu right">
                                        <li class="sub-item"><a href="<?= $this->Url->build('/me') ?>" class="ln-tr"><?= __('Profile') ?></a></li>
                                        <li class="sub-item"><a href="<?= $this->Url->build('/logout') ?>" class="ln-tr"><?= __('Logout') ?></a></li>
                                    </ul>
                                <?php } else { ?>
                                    <a href="<?= $this->Url->build('/login') ?>" class="ln-tr"><span class="grad-btn">Login</span></a>
                                <?php } ?>
                            </li>
                        </ul>
                    </nav><!-- End NAV Container -->
                    <div class="mobile-navigation fr">
                        <a href="#" class="mobile-btn"><span></span></a>
                        <div class="mobile-container"></div>
                    </div><!-- end mobile navigation -->
                </div>
            </header><!-- End Main Header Container -->

            <?= $this->fetch('content') ?>

            <div class="clearfix"></div>

            <footer id="footer">
                <div id="bottom">
                    <div class="container">
                        <div class="fl copyright">
                            <p>Todos os direitos reservados &copy; Skeleton CakePHP | By <a target="_blank" href="http://www.jorgejardim.com.br/" class="ln-tr">Jorge Jardim</a></p>
                        </div><!-- End Copyright -->
                        <div class="fr footer-social-icons">
                            <ul class="clearfix">
                                <li><a href="#" class="fb-icon ln-tr"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="tw-icon ln-tr"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="gp-icon ln-tr"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="in-icon ln-tr"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="yt-icon ln-tr"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="rss-icon ln-tr"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div><!-- End Social Media Icons -->
                    </div><!-- End container -->
                </div><!-- End Bottom Footer -->
            </footer><!-- End Footer -->
        </div><!-- End Entire Wrap -->

        <script type='text/javascript'>
            /* <![CDATA[ */
            var URL = {"base":"<?= $this->Url->build('/') ?>","uploads":"<?php echo ASSETS_UPLOADS; ?>"};
            var LOCALE = '<?= Locale::getDefault() ?>';
            /* ]]> */
        </script>
        <?php
          echo $this->Html->script(['vendor/jquery/jquery-1.11.3.min.js',
                                    'vendor/bootstrap/bootstrap.min.js',
                                    'vendor/jquery/jquery.cookie.min.js',
                                    'vendor/jquery/jquery.easydropdown.min.js',
                                    'vendor/jquery/jquery.flexslider-min.js',
                                    'vendor/jquery/jquery.themepunch.tools.min.js',
                                    'vendor/jquery/jquery.themepunch.revolution.min.js',
                                    'vendor/jquery/jquery.viewportchecker.min.js',
                                    'vendor/jquery/jquery.validate.min.js',
                                    'vendor/jquery/jquery.maskedinput-1.4.0.min.js',
                                    'vendor/jquery/jquery-autonumeric/autoNumeric.min.js',
                                    'modern/scripts.js',
                                    'form.js',
                                    'common.js' ]);
          echo $this->cell('Js::js', ['name' => $this->request->params['controller'].'_'.$this->request->params['action']], [
              //'cache' => ['config' => 'default', 'key' => 'cell_js_'.$this->request->params['controller'].'_'.$this->request->params['action']]
          ])->render('js');
          echo $this->fetch('script');
          echo $this->fetch('scriptBottom');
        ?>
    </body>
</html>