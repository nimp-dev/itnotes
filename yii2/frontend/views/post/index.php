<?php
use yii\helpers\Url;
?>
<div class="row">
<?php foreach ($article as $arct) :?>

<div class="col-sm-4">
    <?php if(!$arct['parent_id']) :?>
    <h1><?= $arct['title'] ?></h1>
    <?php else :?>
    <h3><?= $arct['title'] ?></h3>
    <?php endif ;?>
    <?php foreach ($arct['articles'] as $ar) :?>
        <a href="<?= Url::to(['post/single-post', 'id'=>$ar['id']]) ?>" style="text-decoration: none; cursor: pointer;"><?= $ar['title']?></a> <br>
    <?php endforeach; ?>
</div>

<?php endforeach;?>
</div>

