<?php
use yii\helpers\Url;
?>
<?php if($category != null): ?>

    <li><a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>">
            <?= $category['title'] ?>
            <?php if (isset($category['childs']) ): ?>
                <i class="fas fa-angle-right"></i>
            <?php endif; ?>
        </a>
        <?php if (isset($category['childs']) ): ?>
            <ul>
                <?= $this->getMenuHtml($category['childs']) ?>
            </ul>
        <?php endif; ?>
    </li>

<?php endif; ?>