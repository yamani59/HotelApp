<div class="container">
  <div class="wrap-Room">
    <?php foreach ($data as $dt) : ?>
      <div class="room">
        <div class="image">
          <img src="<?= BASEURL . 'private/images/' . $dt['image'] ?>" alt="">
        </div>
        <div class="body">
          <h1>Tipe <?= $dt['name'] ?></h1>
          <p>
            <?= $dt['facilities'] ?>
          </p>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>