<?php
  $this->site_boxed = 'boxed'; //boxed;
  $this->site_bg = 'bg-random-grey-variations';
  $this->site_color = 'blue.css';
?>
<!doctype html>
<html lang="pt_BR">
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $this->fetch('title') ?></title>
  <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css(['site/prettyPhoto.css',
                           'site/settings.css',
                           'site/bootstrap.css',
                           'site/main.css',
                           'site/jquery-ui.css',
                           'site/yamm/yamm.css',
                           'site/color-scheme/'.$this->site_color,
                           'site/responsive.css',
                           'dashboard/general.css' ]);
    echo $this->fetch('css');
    $scripts_for_layout = "var www = '".$this->Url->build('/', true)."'\n";
    echo $this->Html->script(['site/jquery-1.9.1.min.js',
                              'site/bootstrap.min.js',
                              'site/jquery.sticky.js',
                              'site/stellar.js',
                              'site/main.js',
                              'site/jquery.prettyPhoto.js' ]);
    echo $this->fetch('script');
    echo $this->Html->scriptBlock($scripts_for_layout);
  ?>
  <script>
    $(document).ready(function(){
      $("a[rel^='prettyPhoto']").prettyPhoto();
    });
  </script>
</head>
<body class="<?= strtolower($this->request->params['controller']).' '.$this->request->params['action'].' '.$this->site_bg ?> ">
<div class="main <?= $this->site_boxed ?>">
  <!-- HEADER
  ============================================= -->
  <div class="header">
    <header>
      <div class="navbar yamm navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo" href="<?= $this->Url->build('/') ?>">
              <?= $this->Html->image('site/logo.png', []) ?>
            </a>
          </div>
          <div id="navbar-collapse-1" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown yamm-fw yamm-fw5">
                <a href="<?= $this->Url->build('/') ?>">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
  </div>
  <?= $this->fetch('content') ?>
</div>
</body>
</html>