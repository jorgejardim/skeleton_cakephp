<section class="main-page">
    <div class="container">
        <div class="page-title">
            <h3><?= __('Profile') ?></h3>
        </div>
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
                            echo $this->Form->input('locale');
                            echo $this->Form->input('role');
                            echo $this->Form->input('status');
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