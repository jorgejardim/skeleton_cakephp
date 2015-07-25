<?php
$class = 'warning';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert alert-<?= h($class) ?> alert-dismissable">
    <button data-dismiss="alert" class="close" type="button">×</button>
    <?= $message ?>
</div>