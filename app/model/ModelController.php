<?php
class GalleryModel {
  private $db;
  private $images;
  private $totalRows;

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
}