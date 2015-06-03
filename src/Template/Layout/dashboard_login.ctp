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
                           'dashboard/plugins/icheck/all.css',
                           'dashboard/style.css',
                           'dashboard/themes.css',
                           'dashboard/general.css' ]);
    echo $this->fetch('css');
    $scripts_for_layout  = "var WWW = '".$this->Url->build('/', true)."'\n";
    $scripts_for_layout .= "var LOCALE = '".Locale::getDefault()."'\n";
    echo $this->Html->script(['dashboard/jquery.min.js',
                              'dashboard/plugins/nicescroll/jquery.nicescroll.min.js',
                              'dashboard/plugins/validation/jquery.validate.min.js',
                              'dashboard/plugins/validation/additional-methods.min.js',
                              'dashboard/plugins/validation/extension_brazil.js',
                              'dashboard/plugins/validation/localization/messages_'.Locale::getDefault().'.min.js',
                              'dashboard/plugins/icheck/jquery.icheck.min.js',
                              'dashboard/bootstrap.min.js',
                              'dashboard/eakroko.min.js' ]);
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
<body class="users login <?= $this->request->params['action'] ?> theme-satblue">
  <div class="wrapper">
    <h1>
      <a href="<?= $this->Url->build('/') ?>">
        <?= $this->Html->image('dashboard/logo-big.png', ['class'=>'retina-ready', 'width'=>'59', 'height'=>'49']) ?>FLAT
      </a>
    </h1>
    <div class="login-body">
      <?= $this->fetch('content') ?>
    </div>
  </div>
</body>
</html>