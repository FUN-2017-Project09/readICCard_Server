<?php

// ユーザーの一覧

require_once(__DIR__ . '/../../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Index();

$app->run();

// $app->me()
// $app->getValues()->users

?>

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