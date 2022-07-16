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
    echo 'Succesful load...';
  }
  public function uploadImage() { // create new image
    echo 'Succesful load...';
  }
  public function updateImage() { // update new image
    echo 'Succesful load...';
  }
  public function deleteImage() { // delete 1 image
    echo 'Succesful load...';
  }
}