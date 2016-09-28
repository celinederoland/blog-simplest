<?php
/**
 * Created by PhpStorm.
 * User: celine
 * Date: 13/09/16
 * Time: 12:06
 */

try {

    if (!isset($_GET['page']) || empty($_GET['page'])) {
        throw new Exception("missing_parameter");
    }

    require_once "view/Article.php";
    $page = new Article($_GET['page']);
} catch (Exception $e) {

    require_once "view/Home.php";
    if($e->getMessage() == "file_not_found") {
        $page = new Home("l'article " . $_GET['page'] . " n'existe pas");
    } else {
        $page = new Home();
    }
} finally {

    echo $page->render();
}
