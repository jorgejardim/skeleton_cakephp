<%
use Cake\Utility\Inflector;
$fields = collection($fields)
        ->filter(function($field) use ($schema) {
    return $schema->columnType($field) !== 'binary';
});
%>
<section class="main-page">
    <div class="container">
        <div class="page-title pull-md-left">
            <h3><?= __('<%= Inflector::humanize($action) %> {0}', [__('<%= $singularHumanName %>')]) ?></h3>
        </div>
        <div class="page-actions pull-md-right">
            <div class="page-actions-dropdown">
                <select class="dropdown dropdown-actions">
                    <option value="" class="label"><?= __('Actions'); ?></option>
                    <% if (strpos($action, 'add') === false): %>
<option value="<?= $this->Url->build(['action' => 'delete', $<%= $singularVar %>-><%= $primaryKey[0] %>]) ?>" confirm="<?= __('Are you sure you want to delete?'); ?>"><?= __('Delete'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'view', $<%= $singularVar %>-><%= $primaryKey[0] %>]) ?>"><?= __('View'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('New'); ?></option>
                    <% endif; %>
<option value="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('List'); ?></option>
                </select>
            </div>
        </div>
        <div class="visible-xs-block visible-sm-block"><br /></div>
        <div class="clearfix"></div>
        <div class="entry">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create($<%= $singularVar %>, ['class' => 'validate']); ?>
                <div class="col-md-3"></div>
                <div class="col-md-6">
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
              echo $this->Form->input('<%= $field %>', ['label' => __('<%= Inflector::humanize($field) %>')]);
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