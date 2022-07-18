<?php
class GalleryController {
  private $model;
  public function __construct() {
    require_once './app/model/ModelController.php';
    $this->model = new GalleryModel;
  }
  public function getImages() { // get all images
    /* Pagination */
    $photosPerPage = 8;
    $actualPage = isset($_GET['p']) ? $_GET['p'] : 1;
    if ($actualPage < 1) {
      $actualPage = $actualPage - $actualPage + 1;
    }
    $mainPage = $actualPage>1 ? $actualPage * $photosPerPage - $photosPerPage : 0;

    $images = $this->model -> givePhotos($mainPage, $photosPerPage);
    
    /* If there are no images to show */
    if (!$images) {
      echo 'No pictures';
    }
    /* this knows how many rows there are */
    $totalRows = $this->model -> giveTotalRows();
    
    /* Calculate total of pages with images */
    $totalPages = ($totalRows/$photosPerPage);
    $totalPages = ceil($totalPages);

    require_once './app/view/getImages.php';
  }
  public function viewImage() { // get only 1 image
    $imageID = isset($_GET['image']) && $_GET['image'] >= 1 ? $_GET['image'] : header('Location: '. WEBURL);
    $image = $this->model->getImage($imageID);
    require_once './app/view/viewimage.php';
  }
  public function uploadImage() { // create new image
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $file = $_FILES['image'];
      $errorReporter = null;
      if ($file['error'] == 0) {
        if ($file['size'] <= 10000000) { // validate image size
          if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png') {
            $route = 'public/img/';
            $time = date('d-m-y-h-i-s');
            $imageName = $time.'-'.$_FILES['image']['name'];
            $completeFile = $route.$imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $completeFile); // Upload file
            $this->model->saveImage($imageName);
            header('Location: '.WEBURL);
          } else {
            $errorReporter = 'Only can use .png, .jpg, .jpeg';
          }
        } else {
          $errorReporter = 'Image too heavy';
        }
      } else {
        $errorReporter = 'Image not selected';
      }
    }
    require_once './app/view/uploadimage.php';
  }
  public function updateImage() { // update new image
    echo 'Succesful load...';
  }
  public function deleteImage() { // delete 1 image
    if(isset($_GET['image'])) {
      $route = 'public/img/';
      $imageID = $_GET['image'];
      $imageName = $this->model->getImage($imageID);
      foreach ($imageName as $img) {$img['image_address'];}
      $completeFile = $route.$img['image_address'];
      unlink($completeFile);
      $this->model->deleteImage($imageID);
      header('Location: '.WEBURL);
    } else {
      header('Location: '.WEBURL);
    }
  }
}