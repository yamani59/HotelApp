<div class="container">
  <form action=<?= $data['link'] ?> method="post">
    <?php foreach ($data as $key => $value) : ?>
      <div class="input">
        <label for=""><?= $key ?></label>
        <input type="<?= $value ?>" name="<?= $key ?>">
      </div>
    <?php endforeach ?>
    <input type="hidden" name="option" value="post">
    <input type="submit" value="submit">
  </form>
</div>