<?php
header('Access-Control-Allow-Origin: *');
$baseURL = 'http://' . $_SERVER['SERVER_NAME'] . Yii::app()->request->baseUrl;
?>

<h1><a href="/index.html">bMobi None</a></h1>

<div id="submenu">
    <?php $this->widget('subHeader'); ?>
</div>

<?php echo $content; ?>
