<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = file_get_contents('php://input');
    if ($xml) {
        $data = simplexml_load_string($xml, null, LIBXML_NOENT);
        if ($data !== false) {
            $productId = $data->storeId;

            echo "The productId is: " . $productId;
        } else {
            echo "Failed to parse XML data";
        }
    } else {
        echo "No XML data received";
    }
} else {

    echo "Only POST requests are allowed";
}
?>
