<input type='text' name='customer' required placeholder='Customer'>
<input type='email' name='email' required placeholder='Email'>
<input type='number' name='no_hp' required placeholder='Nomor Hp'>
<input type='text' name='visitor' required placeholder='Visitor'>
<select name='room_id'>
  <?php foreach ($data as $dt) : ?>
    <option value=<?= $dt['id'] ?>><?= $dt['name'] ?>
    </option><?php endforeach ?>
</select>
<input type='submit' value='submit'>