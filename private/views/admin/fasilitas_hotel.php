<div class="container">
  <div class="wrap-Hotel-Facilities">

    <?php foreach ($data as $dt) : ?>
      <div class="hotel">
        <div class="head">
          <img src="<?= BASEURL . 'private/images/' . $dt['image'] ?>" alt="">
        </div>
        <div class="body">
          <h2><?= $dt['facilities'] ?></h2>
          <p><?= $dt['description'] ?></p>
        </div>
        <div class="action">
          <a href="<?= BASEURL . 'admin/hotel_update/' . $dt['id'] ?>">update</a>
          <a href="<?= BASEURL . 'admin/hotel_hapus/' . $dt['id'] ?>">hapus</a>
        </div>
      </div>
    <?php endforeach ?>

    <a href="<?= BASEURL . 'admin/fasilitas_hotel_tambah' ?>" class="tambah"><i class="fa-solid fa-plus"></i></a>
  </div>
</div>