<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>gallery app</title>
    <link rel="stylesheet" href="<?php echo WEBURL; ?>public/css/syles.css?v=<?php echo rand(0, 10) ?>">
  </head>
  <body>
    <?php foreach ($photos as $photo) { ?>
      <a href="?c=gallery">
        <img src="./public/img/<?php echo $photo['image_address']; ?>" alt="<?php echo $photo['image_address']; ?>">
      </a>
    <?php } ?>
  </body>
</html>