<?php
require_once 'VisualContent.php';

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $averageRating;
    private $keyword;
    private $visualContent; // VisualContent object

    public function __construct($id, $name, $description, $price, $averageRating, $keyword, $visualContent = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->averageRating = $averageRating;
        $this->keyword = $keyword;
        $this->visualContent = $visualContent;
    }

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getAverageRating() {
        return $this->averageRating;
    }
    public function getKeyword() {
        return $this->keyword;
    }
    public function getVisualContent() {
        return $this->visualContent;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    public function setAverageRating($averageRating) {
        $this->averageRating = $averageRating;
    }
    public function setKeyword($keyword) {
        $this->keyword = $keyword;
    }
    public function setVisualContent($visualContent) {
        $this->visualContent = $visualContent;
    }
}
?>
