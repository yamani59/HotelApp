<script src="<?= BASEURL . 'js/admin.js' ?>"></script>
<?php $update = BASEURL . 'admin/update/' ?>

<div class="container" id="container">
  <div class="wrap-Kamar">
    <table border="1" cellspacing="0" cellpadding="0">
      <tr id="head">
        <th>Tipe Kamar</th>
        <th>Jumlah Kamar</th>
        <th>Action</th>
      </tr>
      <?php foreach ($data as $dt) : ?>
        <tr>
          <td><?= $dt['name'] ?></td>
          <td><?= $dt['room_count'] ?></td>
          <td>
            <a href="<?= BASEURL . 'admin/update/' . $dt['id'] ?>">update</a>
            <a href="<?= BASEURL . 'admin/delete/' . $dt['id'] ?>">hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>

    <a class="tambah" href="<?= BASEURL . 'admin/insert' ?>"><i class="fa-solid fa-plus"></i></a>
  </div>
</div>