<%
use Cake\Utility\Inflector;
$fields = collection($fields)
        ->filter(function($field) use ($schema) {
            return !in_array($schema->columnType($field), ['binary', 'text']);
        })
        ->take(7);
%>
<section class="main-page">
    <div class="container">
        <div class="page-title pull-md-left">
            <h3><?= __('List {0}', [__('<%= Inflector::humanize($pluralVar) %>')]) ?></h3>
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
      <td class="actions" nowrap="nowrap">
                                <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', <%= $pk %>], ['title' => __('View'), 'class' => 'btn btn-blue btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', <%= $pk %>], ['title' => __('Edit'), 'class' => 'btn btn-dark-blue btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>), 'title' => __('Delete'), 'class' => 'btn btn-red btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
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