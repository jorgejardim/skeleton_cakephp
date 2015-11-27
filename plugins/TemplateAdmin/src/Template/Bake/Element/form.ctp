<%
use Cake\Utility\Inflector;
$fields = collection($fields)
        ->filter(function($field) use ($schema) {
    return $schema->columnType($field) !== 'binary';
});
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
                            <% if (strpos($action, 'add') === false): %>
<li><?= $this->Form->postLink('<i class="fa fa-trash-o"></i> ' . __('Delete'), ['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>, '?' => @$this->request->query], ['confirm' => __('Are you sure you want to delete?'), 'escape' => false, 'class' => 'btn-page-action btn-page-action-delete']) ?></li>
                            <li><a href="<?= $this->Url->build(['action' => 'add', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-plus-circle"></i> <?= __('New'); ?></a></li>
                            <% endif; %>
<li><a href="<?= $this->Url->build(['action' => 'index', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-list"></i> <?= __('List'); ?></a></li>
                        </ul>
                    </div>
                </nav>
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
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('<%= Inflector::humanize($action) %>'), ['action' => '<%= $action; %>', $<%= $singularVar %>-><%= $primaryKey[0] %>]); ?>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-content">
                        <?= $this->Flash->render() ?>
                        <?= $this->Form->create($<%= $singularVar %>, [
                            'class' => 'form-horizontal form-striped validate',
                            'align' => ['sm' => ['left' => 2, 'middle' => 10, 'right' => 12], 'md' => ['left' => 2, 'middle' => 10, 'right' => 12]]]); ?>
                            <fieldset class="fieldset-bordered">
                                <?php
                  <%
                  foreach ($fields as $field) {
                      if (in_array($field, $primaryKey)) {
                          continue;
                      }
                      if (isset($keyFields[$field])) {
                  %>
                  echo $this->Form->input('<%= $field %>', ['label' => __('<%= Inflector::humanize($field) %>'), 'options' => $<%= $keyFields[$field] %>]);
                  <%
                          continue;
                      }
                      if (!in_array($field, ['created', 'modified', 'updated'])) {
                  %>
                  echo $this->Form->input('<%= $field %>', ['label' => __('<%= Inflector::humanize($field) %>')]);
                  <%
                      }
                  }
                  if (!empty($associations['BelongsToMany'])) {
                      foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
                          %>
                  echo $this->Form->input('<%= $assocData['property'] %>._ids', ['label' => __('<%= Inflector::humanize($field) %>'), 'options' => $<%= $assocData['variable'] %>]);
                          <%
                      }
                  }
          %>
              ?>
                            </fieldset>
                            <br />
                            <div class="col-sm-12 text-center">
                                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary btn-large']) ?>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>