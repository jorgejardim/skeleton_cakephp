<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset() ?>
    <?= $this->fetch('meta') ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('template.css') ?>
    <?= $this->fetch('css') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <?= $this->Flash->render() ?>
      <div class="row">
          <?= $this->fetch('content') ?>
      </div>
    </div>

    <?php
      $scripts_for_layout = "var www = '".$this->Url->build('/', true)."'\n";
      echo $this->Html->script(['https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
                                  'bootstrap.min.js'
                                ]);
      echo $this->fetch('script');
      echo $this->Html->scriptBlock($scripts_for_layout);
    ?>
  </body>
</html>