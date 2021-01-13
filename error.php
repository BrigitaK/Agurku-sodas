<?php if (isset($error)): ?>
    <?php if(1 == $error): ?>
    <h3 style="color:red;">Neigiamas agurkas</h3>
    <?php endif ?>
    <?php if(2 == $error): ?>
    <h3 style="color:red;">Per daug sodinate, pone</h3>
    <?php endif ?>
    <?php unset($error) ?>
<?php endif ?>