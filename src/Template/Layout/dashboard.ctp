<!doctype html>
<html lang="pt_BR">
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $this->fetch('title') ?></title>
  <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css(['dashboard/bootstrap.min.css',
                           'dashboard/plugins/jquery-ui/jquery-ui.min.css',
                           'dashboard/style.css',
                           'dashboard/themes.css',
                           'dashboard/general.css' ]);
    echo $this->fetch('css');
    $scripts_for_layout  = "var WWW = '".$this->Url->build('/', true)."'\n";
    $scripts_for_layout .= "var LOCALE = '".Locale::getDefault()."'\n";
    echo $this->Html->script(['dashboard/jquery.min.js',
                              'dashboard/plugins/nicescroll/jquery.nicescroll.min.js',
                              'dashboard/plugins/jquery-ui/jquery-ui.js',
                              'dashboard/plugins/slimscroll/jquery.slimscroll.min.js',
                              'dashboard/bootstrap.min.js',
                              'dashboard/plugins/form/jquery.form.min.js',
                              'dashboard/plugins/validation/jquery.validate.min.js',
                              'dashboard/plugins/validation/additional-methods.min.js',
                              'dashboard/plugins/validation/extension_brazil.js',
                              'dashboard/plugins/validation/localization/messages_'.Locale::getDefault().'.min.js',
                              'dashboard/eakroko.min.js',
                              'dashboard/application.min.js',
                              'dashboard/demonstration.min.js' ]);
    echo $this->fetch('script');
    echo $this->Html->scriptBlock($scripts_for_layout);
  ?>
  <!--[if lte IE 9]>
    <?php echo $this->Html->script('dashboard/plugins/placeholder/jquery.placeholder.min.js'); ?>
    <script>
      $(document).ready(function() {
        $('input, textarea').placeholder();
      });
    </script>
  <![endif]-->
  <link rel="apple-touch-icon-precomposed" href="<?= $this->Url->build('/img/dashboard/apple-touch-icon-precomposed.png') ?>" />
</head>
<body class="<?= strtolower($this->request->params['controller']).' '.$this->request->params['action'] ?> theme-satblue">
  <div id="navigation">
    <div class="container-fluid">
      <a href="<?= $this->Url->build('/') ?>" id="brand">FLAT</a>
      <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation">
        <i class="fa fa-bars"></i>
      </a>
      <ul class='main-nav'>
        <li>
          <a href="<?= $this->Url->build('/') ?>">
            <span>Início</span>
          </a>
        </li>
      </ul>
      <div class="user">
        <div class="dropdown">
          <a href="#" class='dropdown-toggle' data-toggle="dropdown">John Doe
            <?= $this->Html->image('dashboard/user-avatar.jpg', []) ?>
          </a>
          <ul class="dropdown-menu pull-right">
            <li>
              <?= $this->Html->link('Perfil', '/me') ?>
            </li>
            <li>
              <?= $this->Html->link('Sair', '/logout') ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid <?= $this->sidebar; ?>" id="content">
    <?= $this->fetch('content') ?>
  </div>
</body>
</html>