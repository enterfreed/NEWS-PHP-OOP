<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel="stylesheet" href="./css/styles.min.css">
    <title><?= $title ?></title>
</head>

<body>
  <div class="wrapper">
    <header class="header">
        <h1 class="title"><?= $title ?></h1>
    </header>

    <main class="content">
      <?php
        foreach ($news as $article) {
          $date = date('d.m.Y', $article['idate']);
          $params = [
              'id' => $article['id'],
              'date' => $date,
              'title' => $article['title'],
              'announce' => $article['announce']
          ];
          $template = new Template();
          $html = $template->renderTemplate($params, 'news_item');
          echo $html;
        }
      ?>
    </main>

    <footer class="footer"> Страницы:
      <?php
        $paginationParams = ['pages' => $pageCount];
        $template = new Template();
        $html = $template->renderTemplate($paginationParams, 'pagination');
        echo $html;
      ?>
    </footer>
  </div>
</body>

</html>