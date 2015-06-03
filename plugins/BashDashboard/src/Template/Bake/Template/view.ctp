<%
use Cake\Utility\Inflector;
$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
        ->map(function($field) use ($immediateAssociations) {
            foreach ($immediateAssociations as $alias => $details) {
                if ($field === $details['foreignKey']) {
                    return [$field => $details];
                }
            }
        })
        ->filter()
        ->reduce(function($fields, $value) {
    return $fields + $value;
}, []);

$groupedFields = collection($fields)
        ->filter(function($field) use ($schema) {
            return $schema->columnType($field) !== 'binary';
        })
        ->groupBy(function($field) use ($schema, $associationFields) {
            $type = $schema->columnType($field);
            if (isset($associationFields[$field])) {
                return 'string';
            }
            if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
                return 'number';
            }
            if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
                return 'date';
            }
            return in_array($type, ['text', 'boolean']) ? $type : 'string';
        })
        ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>
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
            <li><?= $this->Html->link(__('Edit {0}', [__('<%= $singularHumanName %>')]), ['action' => 'edit', <%= $pk %>]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete {0}', [__('<%= $singularHumanName %>')]), ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?> </li>
            <li><?= $this->Html->link(__('List {0}', [__('<%= $pluralHumanName %>')]), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New {0}', [__('<%= $singularHumanName %>')]), ['action' => 'add']) ?> </li>
            <%
            $done = [];
            foreach ($associations as $type => $data) {
                foreach ($data as $alias => $details) {
                    if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                        %>
            <li><?= $this->Html->link(__('List {0}', [__('<%= $this->_pluralHumanName($alias) %>')]), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New {0}', [__('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>')]), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) ?> </li>
                        <%
                        $done[] = $details['controller'];
                    }
                }
            }
    %></ul>
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
                    <?= $this->Html->link(__('<%= Inflector::humanize($action) %> {0}', [__('<%= $singularHumanName %>')]), ['action' => 'view']); ?>
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
                        <h2><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h2>
                        <div class="row">
              <% if ($groupedFields['string']) : %>
              <div class="col-lg-5">
                  <div class="panel panel-default">
                      <div class="panel-body">
                  <% foreach ($groupedFields['string'] as $field) : %>
                  <%
                  if (isset($associationFields[$field])) :
                    $details = $associationFields[$field];
                  %>
                  <h6><?= __('<%= Inflector::humanize($details['property']) %>') ?></h6>
                  <p><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></p>
                  <% else : %>
                  <h6><?= __('<%= Inflector::humanize($field) %>') ?></h6>
                  <p><?= h($<%= $singularVar %>-><%= $field %>) ?></p>
                  <% endif; %>
                <% endforeach; %>
                      </div>
                    </div>
              </div>
              <% endif; %>
                <% if ($groupedFields['number']) : %>
                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                        <% foreach ($groupedFields['number'] as $field) : %>
                    <h6><?= __('<%= Inflector::humanize($field) %>') ?></h6>
                            <p><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></p>
                        <% endforeach; %>
                        </div>
                    </div>
              </div>
                <% endif; %>
                <% if ($groupedFields['date']) : %>
                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                        <% foreach ($groupedFields['date'] as $field) : %>
                    <h6><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></h6>
                            <p><?= h($<%= $singularVar %>-><%= $field %>) ?></p>
                        <% endforeach; %>
                        </div>
                    </div>
              </div>
                <% endif; %>
                <% if ($groupedFields['boolean']) : %>
                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                        <% foreach ($groupedFields['boolean'] as $field) : %>
                    <h6><?= __('<%= Inflector::humanize($field) %>') ?></h6>
                            <p><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></p>
                        <% endforeach; %>
                        </div>
                    </div>
              </div>
                <% endif; %>
            </div>
                        <% if ($groupedFields['text']) : %>
                            <% foreach ($groupedFields['text'] as $field) : %>
                        <div class="row texts">
                                    <div class="col-lg-9">
                                        <h6><?= __('<%= Inflector::humanize($field) %>') ?></h6>
                                        <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?>
                                    </div>
                                </div>
                            <% endforeach; %>
                        <% endif; %>
                        <%
                        $relations = $associations['HasMany'] + $associations['BelongsToMany'];
                        foreach ($relations as $alias => $details):
                            $otherSingularVar = Inflector::variable($alias);
                            $otherPluralHumanName = Inflector::humanize($details['controller']);
                            %>
                        <div class="related row">
                                <div class = "col-lg-12">
                                    <h4><?= __('Related {0}', [__('<%= $otherPluralHumanName %>')]) ?></h4>
                                    <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <% foreach ($details['fields'] as $field): %>
                                            <th><?= __('<%= Inflector::humanize($field) %>') ?></th>
                                                <% endforeach; %>
                                            <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
                                            <tr>
                                                <% foreach ($details['fields'] as $field): %>
                                            <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
                                                <% endforeach; %>
                                                <% $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
                                            <td class="actions">
                                                    <?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['controller' => '<%= $details['controller'] %>', 'action' => 'edit', <%= $otherPk %>]) ?>
                                                    <?= $this->Form->postLink(__('Delete'), ['controller' => '<%= $details['controller'] %>', 'action' => 'delete', <%= $otherPk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                        </div>
                        <% endforeach; %>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>