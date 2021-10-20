<?php
use yii\helpers\Url;
?>
<div class="row">
    <h1>Category:</h1>
<?php foreach ($res as $cat):?>
    <div class="col-md-4 cat-bar">
    <h1 class="entry-title"><a href="<?= Url::to(['category/view', 'id'=>$cat['id']]) ?>"><?=$cat['title']?></a></h1>
    <?php if(isset($cat['childs'])) :?>
        <nav class="menus">
            <ul>
                <?php foreach ($cat['childs'] as $oop) :?>
                    <li><a href="<?= Url::to(['category/view', 'id'=>$oop['id']]) ?>"><?= $oop['title'].' '?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    <?php endif; ?>
    </div>
<?php endforeach;?>
</div>
