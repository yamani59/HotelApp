<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="header">
    <div class="title">
      <h1>HOTEL HEBAT</h1>
    </div>
    <?php if (isset($data['rule'])): ?>
      <div class="rule">
        <h1><?= $data['rule'] ?></h1>
      </div>
    <?php endif ?>
    <div class="navbar">
      <?php if (isset($data)): ?>
        <?php foreach ($data as $key => $values): ?>
          <a href=<?= $values ?>> <?= $key ?> </a>
        <?php endforeach ?>
      <?php endif ?>
    </div>
  </div>
  