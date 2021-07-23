<?php
use yii\helpers\Url;
?>
<?php if($category != null): ?>

    <li class="ul-menu-list"><a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>">
            <?= $category['title'] ?>
            <?php if (isset($category['childs']) ): ?>
            <?php endif; ?>
        </a>
        <?php if (isset($category['childs']) ): ?>
            <ul class="ul-menu-drop">
                <?= $this->getMenuHtml($category['childs']) ?>
            </ul>
        <?php endif; ?>
    </li>

<?php endif; ?>