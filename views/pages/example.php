<?php

use app\components\Link; ?>

<title><?php echo $title ?></title>

<main class="w-screen min-h-screen grid place-items-center">
  <?php include __DIR__ . '/../fragments/intro.php' ?>

  <footer>
    <?php new Link(['to' => 'https://github.com/CyanFroste/smol', 'name' => 'by Cyan Froste']) ?>
  </footer>
</main>