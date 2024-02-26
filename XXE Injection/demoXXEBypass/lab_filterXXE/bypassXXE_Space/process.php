<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function checkXMLString($xmlString) {
    $first100Chars = substr($xmlString, 0, 100);
    if (strpos($first100Chars, "file:///D:/hihi.txt") !== false) {
        return false; 
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = file_get_contents('php://input');
    if ($xml) {
        if (checkXMLString($xml)) {
            $data = simplexml_load_string($xml, null, LIBXML_NOENT);
            if ($data !== false) {
                $productId = $data->storeId;
                echo "The productId is: " . $productId;
            } else {
                echo "Failed to parse XML data";
            }
        } else {
            echo "XML contains file:///D:/hihi.txt";
        }
    } else {
        echo "No XML data received";
    }
} else {
    echo "Only POST requests are allowed";
}
?>
