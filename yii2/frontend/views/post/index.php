<?php
?>
<div class="row">
<?php foreach ($article as $arct) :?>

<div class="col-sm-4">
    <h1><?= $arct['title'] ?></h1>
    <?php foreach ($arct['articles'] as $ar) :?>
        <a style="text-decoration: none; cursor: pointer;"><?= $ar['title']?></a> <br>
    <?php endforeach; ?>
</div>

<?php endforeach;?>
</div>

