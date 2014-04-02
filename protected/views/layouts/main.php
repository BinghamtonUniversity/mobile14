<?php /* @var $this Controller */ 
header('Access-Control-Allow-Origin: *');
$baseURL = Yii::app()->request->baseUrl;
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseURL; ?>/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseURL; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseURL; ?>/css/slidebars.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseURL; ?>/css/menu.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        

            
</head>

<body>

<!-- <div class="container" id="page"> -->
        <?php
        /*    
        if ($this->uniqueID == 'diretory') {
                $this->render('view_file',array('message'=>$message));
            }
         */
        ?>

<div id="deviceProperties"></div>

        <div class="menu-button sb-toggle-right">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
        </div>
        <div class="app" id="sbsite2">
            <h1><a href="<?php echo $baseURL; ?>">bMobi</a></h1>

            <div id="submenu">
                <?php $this->widget('subHeader'); ?>
            </div>
            <div id="content">
            <?php echo $content; ?>
        </div>
        </div>
    
        <div class="sb-slidebar sb-right sb-style-push">
            <nav role="navigation">
                <a href="http://www.binghamton.edu"><img class="logo" src="http://www.binghamton.edu/images/v2/binghamton-university-logo.png" alt="thumbnail" /></a>
                <ul>
                    <li><a class="sb-disable-close sb-close" href="<?php echo $baseURL; ?>/index.php/directory/">Directory</a></li>
                    <li><a class="sb-disable-close sb-close" href="#">Calendar</a></li>
                    <li><a class="sb-disable-close sb-close" href="#">Athletics</a></li>
                    <li><a class="sb-disable-close sb-close" href="#">Class Schedule</a></li>
                    <li><a class="sb-disable-close sb-close" href="#">News</a></li>
                    <li><a class="sb-disable-close sb-close" href="#">Transportation</a></li>
                </ul>
            </nav>		
        </div>
 <!-- </div> -->
    <script src="<?php echo $baseURL; ?>/js/main.js"></script>
    <script src="<?php echo $baseURL; ?>/js/slidebars.min.js"></script>
    <script>
    $(document).ready(function() {
        // setup slideBars
        var mySlidebars = new $.slidebars();
        
        // force any links to load within the "content" div
        $('a').click(function(){
            var data = $(this).attr('href');
            $('#content').load(data);
            return false;
        });
    });
    </script>    
    <style>
        .sb-slidebar{
visibility: visible;
}</style>
</body>
</html>
