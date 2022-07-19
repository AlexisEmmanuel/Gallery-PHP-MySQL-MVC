<!DOCTYPE html>
<html>

<head>
  <?php require_once './app/templates/head.php'; ?>
</head>

<body>
  <?php require_once './app/templates/navbar.php'; ?>
  <header class="header-form">
    <div class="container">
      <h1 class="title-header">Edit photo</h1>
    </div>
  </header>
  <div class="container new-section">
    <div class="content-input-image">
      <form class="form-submit-image" method="POST" enctype="multipart/form-data">
        <input class="file" type="file" name="image" id="imagePreview">
        <input class="uploadimage" type="button" value="New file" onclick="document.querySelector('#imagePreview').click();">
        <input type="submit" value="select" class="btn btn-primary new-section">
        <?php if (isset($errorReporter)) { ?>
          <p class="error-reporter new-section"><?php echo $errorReporter; ?></p>
        <?php } ?>
      </form>
    </div>
  </div>
</body>

</html>