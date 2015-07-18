<?php if($this->request->session()->check('Auth.User.internal')): ?>
    <div class="navbar navbar-default navbar-top-menu">
        <div class="navbar-inner">
            <div class="container">
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= __('Users') ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= $this->Url->build('/users') ?>"><?= __('List') ?></a></li>
                                <li><a href="<?= $this->Url->build('/users/add') ?>"><?= __('Add') ?></a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= __('Tests') ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= $this->Url->build('/tests') ?>"><?= __('List') ?></a></li>
                                <li><a href="<?= $this->Url->build('/tests/add') ?>"><?= __('Add') ?></a></li>
                                <li><a href="<?= $this->Url->build('/tests/blank') ?>"><?= __('Blank Page') ?></a></li>
                                <li><a href="<?= $this->Url->build('/tests/pdf') ?>"><?= __('PDF Example') ?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user m-r-5"></i> <?= $this->request->session()->read('Auth.User.name'); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= $this->Url->build('/me') ?>"><?= __('Profile') ?></a></li>
                                <li><a href="<?= $this->Url->build('/logout') ?>"><?= __('Logout') ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>