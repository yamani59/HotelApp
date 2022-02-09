<div class="container">
  <script src=<?= BASEURL . 'js/admin.js' ?>></script>
  <table cellspacing="0" cellpadding="0">
    <tr>
      <th>Tipe Kamar</th>
      <th>Fasilitas</th>
      <th>Aksi</th>
    </tr>
    <?php foreach ($data as $dt) : ?>
      <tr>
        <td><?= $dt['name'] ?></td>
        <td><?= $dt['facilities'] ?></td>
        <td>
          <button onclick="updateData(<?= BASEURL . 'admin/update/' . $dt['name'] ?>)">update</button>
          <button onclick="deleteData(<?= BASEURL . 'admin/delete/' . $dt['name'] ?>)">delete</button>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
</div>