<div class="container">
  <div class="wrap-Insert">
    <div class="form">
      <form action="" enctype="multipart/form-data" method="post">
        <input type="text" name="name" value="<?= $data['name'] ?>">
        <input type="number" name="room_count" value="<?= $data['room_count'] ?>">
        <input type="text" name="facilities" value="<?= $data['facilities'] ?>">
        <input type="file" name="image">
        <input type="submit" value="submit">
      </form>
    </div>
  </div>
</div>