<div class="navbar navbar-default navbar-top-menu">
    <div class="navbar-inner">
        <div class="container p-l-0 m-l-0 p-r-0 m-r-0" style="width:100%">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-top-menu" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="nav-top-menu" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li id="top_menu_manage" class="dropdown navbar-brand">
                        <?= __('Top Menu') ?>:
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/users') ?>" role="button" aria-expanded="false"><i class="fa fa-play-circle"></i><?= __('Users') ?></a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/roles') ?>" role="button" aria-expanded="false"><i class="fa fa-play-circle"></i><?= __('Roles') ?></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="<?= $this->Url->build('/') ?>" role="button" aria-expanded="false"><i class="fa fa-pencil-square"></i><?= __('Right Menu') ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>