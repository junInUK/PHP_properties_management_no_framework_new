<?php

  require_once ("./dbOperation.php");

  deleteProperty($_POST["id"]);

  echo "<script>location.replace(\"./index.php\")</script>";
