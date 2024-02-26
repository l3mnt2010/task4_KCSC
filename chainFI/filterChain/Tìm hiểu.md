## Turn any LFI to RCE use PHP filter chain


- Mục đích của chúng ta là phải RCE bằng file inclusion ạ

+ Hiểu đơn giản là chúng ta sẽ lợi dụng sự đa dang của các bảng mã của nhiều quốc gia trên thế giới sẽ có những điều kiện ngoại lệ kiểu như va chạm md5 hay là các mã bị lose compare hay là kí tự unicode khi qua hàm lower sẽ dài hơn ấy thì này cũng tương tự vậy ạ

+ Lợi dụng  php://convert.iconv.*.* wrapper để chuyển đổi giữa các bảng mã khác nhau


## Magic Base64

- Khi bình thường hàm base64_decode và wrapper convert.base64-decode có hành vi tương tự nhau
- nhưng mà 1 trường hợp ngoại lệ là khi mà chèn thêm dấu bằng thì wrapper sẽ bị lỗi
- Wrapper convert.base64-decode không thể tự động bỏ dấu = ở giữa ciphertext như cách dùng hàm thông thường.
- Để khắc phục được điều này, ta sẽ dùng iconv để chuyển từ UTF-8 sang UTF-7.
- Nguyên nhân của việc này là khi dấu = từ UTF-8 được chuyển sang UTF-7 sẽ thành chuỗi ký tự không hợp lệ trong Base64.


## BOM BOM xuất hiện ở đầu để giúp thứ tự đọc của hệ thống đồng nhất theo thuật toán của bảng mã.


Tool để tự động gen payload : https://github.com/synacktiv/php_filter_chain_generator


- Chúng sẽ lợi dụng việc lưu tmp của sever vì lưu max được 2mb và giá trị mặc định là 1 lúc này sẽ tạo 1 biến và lưu vào trong file này có dính RCE sau khi bật với file:// thì mình có thể RCE được.
