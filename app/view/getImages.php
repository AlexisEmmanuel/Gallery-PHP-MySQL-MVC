<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>gallery app</title>
  <link rel="stylesheet" href="<?php echo WEBURL; ?>public/css/syles.css?v=<?php echo time() ?>">
</head>

<body>
  <div class="container">
    <div class="gallery">
      <?php foreach ($images as $photo) { ?>
        <a href="?c=gallery">
          <img src="./public/img/<?php echo $photo['image_address']; ?>" alt="<?php echo $photo['image_address']; ?>">
        </a>
      <?php } ?>
    </div>
    <?php
    echo $actualPage.'<br>';
    echo $totalPages;
    ?>
    <div class="controllers-pagination">
      <?php if ($actualPage > 1 && $actualPage <= $totalPages) { ?>
        <a href="?p=<?php echo $actualPage - 1; ?>">Preview Page</a>
      <?php } ?>      
    <?php if ($actualPage < $totalPages) { ?>
        <a href="?p=<?php echo $actualPage + 1; ?>">Next Page</a>
      <?php } ?>
    </div>
  </div>
</body>

</html>