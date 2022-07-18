<nav class="navbar bg-navbar">
  <div class="container flex-navbar">
    <a class="brand-navbar" href="<?php echo WEBURL; ?>">Gallery-App</a>
    <div class="burger-menu" id="burger-menu">
      <li class="bar-1"></li>
      <li class="bar-2"></li>
      <li class="bar-3"></li>
    </div>
    <ol class="links-navbar active-navbar" id="links-navbar-list">
      <li class="link-item-navbar">
        <a href="?c=gallery&a=uploadImage" class="link-navbar">Upload new image</a>
      </li>
      <?php if (isset($_GET['image'])) { ?>
        <li class="link-item-navbar">
          <a href="?c=gallery&a=deleteImage&image=<?php echo $_GET['image']; ?>" class="link-navbar">Delete image</a>
        </li>
        <li class="link-item-navbar">
          <a href="?c=gallery&a=updateImage&image=<?php echo $_GET['image']; ?>" class="link-navbar">Update image</a>
        </li>
      <?php } ?>
    </ol>
  </div>
</nav>
<script src="<?php echo WEBURL; ?>public/js/main.js?v=<?php echo time() ?>"></script>