<?php
  include("../lendemain.php");

  function test($j, $m, $a) {
    echo "$j/$m/$a -> " . join("/", lendemain($j, $m, $a)) . "<br/>";
  }

  test(31, 1, 2017);
  test(28, 2, 2019);
  test(28, 2, 2020);
  test(30, 4, 2017);
  test(30, 5, 2017);
  test(31, 12, 2017);
  test(30, 8, 2017);
  test(30, 9, 2017);
?>
