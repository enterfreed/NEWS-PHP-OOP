<?php ?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel="stylesheet" href="./css/styles.min.css">
    <title><?= $articleData['title'] ?></title>
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <h1 class="title"><?= $articleData['title'] ?></h1>
    </header>

    <main>
        <div class="content">
          <?= $articleData['content'] ?>
        </div>
    </main>

    <footer class="footer">
          <a href="news.php" class="back">Все новости >></a>
    </footer>
  </div>
</body>

</html>