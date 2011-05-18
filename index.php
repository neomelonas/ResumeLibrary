<?php
include ('conf/settings.php');
function autoVer($url){
    $path = pathinfo($url);
    $ver = '.'.filemtime($_SERVER['DOCUMENT_ROOT'].$url).'.';
    echo $path['dirname'].'/'.str_replace('.', $ver, $path['basename']);
}

function __autoload($class) { include_once (__DIR__."/lib/app/class/{$class}.php"); }


echo '<pre>';

$u = isset($_GET['u']) ? $_GET['u'] : 1;
$r = (object) array(
    'n'=>$n = new User($u, $db),
    'j'=>$j = new Experience($u, $db),
    'l'=>$l = new Education($u, $db),
    'i'=>$i = new ListPile($u, $db, 'listly', '3'),
    't'=>$t = ListPile::makeList($u, $db, 'listly', '3')
);
$details = $r->j->getDetails();
print_r($r);

echo '</pre>';


?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="UTF-8"/>
        <title>Resume Library - Test Page</title><!-- Title Bananas /-->
    </head>
    <body>
        <?php
            echo $r->i->detailsAsList($i->getListItems());
            
        ?>
    </body>
</html>
