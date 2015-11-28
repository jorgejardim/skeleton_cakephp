<article class="post single fadeInDown-animation hide show animated fadeInDown">
    <div class="container">
        <div class="row">
            <div class="col-md-4 sidebar fadeInDown-animation hide show animated fadeInDown">
                    <?php
                        echo $this->cell('Menus::sidebar', [], [
                            'cache' => ['config' => 'year', 'key' => 'app_menu_sidebar_site']
                        ])->render('sidebar_site');
                    ?>
            </div>
            <div class="col-md-8 main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title pull-md-left">
                            <h3>Página Padrão</h3>
                        </div>
                        <div class="page-actions pull-md-right">
                            <div class="page-actions-dropdown">
                                <select class="dropdown dropdown-actions">
                                    <option value="" class="label">Ações</option>
                                    <option value="1">Ação 1</option>
                                    <option value="2">Ação 2</option>
                                    <option value="3">Ação 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="visible-xs-block visible-sm-block"><br /></div>
                        <div class="clearfix"></div>
                        <div class="entry">
                            <?= $this->Flash->render('auth') ?>
                            <?= __('Hello World!') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>