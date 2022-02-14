<?php
class Flass
{
  public static function msg(string $msg): void
  {
    echo "<script>alert($msg)</script>";
  }
}
