<script src="<?= BASEURL . 'js/admin.js'?>"></script>
<?php $update = BASEURL . 'admin/update/' ?>

<div class="container" id="container">
  <table cellspacing="0" cellpadding="0">
    <tr>
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

  <button onclick="insertData('<?= BASEURL . 'admin/insert'?>')">Tambah</button>
</div>