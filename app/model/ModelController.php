<?php
class GalleryModel {
  private $db;
  private $images;
  private $totalRows;
  private $image;

  public function __construct() {
    $this->db = (new Connect)->connection();
  }

  public function givePhotos($mainPage, $photosPerPage) {
    $stmt = $this->db->prepare(
      "SELECT SQL_CALC_FOUND_ROWS * FROM `images` ORDER BY image_id DESC LIMIT $mainPage, $photosPerPage"
    );
    $stmt->execute();
    $this->images = $stmt->fetchAll();
    return $this->images;
  }

  public function giveTotalRows() {
    $stmt = $this->db->prepare("SELECT FOUND_ROWS() as total_rows");
    $stmt -> execute();
    $this->totalRows = $stmt->fetch()['total_rows'];
    return $this->totalRows;
  }
  
  public function getImage($id) {
    $stmt = $this->db->prepare(
      "SELECT * FROM `images` WHERE image_id = :id"
    );
    $stmt->execute(
      array(':id' => $id)
    );
    $this->image = $stmt->fetchAll();
    return $this->image;
  }
  public function saveImage($name) {
    $stmt = $this->db->prepare(
      "INSERT INTO `images` (image_id, image_address) VALUES (NULL, :nameimage)"
    );
    $stmt->execute(array(
      ':nameimage' => $name
    ));
  }
  public function deleteImage($id) {
    $stmt = $this->db->prepare(
      "DELETE FROM `images` WHERE image_id = :id"
    );
    $stmt->execute(array(
      ':id' => $id
    ));
  }
}