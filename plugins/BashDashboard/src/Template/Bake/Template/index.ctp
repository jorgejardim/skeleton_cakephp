<%
use Cake\Utility\Inflector;
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
            <li><?= $this->Html->link(__('New {0}', [__('<%= $singularHumanName %>')]), ['action' => 'add']); ?></li>
        <%
            $done = [];
            foreach ($associations as $type => $data):
                foreach ($data as $alias => $details):
                    if ($details['controller'] != $this->name && !in_array($details['controller'], $done)):
                        %>
            <li><?= $this->Html->link(__('List {0}', [__('<%= Inflector::humanize($details["controller"]) %>')]), ['controller' => '<%= $details["controller"] %>', 'action' => 'index']); ?></li>
            <li><?= $this->Html->link(__('New {0}', [__('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>')]), ['controller' => ' <%= $details["controller"] %>', 'action' => 'add']); ?></li>
            <%
                        $done[] = $details['controller'];
                    endif;
                endforeach;
            endforeach;
        %></ul>
    </div>
</div>
<%
$fields = collection($fields)
        ->filter(function($field) use ($schema) {
            return !in_array($schema->columnType($field), ['binary', 'text']);
        })
        ->take(7);
%>
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?= __('List {0}', [__('<%= Inflector::humanize($pluralVar) %>')]) ?></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('List {0}', [__('<%= Inflector::humanize($pluralVar) %>')]), ['action' => 'index']); ?>
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
                            <table class="table table-hover table-nomargin table-striped table-bordered">
                                <thead>
                                    <tr>
                    <% foreach ($fields as $field): %>
                    <th><?= $this->Paginator->sort('<%= $field %>', __('<%= Inflector::humanize($field) %>')); ?></th>
                    <% endforeach; %>
                    <th class="actions"><?= __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
                                        <tr>
                <%
                foreach ($fields as $field) {
                    $isKey = false;
                    if (!empty($associations['BelongsTo'])) {
                        foreach ($associations['BelongsTo'] as $alias => $details) {
                            if ($field === $details['foreignKey']) {
                                $isKey = true;
                                %>
                <td>
                                    <?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?>
                                </td>
                                <%
                                break;
                            }
                        }
                    }
                    if ($isKey !== true) {
                        if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
                            %>
                <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                            <%
                        } else {
                            %>
                            <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
                            <%
                        }
                    }
                }

                $pk = '$' . $singularVar . '->' . $primaryKey[0];
                %>
                <td class="actions">
                                                <?= $this->Html->link(__('View'), ['action' => 'view', <%= $pk %>]) ?>
                                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>]) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php if($this->Paginator->param('count') > 1) { ?>
                                <div class="paginator">
                                    <div class="pull-left">
                                        <ul class="pagination">
                                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                            <?= $this->Paginator->numbers() ?>
                                            <?= $this->Paginator->next(__('next') . ' >') ?>
                                        </ul>
                                    </div>
                                    <div class="pull-right pagination-count">
                                        <p><?= $this->Paginator->param('current').' '.__('of').' '.$this->Paginator->param('count') ?></p>
                                    </div>
                                    <div class="cleaxrfix"></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>