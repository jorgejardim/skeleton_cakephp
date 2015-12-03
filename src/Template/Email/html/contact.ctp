<strong><?= __('Name') ?>:</strong> <?= h($name) ?><br>
<strong><?= __('Email') ?>:</strong> <?= h($email) ?><br>
<strong><?= __('Phone') ?>:</strong> <?= h($phone) ?><br>
<strong><?= __('Subject') ?>:</strong> <?= h($subject) ?><br>
<strong><?= __('Message') ?>:</strong> <?= $this->Text->autoParagraph(h($message)) ?>