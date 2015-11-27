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
  <meta name="description" content="<?= Configure::read('App.description'); ?>">
  <meta name="author" content="<?= Configure::read('App.author'); ?>">
  <title><?= Configure::read('App.name'); ?></title>
  <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css([ASSETS_CSS.'vendor/bootstrap/bootstrap.min.css',
                           // ASSETS_CSS.'admin/bootstrap.min.css',
                           // ASSETS_CSS.'admin/plugins/jquery-ui/jquery-ui.min.css',
                           ASSETS_CSS.'admin/style.css',
                           ASSETS_CSS.'admin/themes.css',
                           ASSETS_CSS.'general.css',
                           'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' ]);
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
  <link rel="apple-touch-icon-precomposed" href="<?= $this->Url->build(ASSETS_IMG.'/admin/apple-touch-icon-precomposed.png') ?>" />
</head>
<body class="<?= strtolower($this->request->params['controller']).' '.$this->request->params['action'] ?> theme-satblue" data-mobile-sidebar="button">
  <div id="navigation">
    <div class="container-fluid">
      <div class="nav-brand">
        <div class="pull-left">
          <a href="#" class="mobile-sidebar-toggle" data-toggle="tooltip" data-placement="bottom" title="Menu">
            <i class="fa fa-bars"></i>
          </a>
          <a class="hidden-xs" href="<?= $this->Url->build('/') ?>" id="brand"><i class="fa fa-university"></i> <?= Configure::read('App.name'); ?></a>
        </div>
        <div class="pull-right">
          <a href="#" class="toggle-nav" data-toggle="tooltip" data-placement="bottom" title="<?= __('Show/Hide Menu') ?>">
            <i class="fa fa-bars"></i>
          </a>
        </div>
        <div class="clearfix"></div>
      </div>
      <ul class='main-nav'>
        <li>
          <form class="navbar-form" method="get" action="<?= $this->Url->build('/search') ?>">
            <input name="top_search" type="text" placeholder="<?= __('Search') ?>..." class="form-control h24 p-b-0 p-t-0 w300">
          </form>
        </li>
        <li>
          <a data-toggle="tooltip" data-placement="bottom" title="<?= __('Novo Cliente') ?>" href="<?= $this->Url->build('/contacts/add') ?>"><i class="fa fa-user"></i></a>
        </li>
        <li>
          <a data-toggle="tooltip" data-placement="bottom" title="<?= __('Novo Evento') ?>" href="<?= $this->Url->build('/events/add?agenda=1') ?>"><i class="fa fa-tasks"></i></a>
        </li>
        <li>
          <a data-toggle="tooltip" data-placement="bottom" title="<?= __('Pastas') ?>" href="<?= $this->Url->build('/folders') ?>"><i class="fa fa-folder-open"></i></a>
        </li>
      </ul>
      <div class="user">
        <div class="dropdown">
          <a href="#" class='dropdown-toggle' data-toggle="dropdown">
            <span class="hidden-xs"><?= $this->request->session()->read('Auth.User.name'); ?></span>
            <img height="27" width="27" src="<?php echo $this->request->session()->check('Auth.User.avatar')?ASSETS_UPLOADS.'avatars/'.$this->request->session()->read('Auth.User.avatar'):$this->Url->build(ASSETS_IMG.'avatar.jpg'); ?>">
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
        <?php if($this->request->Session()->read('Auth.User.Role.role') === 'administrador') { ?>
            <div class="dropdown config-menu">
              <a href="#" class='dropdown-toggle' data-toggle="dropdown">
                <i class="fa fa-cog"></i>
              </a>
              <ul class="dropdown-menu pull-right">
                <li><?= $this->Html->link(__('Folders'), '/folders') ?></li>
                <li><?= $this->Html->link(__('Labels'), '/labels') ?></li>
                <li><?= $this->Html->link(__('Varas'), '/varas') ?></li>
                <li><?= $this->Html->link(__('Comarcas'), '/judicial_districts') ?></li>
                <li><?= $this->Html->link(__('Courts'), '/courts') ?></li>
                <li><?= $this->Html->link(__('Positionings Parties'), '/parts') ?></li>
                <li><?= $this->Html->link(__('Tipos de Processos'), '/types_processes') ?></li>
                <li><?= $this->Html->link(__('Tipos de Eventos'), '/types_progresses') ?></li>
                <li><?= $this->Html->link(__('Tipos de Perfis'), '/types_profiles') ?></li>
                <li><?= $this->Html->link(__('Tipos de Situações'), '/types_situations') ?></li>
                <li><?= $this->Html->link(__('Justices'), '/justices') ?></li>
                <li><?= $this->Html->link(__('Holidays'), '/holidays') ?></li>
                <li><?= $this->Html->link(__('Offices'), '/offices') ?></li>
                <li><?= $this->Html->link(__('Users'), '/users') ?></li>
                <li><?= $this->Html->link(__('Roles'), '/roles') ?></li>
              </ul>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div id="brand-mobile" class="hidden-sm hidden-md hidden-lg">
    <div class="container-fluid text-center">
      <a class="dib no-float" href="<?= $this->Url->build('/') ?>" id="brand"><i class="fa fa-university"></i> <?= Configure::read('App.name'); ?></a>
    </div>
  </div>
  <div class="container-fluid nav-show" id="content">
    <div id="left">
        <div class="subnav">
            <ul class="subnav-menu">
                <li><a href="<?= $this->Url->build('/agenda/listing') ?>"><i class="fa fa-folder"></i> <?= __('Agenda') ?></a></li>
                <li><a href="<?= $this->Url->build('/contacts/add') ?>"><i class="fa fa-folder"></i> <?= __('Entrevista') ?></a></li>
                <li><a href="<?= $this->Url->build('/contacts') ?>"><i class="fa fa-folder"></i> <?= __('Pessoas') ?></a></li>
                <li><a href="<?= $this->Url->build('/processes') ?>"><i class="fa fa-folder"></i> <?= __('Processos e Casos') ?></a></li>
                <li><a href="<?= $this->Url->build('/documents') ?>"><i class="fa fa-folder"></i> <?= __('Documentos') ?></a></li>
                <li><a href="<?= $this->Url->build('/pages/soon') ?>"><i class="fa fa-folder"></i> <?= __('Relatórios') ?></a></li>
            </ul>
        </div>
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
      var URL = {"base":"<?= $this->Url->build('/') ?>","uploads":"<?php echo ASSETS_UPLOADS; ?>"};
      /* ]]> */
  </script>
  <?php
    echo $this->Html->script([// ASSETS_JS.'admin/jquery.min.js',
                              ASSETS_JS.'vendor/jquery/jquery-1.11.3.min.js',
                              ASSETS_JS.'vendor/bootstrap/bootstrap.min.js',
                              ASSETS_JS.'vendor/jquery/jquery.cookie.min.js',
                              ASSETS_JS.'vendor/jquery/jquery.validate.min.js',
                              ASSETS_JS.'vendor/jquery/jquery.maskedinput-1.4.0.min.js',
                              ASSETS_JS.'vendor/jquery/jquery-autonumeric/autoNumeric.min.js',
                              ASSETS_JS.'admin/plugins/nicescroll/jquery.nicescroll.min.js',
                              ASSETS_JS.'admin/plugins/touchwipe/touchwipe.min.js',
                              // ASSETS_JS.'admin/plugins/jquery-ui/jquery-ui.js',
                              // ASSETS_JS.'admin/plugins/slimscroll/jquery.slimscroll.min.js',
                              // ASSETS_JS.'admin/bootstrap.min.js',
                              // ASSETS_JS.'admin/plugins/form/jquery.form.min.js',
                              // ASSETS_JS.'admin/plugins/validation/jquery.validate.min.js',
                              // ASSETS_JS.'admin/plugins/validation/additional-methods.min.js',
                              // ASSETS_JS.'admin/plugins/validation/extension_brazil.js',
                              // ASSETS_JS.'admin/plugins/validation/localization/messages_'.Locale::getDefault().'.min.js',
                              // ASSETS_JS.'admin/eakroko.min.js',
                              ASSETS_JS.'admin/application.min.js',
                              // ASSETS_JS.'admin/demonstration.min.js'
    ]);
    echo $this->fetch('scriptBottom');
    echo $this->Html->script([ASSETS_JS.'form.js',
                              ASSETS_JS.'common.js' ]);
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