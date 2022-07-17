<!DOCTYPE html>
<html>

<head>
  <?php require_once './app/templates/head.php'; ?>
</head>

<body>
  <?php require_once './app/templates/navbar.php'; ?>
  <div class="container new-section">
    <?php foreach ($image as $img) { ?>
      <img src="./public/img/<?php echo $img['image_address']; ?>" alt="">
    <?php } ?>
  </div>
</body>

</html>