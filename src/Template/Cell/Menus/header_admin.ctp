<ul class='main-nav'>
    <li>
        <a data-toggle="tooltip" data-placement="bottom" title="<?= __('Menu 1') ?>" href="<?= $this->Url->build('/') ?>"><i class="fa fa-user"></i> <span class="hidden-md hidden-lg">Menu 1</span></a>
    </li>
    <li>
        <a data-toggle="tooltip" data-placement="bottom" title="<?= __('Menu 2') ?>" href="<?= $this->Url->build('/') ?>"><i class="fa fa-tasks"></i> <span class="hidden-md hidden-lg">Menu 2</span></a>
    </li>
    <li>
        <a data-toggle="tooltip" data-placement="bottom" title="<?= __('Menu 3') ?>" href="<?= $this->Url->build('/') ?>"><i class="fa fa-folder-open"></i> <span class="hidden-md hidden-lg">Menu 3</span></a>
    </li>
    <li>
        <a href="<?= $this->Url->build('/') ?>"><i class="fa fa-folder-open"></i> Menu 4</a>
    </li>
    <li>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-folder-open"></i> Menu 5
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?= $this->Url->build('/') ?>">Sub 1</a>
            </li>
            <li>
                <a href="<?= $this->Url->build('/') ?>">Sub 2</a>
            </li>
            <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sub 3</a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= $this->Url->build('/') ?>">Sub Sub 1</a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/') ?>">Sub Sub 2</a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build('/') ?>">Sub Sub 3</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="<?= $this->Url->build('/') ?>"><i class="fa fa-folder-open"></i> Menu 6</a>
    </li>
    <li>
        <a href="<?= $this->Url->build('/') ?>"><i class="fa fa-folder-open"></i> Menu 7</a>
    </li>
    <li class="search-form" style="display: none">
        <a href="javascript:;">
            <form class="navbar-form" method="get" action="<?= $this->Url->build('/search') ?>">
                <input name="top_search" type="text" placeholder="<?= __('Search') ?>..." class="form-control h24 p-b-0 p-t-0 w300">
                <i class="fa fa-close hidden-xs hidden-sm"></i>
            </form>
        </a>
    </li>
    <li class="search hidden-xs hidden-sm">
        <a data-toggle="tooltip" data-placement="bottom" title="<?= __('Search') ?>"  href="javascript:;"><i class="fa fa-search"></i></a>
    </li>
</ul>


