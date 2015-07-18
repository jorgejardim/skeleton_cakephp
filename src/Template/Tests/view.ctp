<section class="main-page">
    <div class="container">
        <div class="page-title pull-md-left">
            <h3><?= __('View {0}', [__('Test')]) ?></h3>
        </div>
        <div class="page-actions pull-md-right">
            <div class="page-actions-dropdown">
                <select class="dropdown dropdown-actions">
                    <option value="" class="label"><?= __('Actions'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'edit', $test->id]) ?>"><?= __('Edit'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'delete', $test->id]) ?>" confirm="<?= __('Are you sure you want to delete?'); ?>"><?= __('Delete'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('List'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('New'); ?></option>
                </select>
            </div>
        </div>
        <div class="visible-xs-block visible-sm-block"><br /></div>
        <div class="clearfix"></div>
        <div class="entry">
                        <?= $this->Flash->render() ?>
                        <h2><?= h($test->name) ?></h2>
                        <div class="row">
                            <div class="col-lg-5">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                                      <h6><?= __('Name') ?></h6>
                  <p><?= h($test->name) ?></p>
                                                                      <h6><?= __('Slug') ?></h6>
                  <p><?= h($test->slug) ?></p>
                                                                      <h6><?= __('Locale') ?></h6>
                  <p><?= h($test->locale) ?></p>
                                                        </div>
                    </div>
              </div>
                                              <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Id') ?></h6>
                            <p><?= $this->Number->format($test->id) ?></p>
                                            <h6><?= __('Currency') ?></h6>
                            <p><?= $this->Number->format($test->currency) ?></p>
                                            <h6><?= __('Numeric') ?></h6>
                            <p><?= $this->Number->format($test->numeral) ?></p>
                                                </div>
                    </div>
              </div>
                                                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Date') ?></h6>
                            <p><?= h($test->date) ?></p>
                                            <h6><?= __('Calendar') ?></h6>
                            <p><?= h($test->calendar) ?></p>
                                            <h6><?= __('Hour') ?></h6>
                            <p><?= h($test->hour) ?></p>
                                            <h6><?= __('Created') ?></h6>
                            <p><?= h($test->created) ?></p>
                                            <h6><?= __('Modified') ?></h6>
                            <p><?= h($test->modified) ?></p>
                                                </div>
                    </div>
              </div>
                                                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Status') ?></h6>
                            <p><?= $test->status ? __('Yes') : __('No'); ?></p>
                                                </div>
                    </div>
              </div>
                            <div class="clearfix"></div>
                            </div>
                                                                            <div class="row texts">
                                    <div class="col-lg-9">
                                        <h6><?= __('Text') ?></h6>
                                        <?= $this->Text->autoParagraph(h($test->text)); ?>
                                    </div>
                                </div>
                                                                                    </div>
    </div>
</section>