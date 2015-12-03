        <div class="page-header">
            <div class="pull-sm-left">
                <h1><?= __('Contact') ?></span></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('Contact'), ['action' => 'index']); ?>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-content">
                        <?= $this->Flash->render() ?>
                        <?= $this->Form->create(null, [
                            'class' => 'form-horizontal form-striped validate',
                            'align' => ['sm' => ['left' => 2, 'middle' => 10, 'right' => 12], 'md' => ['left' => 2, 'middle' => 10, 'right' => 12]]]); ?>
                            <fieldset class="fieldset-bordered">
                                <?php
                                    echo $this->Form->input('name', ['label' => __('Name'), 'class' => 'required', 'required' => 'required']);
                                    echo $this->Form->input('email', ['label' => __('Email'), 'class' => 'email required', 'required' => 'required']);
                                    echo $this->Form->input('phone', ['label' => __('Phone'), 'class' => 'mobile']);
                                    echo $this->Form->input('subject', ['label' => __('Subject'), 'class' => 'subject required', 'required' => 'required']);
                                    echo $this->Form->input('message', ['label' => __('Message'), 'class' => 'message required', 'required' => 'required', 'type' => 'textarea']);
                                    echo $this->SimpleCaptcha->input(['label' => __('Resolve: :question ='), 'class' => 'required', 'required' => 'required', 'help' => __('This question is for testing whether you are a human visitor and to prevent automated spam submissions.')]);
                                ?>
                            </fieldset>
                            <br />
                            <div class="col-sm-12 text-center">
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-large']) ?>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>