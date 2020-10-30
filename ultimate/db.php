<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'ultimate'
  ) or die(mysqli_error($mysqli));

?>