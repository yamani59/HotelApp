<script src="<?= BASEURL . 'js/admin.js' ?>"></script>
<?php $url = BASEURL . 'home/pemesanan' ?>
<div class="container">
  <div class="wrap-Home">
    <div class="banner">
      <img src="<?= BASEURL . 'assets/banner.jpg' ?>" alt="">
    </div>
    <div class="form">
      <form action="" method="post">
        <div class="form-date">
          <input type="date" name="cek-in" required>
          <input type="date" name="cek-out" required>
          <input type="number" name="count_room" required>
          <button onclick="order('<?= $url ?>')">Pesan</button>
        </div>
        <div class="form-pemesanan">

        </div>
      </form>
    </div>
    <div class="about-our">
      <h1>Tentang Kami</h1>
      <p>
        Lepaskan diri Anda ke Hotel Hebat, dikelilingin oleh keindahan pengunungan yang indah, danau, dan sawah menghijau.
        Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau.
        Kids Clup yang luas menawarkan beragam fasilitas dan kegiatan anak anak yang akan melengkapi kenyamanan keluarga.
        Convertion Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di bandung, mampu mengakomondasi hingga
        3000 delegasi. Manfaatkan ruang penyelenggaraan konversi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah
      </p>
    </div>
  </div>
</div>