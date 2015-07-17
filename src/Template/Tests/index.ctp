<section class="main-page">
    <div class="container">
        <div class="page-title pull-md-left">
            <h3><?= __('List {0}', [__('Tests')]) ?></h3>
        </div>
        <div class="page-actions pull-md-right">
            <div class="page-actions-dropdown">
                <select class="dropdown dropdown-actions">
                    <option value="" class="label"><?= __('Actions'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('New'); ?></option>
                </select>
            </div>
        </div>
        <div class="visible-xs-block visible-sm-block"><br /></div>
        <div class="clearfix"></div>
        <div class="entry">
            <?= $this->Flash->render() ?>
            <table class="table table-hover table-nomargin table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id', __('Id')); ?></th>
                        <th><?= $this->Paginator->sort('name', __('Name')); ?></th>
                        <th><?= $this->Paginator->sort('slug', __('Slug')); ?></th>
                        <th><?= $this->Paginator->sort('locale', __('Locale')); ?></th>
                        <th><?= $this->Paginator->sort('date', __('Date')); ?></th>
                        <th><?= $this->Paginator->sort('calendar', __('Calendar')); ?></th>
                        <th><?= $this->Paginator->sort('hour', __('Hour')); ?></th>
                        <th><?= $this->Paginator->sort('currency', __('Currency')); ?></th>
                        <th><?= $this->Paginator->sort('numeral', __('Numeric')); ?></th>
                        <th><?= $this->Paginator->sort('status', __('Status')); ?></th>
                        <th class="actions"><?= __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tests as $test): ?>
                        <tr>
                            <td><?= $this->Number->format($test->id) ?></td>
                            <td><?= h($test->name) ?></td>
                            <td><?= h($test->slug) ?></td>
                            <td><?= h($test->locale) ?></td>
                            <td><?= h($test->date) ?></td>
                            <td><?= h($test->calendar) ?></td>
                            <td><?= h($test->hour) ?></td>
                            <td><?= $this->Number->format($test->currency) ?></td>
                            <td><?= $this->Number->format($test->numeral) ?></td>
                            <td><?= $test->status ? __('Yes') : __('No'); ?></td>
                            <td class="actions" nowrap="nowrap">
                                <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $test->id], ['title' => __('View'), 'class' => 'btn btn-blue btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $test->id], ['title' => __('Edit'), 'class' => 'btn btn-dark-blue btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', $test->id], ['confirm' => __('Are you sure you want to delete # {0}?', $test->id), 'title' => __('Delete'), 'class' => 'btn btn-red btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <div class="pagination fl">
                    <?= $this->Paginator->numbers(['class' => "clearfix", 'prev' => true, 'next' => true]) ?>
                </div>
                <div class="fr pagination-count">
                    <p><?= $this->Paginator->counter(); ?></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>