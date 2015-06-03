<?php $this->layout = 'dashboard_login' ?>
<h2><?= __('Create Account') ?></h2>
<?= $this->Flash->render() ?>
<?php if(!isset($check_mail)) { ?>
    <?= $this->Form->create(null, array('class' => 'form-validate', 'id' => 'form-register')) ?>
        <div class="form-group">
            <div class="name controls">
                <?= $this->Form->input('name', array('div' => false, 'label' => false, 'placeholder' => __('Name'), 'class' => 'form-control required', 'data-rule-required' => 'true')) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="email controls">
                <?= $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => __('Email'), 'class' => 'form-control required', 'data-rule-required' => 'true', 'data-rule-email' => 'true')) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="pw controls">
                <?= $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => __('Password'), 'class' => 'form-control required', 'data-rule-required' => 'true')) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="pw controls">
                <?= $this->Form->input('verify_password', array('div' => false, 'label' => false, 'placeholder' => __('Verify Password'), 'class' => 'form-control compare required', 'data-rule-required' => 'true', 'rel' => 'password', 'type' => 'password')) ?>
            </div>
        </div>
        <div class="submit">
            <input type="submit" class="btn btn-primary" value="<?= __('Create Account') ?>">
        </div>
        <hr>
        <div class="push or text-center"><?= __('or Sign up with') ?></div>
        <div class="row social push">
            <div class="col-xs-6">
                <a class="btn btn-sm btn-darkblue btn-block" href="javascript:void(0)" style="overflow: hidden; position: relative;"><i class="fa fa-facebook"></i> Facebook</a>
            </div>
            <div class="col-xs-6">
                <a class="btn btn-sm btn-blue btn-block" href="javascript:void(0)" style="overflow: hidden; position: relative;"><i class="fa fa-twitter"></i> Twitter</a>
            </div>
        </div>
        <p class="small terms margin_top text_center">
            <?= __('By signing up, you confirm that you accept our') ?>
            <a data-toggle="modal" href="#modal-terms"><?= __('Terms of Service and Privacy Policy.') ?></a>
        </p>
    </form>
<?php } ?>
<div class="forget">
    <a href="<?= $this->Url->build('/login') ?>">
        <span><?= __('Back to login') ?></span>
    </a>
</div>
<div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade" id="modal-terms">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center"><strong><?= __('Terms of Service and Privacy Policy.') ?></strong></h3>
            </div>
            <div class="modal-body">
                <h4 class="page-header">1. <strong>General</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
                <h4 class="page-header">2. <strong>Account</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
                <h4 class="page-header">3. <strong>Service</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
                <h4 class="page-header">4. <strong>Payments</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button data-dismiss="modal" class="btn btn-effect-ripple btn-sm btn-primary" type="button" style="overflow: hidden; position: relative;"><?= __('I\'ve read them!') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>