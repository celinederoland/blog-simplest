<?php
/**
 * Created by PhpStorm.
 * User: celine
 * Date: 13/09/16
 * Time: 11:49
 */
require_once "view/Home.php";

$page = new Home();
echo $page->render();
