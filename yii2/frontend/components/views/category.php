<?php
use yii\helpers\Url;
?>
<?php if($category != null): ?>

    <li class="ul-menu-list"><a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>">
            <?= $category['title'] ?>
            <?php if (isset($category['childs']) ): ?>
            <span style="background: #008000; padding-left: 2px; padding-right: 2px; margin-left: 5px; color: #ffffff"><i class="fa fa-plus"></i></span>
            <?php endif; ?>
        </a>
        <?php if (isset($category['childs']) ): ?>
            <ul class="ul-menu-drop">
                <?= $this->getMenuHtml($category['childs']) ?>
            </ul>
        <?php endif; ?>
    </li>

<?php endif; ?>