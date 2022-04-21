<?php
require_once 'model/routes.php';
require_once 'controller/AppController.php';

$pages = new AppController();
$pages->page();
