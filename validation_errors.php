<?php
// $val_errors must be in page scope
// Typical use:
// <ul class="pad_bot1 list1">
//      include_once("validation_errors.php")
// </ul>
//
 ?>
<?php if(isset($val_errors)): ?>
    <?php foreach($val_errors as $error) :?>
        <li><b>Validazione errata: </b><?php echo $error ?></li>
    <?php endforeach; ?>
<?php endif; ?>