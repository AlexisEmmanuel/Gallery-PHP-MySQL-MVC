<!DOCTYPE html>
<html>

<head>
  <?php require_once './app/templates/head.php'; ?>
</head>

<body>
  <?php require_once './app/templates/navbar.php'; ?>
  <div class="container new-section">
    <div class="gallery">
      <?php foreach ($images as $photo) { ?>
        <a class="father-image" href="?c=gallery&a=viewImage&image=<?php echo $photo['image_id']; ?>">
          <img class="image" src="<?php echo WEBURL; ?>public/img/<?php echo $photo['image_address']; ?>" alt="<?php echo $photo['image_address']; ?>">
        </a>
      <?php } ?>
    </div>
    <div class="controllers-pagination">
      <?php if ($actualPage > 1 && $actualPage <= $totalPages) { ?>
        <a class="btn btn-primary position-btn-prev" href="?p=<?php echo $actualPage - 1; ?>">Preview Page</a>
      <?php } ?>
    <?php if ($actualPage < $totalPages) { ?>
        <a class="btn btn-primary position-btn-next" href="?p=<?php echo $actualPage + 1; ?>">Next Page</a>
      <?php } ?>
    </div>
  </div>
</body>

</html>