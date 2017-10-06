<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Index();

$app->run();

// $app->me()
// $app->getValues()->users

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="body.css">
</head>

<body>
<!-- コンテナ開始 -->
<div id="container">

<!-- ヘッダ開始 -->
<div id="header">
    【外部公開向けページ】(ICAS割り引き用)
    <form action="logout.php" method="post" id="logout">
      <?= h($app->me()->email); ?> <input type="submit" value="Log Out">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
</div>
<!-- ヘッダ終了 -->

<!-- サイドバーナビゲーション開始 -->
<div id="nav">
  <div id="container">
    Login_usersリスト <span class="fs12">(<?= count($app->getValues()->login_users); ?>)</span>
    <ul>
      <?php foreach ($app->getValues()->login_users as $user) : ?>
        <li><?= h($user->email); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<!-- サイドバーナビゲーション終了 -->

<!-- メインカラム開始 -->
<div id="content">
<p class="fs14">&ensp;<a href="icas_discount/example.php"> example.php </a>へ</p>
    <p class="fs14">&ensp; icas割利用 </a></p>
    <p class="fs14">&ensp;<a href="icas_discount/show.php"> icas割利用者一覧 </a></p>
    <p class="fs14">&ensp; icas割レコード全消去 </a></p>
</div>
<!-- メインカラム終了 -->

</div>
<!-- コンテナ終了 -->

</body>
</html>