<?php
/**
 * Created by PhpStorm.
 * User: celine
 * Date: 13/09/16
 * Time: 12:06
 */

require_once "view/Article.php";
require_once "view/Home.php";

$page = new Article($_GET['page']);

if (!isset($_GET['page']) || empty($_GET['page'])) {
    $page = new Home();
}
if (!($page->exists())) {
    $page = new Home("l'article " . $_GET['page'] . " n'existe pas");
}

echo $page->render();