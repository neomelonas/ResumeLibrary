<?php
include ('conf/settings.php');
function autoVer($url){
    $path = pathinfo($url);
    $ver = '.'.filemtime($_SERVER['DOCUMENT_ROOT'].$url).'.';
    echo $path['dirname'].'/'.str_replace('.', $ver, $path['basename']);
}

function __autoload($class) { include_once (__DIR__."/lib/app/class/{$class}.php"); }
$u = isset($_GET['u']) ? $_GET['u'] : 1;
$t = new User($u, $db);
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
            echo $t->email;
        ?>
    </body>
</html>
