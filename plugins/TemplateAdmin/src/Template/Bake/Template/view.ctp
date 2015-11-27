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
        <div class="page-header">
            <div class="pull-sm-left">
                <h1><?= __('<%= Inflector::humanize($pluralVar) %>') ?> <span>- <?= __('<%= Inflector::humanize($action) %>') ?></span></h1>
            </div>
            <div class="page-actions pull-sm-right">
                <nav role="navigation" class="navbar navbar-default navbar-page-actions">
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapseActionsPage" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbarCollapseActionsPage" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= $this->Url->build(['action' => 'edit', <%= $pk %>, '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-edit"></i> <?= __('Edit'); ?></a></li>
                            <li><?= $this->Form->postLink('<i class="fa fa-trash-o"></i> ' . __('Delete'), ['action' => 'delete', <%= $pk %>, '?' => @$this->request->query], ['confirm' => __('Are you sure you want to delete?'), 'escape' => false, 'class' => 'btn-page-action btn-page-action-delete']) ?></li>
                            <li><a href="<?= $this->Url->build(['action' => 'index', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-list"></i> <?= __('List'); ?></a></li>
                            <li><a href="<?= $this->Url->build(['action' => 'add', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-plus-circle"></i> <?= __('New'); ?></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="visible-xs-block visible-sm-block"><br /></div>
            <div class="clearfix"></div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('List {0}', [__('<%= Inflector::humanize($pluralVar) %>')]), ['action' => 'index']); ?>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('<%= Inflector::humanize($action) %>'), ['action' => 'view', <%= $pk %>]); ?>
                </li>
            </ul>
        </div>
        <div class="row page-view">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-content">
                        <?= $this->Flash->render() ?>
                        <h2 class="m-t-0"><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h2>
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