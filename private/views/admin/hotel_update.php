<div class="container">
  <div class="wrap-Insert">
    <div class="form" method="post" enctype="multipart/form-data">
      <form action="" enctype="multipart/form-data" method="post">
        <input type="text" name="facilities" placeholder="facilities" required value="<?= $data['facilities'] ?>">
        <textarea name="description" cols="30" rows="10" placeholder="description"><?= $data['description'] ?></textarea>
        <input type="file" name="image">
        <input type="submit" value="submit">
      </form>
    </div>
  </div>
</div>