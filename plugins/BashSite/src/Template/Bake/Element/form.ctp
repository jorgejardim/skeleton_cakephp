<%
use Cake\Utility\Inflector;
$fields = collection($fields)
        ->filter(function($field) use ($schema) {
    return $schema->columnType($field) !== 'binary';
});
%>
<div class="b-titlebar">
    <div class="container layout">
        <ul class="crumbs">
            <li><?= __('You are here:') ?></li>
            <li><a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a></li>
            <li><?= $this->Html->link(__('<%= Inflector::humanize($action) %> {0}', [__('<%= $singularHumanName %>')]), ['action' => 'add']); ?></li>
        </ul>
        <h1><?= __('<%= Inflector::humanize($action) %> {0}', [__('<%= $singularHumanName %>')]) ?></h1>
    </div>
</div>
<div class="content shortcodes">
    <div class="container layout">
        <div class="row">
            <div class="row-item col-md-2 sidebar">
                <h3 style="margin-bottom: 20px;"><?= __('Actions'); ?></h3>
                <div>
                    <ul class="pl15">
                <% if (strpos($action, 'add') === false): %>
<li>
                    <?= $this->Form->postLink(__('Delete'),
                                              ['action' => 'delete', $<%= $singularVar
                                              %>-><%= $primaryKey[0] %>],
                                              ['confirm' => __('Are you sure you want to delete # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>)]
                                             ) ?>
                </li>
            <li><?= $this->Html->link(__('View {0}', [__('<%= $singularHumanName %>')]), ['action' => 'view', $<%= $singularVar %>-><%= $primaryKey[0] %>]) ?></li>
            <li><?= $this->Html->link(__('New {0}', [__('<%= $singularHumanName %>')]), ['action' => 'add']); ?></li>
        <% endif; %>
        <li><?= $this->Html->link(__('List {0}', [__('<%= $pluralHumanName %>')]), ['action' => 'index']) ?></li>
        <%
        $done = [];
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                    %>
                <li><?= $this->Html->link(__('New {0}', [__('<%= $this->_singularHumanName($alias) %>')]), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) %> </li>
                    <%
                    $done[] = $details['controller'];
                }
            }
        }
        %>
            </ul>
                </div>
            </div>
            <%
            $fields = collection($fields)
                    ->filter(function($field) use ($schema) {
                        return !in_array($schema->columnType($field), ['binary', 'text']);
                    })
                    ->take(7);
%>
<div class="row-item col-md-10">
                <?= $this->Flash->render() ?>









                        <div>
                            <?= $this->Form->create($<%= $singularVar %>, ['align' => [
                                                                        'sm' => [
                                                                            'left' => 2,
                                                                            'middle' => 10,
                                                                            'right' => 12
                                                                        ],
                                                                        'md' => [
                                                                            'left' => 2,
                                                                            'middle' => 6,
                                                                            'right' => 4
                                                                        ]
                                                                      ]]); ?>
                                <fieldset>
                                    <?php
                    <%
                    foreach ($fields as $field) {
                        if (in_array($field, $primaryKey)) {
                            continue;
                        }
                        if (isset($keyFields[$field])) {
                    %>
                    echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
                    <%
                            continue;
                        }
                        if (!in_array($field, ['created', 'modified', 'updated'])) {
                    %>
                    echo $this->Form->input('<%= $field %>');
                    <%
                        }
                    }
                    if (!empty($associations['BelongsToMany'])) {
                        foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
                            %>
                    echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
                            <%
                        }
                    }
            %>
                ?>
                                </fieldset>
                                <br />
                                <div class="col-sm-12 col-md-8 text-right">
                                    <?= $this->Form->button(__('Submit'), ['class' => 'btn-submit btn colored']) ?>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>










                <?php if($this->Paginator->param('count') > 1) { ?>
                    <div class="pagination">
                        <div>
                            <?= __('Page').' '.$this->Paginator->param('current').' '.__('of').' '.$this->Paginator->param('count') ?>
                        </div>
                        <?= $this->Paginator->prev('&laquo;', ['escape' => false]) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('&raquo;', ['escape' => false]) ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>