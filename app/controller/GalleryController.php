<?php
class GalleryController {
  private $model;
  public function __construct() {
    require_once './app/model/ModelController.php';
    $this->model = new GalleryModel;
  }
  public function getImages() { // get all images
    $photos = $this->model -> givePhotos();
    require_once './app/view/getImages.php';
  }
  public function getImage() { // get only 1 image
    echo 'Succesful load...';
  }
  public function createImage() { // create new image
    echo 'Succesful load...';
  }
  public function updateImage() { // update new image
    echo 'Succesful load...';
  }
  public function deleteImage() { // delete 1 image
    echo 'Succesful load...';
  }
}