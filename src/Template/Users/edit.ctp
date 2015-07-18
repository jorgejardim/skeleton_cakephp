<section class="main-page">
    <div class="container">
        <div class="page-title pull-md-left">
            <h3><?= __('Edit {0}', [__('User')]) ?></h3>
        </div>
        <div class="page-actions pull-md-right">
            <div class="page-actions-dropdown">
                <select class="dropdown dropdown-actions">
                    <option value="" class="label"><?= __('Actions'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'delete', $user->id]) ?>" confirm="<?= __('Are you sure you want to delete?'); ?>"><?= __('Delete'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'view', $user->id]) ?>"><?= __('View'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('New'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('List'); ?></option>
                </select>
            </div>
        </div>
        <div class="visible-xs-block visible-sm-block"><br /></div>
        <div class="clearfix"></div>
        <div class="entry">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create($user, ['class' => 'validate']); ?>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <fieldset>
                        <?php
                            echo $this->Form->input('name');
                            echo $this->Form->input('email');
                            echo $this->Form->input('username');
                            echo $this->Form->input('password');
                            echo $this->Form->input('oauth_provider');
                            echo $this->Form->input('oauth_uid');
                        ?>
                        <div class="clearfix"></div>
                    </fieldset>
                    <br />
                    <div class="text-right">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-large btn-default']) ?>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="clearfix"></div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</section>