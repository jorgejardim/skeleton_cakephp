<%
use Cake\Utility\Inflector;
$fields = collection($fields)
        ->filter(function($field) use ($schema) {
    return $schema->columnType($field) !== 'binary';
});
%>
<?php $this->layout  = 'dashboard'; ?>
<?php $this->sidebar = 'nav-show'; //nav-hidden ?>
<div id="left">
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='toggle-subnav'>
                <i class="fa fa-angle-down"></i>
                <span><?= __('Actions'); ?></span>
            </a>
        </div>
        <ul class="subnav-menu">
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
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?= __('<%= Inflector::humanize($action) %> {0}', [__('<%= $singularHumanName %>')]) ?></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('<%= Inflector::humanize($action) %> {0}', [__('<%= $singularHumanName %>')]), ['action' => 'add']); ?>
                </li>
            </ul>
            <div class="close-bread">
                <a href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-content">
                        <?= $this->Flash->render() ?>
                        <div class="row">
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
                                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>