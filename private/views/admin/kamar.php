<div class="container">
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
          <button onclick="">update</button>
          <button onclick="">delete</button>
        </td>
      </tr>
    <?php endforeach ?>
  </table>

  <button onclick="insertData(<?= BASEURL . 'admin/insert' ?>)">Tambah</button>
</div>