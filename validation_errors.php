<?php // $val_errors must be in page scope ?>
<?php if(isset($val_errors)): ?>
    <?php foreach($val_errors as $error) :?>
        <li><b>Validazione errata: </b><?php echo $error ?></li>
    <?php endforeach; ?>
<?php endif; ?>