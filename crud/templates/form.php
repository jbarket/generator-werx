<?php

use INA\Security\CSRF;
use werx\Forms\Form;

?>

<?= CSRF::getHiddenInputString() ?>

<!--<div class="control-group">-->
<!--    <label class="control-label" for="name">Name</label>-->
<!--    <div class="controls">-->
<!--        <input type="text" name="name" id="name" placeholder="Name" value="--><?//= Form::getValue('name') ?><!--"/>-->
<!--    </div>-->
<!--</div>-->

