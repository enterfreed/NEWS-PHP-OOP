<?php
require_once "./models/baseModel.php";
require_once "./models/viewModel.php";
require_once "./core/db/database.php";
require_once "./core/template/template.php";

$hasArticle = isset($_GET['id']) && (int)$_GET['id'] !== 0;
$id = $hasArticle ? $_GET['id'] : null;

if ($id) {
    $model = new ViewModel();
    $sql = "SELECT title, content FROM `news` WHERE id = $id";
    $article = $model->getData($sql);

    $params = [ 'articleData' => $article ];
    $html = $model->render($params);
    echo $html;
}
else {
    echo "Wrong article Id";
}

