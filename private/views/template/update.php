<div class="container">
  <form action=<?= $data['url'] ?> method="post" enctype="multipart/form-data">
    <?php foreach ($data['form'] as $key => $values): ?>
      <?php if ($key == 'image'): ?>
        <label> <?= $key ?> </label>
        <input type="image" name='image' >
      <?php endif ?>
    <?php endforeach ?>
  </form>
</div>