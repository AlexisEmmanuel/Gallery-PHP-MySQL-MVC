<?php
require_once './app/core/db.php';

if(isset($_GET['v'])) {
  require_once "./app/view/".$_GET['v'].".php";
} else {
  require_once "./app/view/getImages.php";
}