<div class="container">
  <form action=<?= $data['action'] ?> method="post" enctype="multipart/form-data">
    <?php foreach ($data['form'] as $key => $value) : ?>
      <div class="input">
        <label for=""><?= $key ?></label>
        <input type="<?= $value ?>" name="<?= $key ?>" autocomplete="off">
      </div>
    <?php endforeach ?>
    <input type="hidden" name="option" value="post">
    <input type="submit" value="submit">
  </form>
</div>