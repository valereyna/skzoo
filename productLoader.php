<?php
require_once 'Product.php';
require_once 'VisualContent.php';
require_once 'dataLoader.php';

// Function to get a single product by ID with its visual contents
function getProductById($productId) {
    $visualContentsByProductId = loadVisualContents();
    $productsData = readCSV('data/products.csv');

    foreach ($productsData as $pd) {
        if ($pd['ID'] == $productId) {
            $visualContentArray = isset($visualContentsByProductId[$productId]) ? $visualContentsByProductId[$productId] : [];
            $visualContent = count($visualContentArray) > 0 ? $visualContentArray[0] : null;
            $product = new Product(
                $pd['ID'],
                $pd['Name'],
                $pd['Description'],
                $pd['Price'],
                $pd['Average Rating'],
                $pd['Keyword'],
                $visualContent
            );
            return $product;
        }
    }
    return null;
}
?>
