<?php
class VisualContent {
    private $id;
    private $name;
    private $description;
    private $shortName;
    private $fileType;
    private $cssClass;
    private $productId;

    public function __construct($id, $name, $description, $shortName, $fileType, $cssClass, $productId) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->shortName = $shortName;
        $this->fileType = $fileType;
        $this->cssClass = $cssClass;
        $this->productId = $productId;
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
    public function getShortName() {
        return $this->shortName;
    }
    public function getFileType() {
        return $this->fileType;
    }
    public function getCssClass() {
        return $this->cssClass;
    }
    public function getProductId() {
        return $this->productId;
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
    public function setShortName($shortName) {
        $this->shortName = $shortName;
    }
    public function setFileType($fileType) {
        $this->fileType = $fileType;
    }
    public function setCssClass($cssClass) {
        $this->cssClass = $cssClass;
    }
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    // Method to return HTML tag for visual content with optional CSS class override
    public function getHTML($overrideClass = null) {
        $class = $overrideClass ? $overrideClass : $this->cssClass;
        $src = "images/" . $this->shortName;
        $alt = htmlspecialchars($this->description);

        // Assuming only images for now; can be extended for video etc.
        return "<img class='$class' alt='$alt' src='$src'>";
    }
}
?>
