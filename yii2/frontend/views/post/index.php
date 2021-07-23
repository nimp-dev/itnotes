<?php
?>
<h1>Посты</h1>
<?php
foreach ($article as $artic) {
    echo $artic->title.'<br>';
}
?>

<h1>Категрии</h1>
<?php
foreach ($cat as $c) {
    echo $c->title.'<br>';
}
?>
