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
</nav>