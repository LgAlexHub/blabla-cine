<h2 class="text-center">
    <?= $errorCode ?>
</h2>
<?php if (isset($errorMsg) && !empty($errorMsg)) :?>
    <h3 class="text-center">
        <?=$errorMsg?>
    </h3>
<?php endif; ?>