<?php
require_once "./models/baseModel.php";
require_once "./models/newsModel.php";
require_once "./core/db/database.php";
require_once "./core/template/template.php";

$hasPage = isset($_GET['page']) && (int)$_GET['page'] !== 0;

$page = $hasPage ? $_GET['page'] : 1;
$limit = 5;
$offset = $limit * ($page - 1);

$model = new NewsModel();
$sql = "SELECT COUNT(*) as count FROM `news`";
$totalPages = $model->getCountNews($sql, $limit);

$sqlNews = "SELECT id, title, announce, idate FROM `news` ORDER BY idate DESC LIMIT $limit OFFSET $offset";
$news = $model->getData( $sqlNews, 'fetchAll');

$params = [
    'title' => 'Новости',
    'news' => $news,
    'pageCount' => $totalPages
];

$html = $model->render($params);
echo $html;
