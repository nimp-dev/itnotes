<?php
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center">Category: <?= $res['title'] ?></h1>
    </div>
</div>

<?php if(isset($res['childs'])) :?>
<div class="row" style="background-color: #f4f4f4; margin-bottom: 10px">
    <h3>Вложеные категории</h3>
<?php foreach ($res['childs'] as $cat):?>
        <div class="col-md-2">
        <h4><a href="<?= Url::to(['category/view', 'id'=>$cat['id']]) ?>"><?=$cat['title']?></a></h4>
        </div>
<?php endforeach;?>
</div>
<?php endif; ?>

<div class="row" style="background-color: #f4f4f4">
    <h3>Материалы категрии</h3>
<?php foreach ($article as $artic) : ?>
<div class="col-md-4 cat-bar">
    <div class="post-bar">
        <div class="post-img">
            <img width="110" height="110" src="/uploads/images/blog/<?=$artic->img?>" alt="building">
        </div>
        <div class="post-text">
        <a href="<?= Url::to(['post/single-post', 'id'=>$artic->id]) ?>"><?= $artic->title ?></a></br>
        <p><?= $artic->lemma?></p>
        </div>
    </div>
</div>
<?php endforeach;?>
</div>

