<?php
?>
<div class="row">
    <h1><?= $post->title ?></h1>
    <p><?= $post->created_at ?></p>
    <p>
        <?php foreach ($post->categories as $category) :?>
            <a href="#"><?= $category->title ?></a>
        <?php endforeach;?>
    </p>
    <div>
        <p><?= $post->content ?></p>
    </div>
</div>
