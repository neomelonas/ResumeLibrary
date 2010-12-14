<?php
include ('conf/settings.php');
//function autoVer($url){
//    $path = pathinfo($url);
//    $ver = '.'.filemtime($_SERVER['DOCUMENT_ROOT'].$url).'.';
//    echo $path['dirname'].'/'.str_replace('.', $ver, $path['basename']);
//}
//
function __autoload($class) { include_once (__DIR__."/lib/app/class/{$class}.php"); }

$t = new Experience('1', $db);
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="UTF-8"/>

        <title>ResumeLibrary - Test Page</title><!-- Title Bananas /-->


    </head>
    <body>
        <?php
            $t->theTest();
        ?>
    </body>
</html>
