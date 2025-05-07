<?php
require_once 'Product.php';
require_once 'VisualContent.php';

// Function to read CSV file and return array of associative arrays
function readCSV($filename) {
    $rows = [];
    if (!file_exists($filename) || !is_readable($filename)) {
        return $rows;
    }
    if (($handle = fopen($filename, 'r')) !== false) {
        $header = fgetcsv($handle);
        while (($data = fgetcsv($handle)) !== false) {
            $rows[] = array_combine($header, $data);
        }
        fclose($handle);
    }
    return $rows;
}

// Load visual content data indexed by product ID as arrays of VisualContent objects
function loadVisualContents() {
    $visualContentsData = readCSV('data/visualcontent.csv');
    $visualContentsByProductId = [];
    foreach ($visualContentsData as $vc) {
        $visualContent = new VisualContent(
            $vc['ID'],
            $vc['Name'],
            $vc['Description'],
            $vc['Short Name'],
            $vc['File Type'],
            $vc['CSS Class'],
            $vc['Product ID']
        );
        if (!isset($visualContentsByProductId[$vc['Product ID']])) {
            $visualContentsByProductId[$vc['Product ID']] = [];
        }
        $visualContentsByProductId[$vc['Product ID']][] = $visualContent;
    }
    return $visualContentsByProductId;
}

// Load products data and create Product objects with associated visual contents
function loadProducts($visualContentsByProductId) {
    $productsData = readCSV('data/products.csv');
    $products = [];
    foreach ($productsData as $pd) {
        $productId = $pd['ID'];
        $visualContentArray = isset($visualContentsByProductId[$productId]) ? $visualContentsByProductId[$productId] : [];
        $visualContent = count($visualContentArray) > 0 ? $visualContentArray[0] : null;
        $product = new Product(
            $productId,
            $pd['Name'],
            $pd['Description'],
            $pd['Price'],
            $pd['Average Rating'],
            $pd['Keyword'],
            $visualContent
        );
        $products[] = $product;
    }
    return $products;
}
?>
