<?php
class GalleryModel {
  private $db;
  private $images;

  public function __construct() {
    $this->db = (new Connect)->connection();
  }
  public function givePhotos() {
    $stmt = $this->db->prepare("SELECT * FROM `images` ORDER BY image_id DESC");
    $stmt->execute();
    $this->images = $stmt->fetchAll();
    return $this->images;
  }
}