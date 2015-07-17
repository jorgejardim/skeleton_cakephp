<section class="main-page">
    <div class="container">
        <div class="page-title pull-md-left">
            <h3><?= __('Edit {0}', [__('Test')]) ?></h3>
        </div>
        <div class="page-actions pull-md-right">
            <div class="page-actions-dropdown">
                <select class="dropdown dropdown-actions">
                    <option value="" class="label"><?= __('Actions'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'delete', $test->id]) ?>" confirm="<?= __('Are you sure you want to delete?'); ?>"><?= __('Delete'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'view', $test->id]) ?>"><?= __('View'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('New'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('List'); ?></option>
                </select>
            </div>
        </div>
        <div class="visible-xs-block visible-sm-block"><br /></div>
        <div class="clearfix"></div>
        <div class="entry">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create($test, ['class' => 'validate']); ?>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <fieldset>
                        <?php
                            echo $this->Form->input('name', ['label' => __('Name')]);
                            echo $this->Form->input('slug', ['label' => __('Slug')]);
                            echo $this->Form->input('text', ['label' => __('Text')]);
                            echo $this->Form->input('locale', ['label' => __('Locale')]);
                            echo $this->Form->input('date', ['label' => __('Date'), 'class' => 'dateBR', 'type' => 'text']);
                            echo $this->Form->input('calendar', ['label' => __('Calendar'), 'class' => 'datetimeBR', 'type' => 'text']);
                            echo $this->Form->input('hour', ['label' => __('Hour'), 'class' => 'time', 'type' => 'text']);
                            echo $this->Form->input('currency', ['label' => __('Currency'), 'class' => 'currency', 'type' => 'text']);
                            echo $this->Form->input('numeral', ['label' => __('Numeric'), 'class' => 'numeric', 'type' => 'text']);
                            echo $this->Form->input('status', ['label' => __('Status')]);
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