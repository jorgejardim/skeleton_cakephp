<?php
use Cake\Core\Configure;
?>
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
    echo $this->Html->css(['admin/bootstrap.min.css',
                           'admin/plugins/icheck/all.css',
                           'admin/style.css',
                           'admin/themes.css',
                           'admin/general.css' ]);
    echo $this->fetch('css');
    $scripts_for_layout  = "var WWW = '".$this->Url->build('/', true)."'\n";
    $scripts_for_layout .= "var LOCALE = '".Locale::getDefault()."'\n";
    echo $this->Html->script(['admin/jquery.min.js',
                              'admin/plugins/nicescroll/jquery.nicescroll.min.js',
                              'admin/plugins/validation/jquery.validate.min.js',
                              'admin/plugins/validation/additional-methods.min.js',
                              'admin/plugins/validation/extension_brazil.js',
                              'admin/plugins/validation/localization/messages_'.Locale::getDefault().'.min.js',
                              'admin/plugins/icheck/jquery.icheck.min.js',
                              'admin/bootstrap.min.js',
                              'admin/eakroko.min.js' ]);
    echo $this->fetch('script');
    echo $this->Html->scriptBlock($scripts_for_layout);
  ?>
  <!--[if lte IE 9]>
    <?php echo $this->Html->script('admin/plugins/placeholder/jquery.placeholder.min.js'); ?>
    <script>
      $(document).ready(function() {
        $('input, textarea').placeholder();
      });
    </script>
  <![endif]-->
  <link rel="apple-touch-icon-precomposed" href="<?= $this->Url->build('/img/admin/apple-touch-icon-precomposed.png') ?>" />
</head>
<body class="users login <?= $this->request->params['action'] ?> theme-satblue">
  <div class="wrapper">
    <h1>
      <a href="<?= $this->Url->build('/') ?>">
        <i class="fa fa-university"></i> <?= Configure::read('App.name'); ?></a>
      </a>
    </h1>
    <div class="login-body">
      <?= $this->fetch('content') ?>
    </div>
  </div>
</body>
</html>