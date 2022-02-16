<div class="container">
  <div class="wrap-Kamar">
    <table border="1" cellspacing="0" cellpadding="0">
      <tr id="head">
        <th>Nama Tamu</th>
        <th>Tanggal Cek In</th>
        <th>Tanggal Cek out</th>
        <th>Aksi</th>
      </tr>

      <?php foreach ($data as $dt) : ?>
        <tr>
          <td> <?= $dt['visitor'] ?> </td>
          <td> <?= $dt['cek_in'] ?> </td>
          <td> <?= $dt['cek_out'] ?> </td>
          <td> <a href=<?= BASEURL . 'resepsionis/cek_in/' . $dt['id'] ?>>Cek In</a> </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
</div>