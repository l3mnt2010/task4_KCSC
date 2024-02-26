## File Inclusion Vulnerability


### Khái niệm
- File Inclusion cho phép kẻ tấn công có thể xem các tệp trên máy chủ từ xa mà không cần nhìn thấy hoặc có thể thực thi các mã vào 1 mục tiêu bất kì trên trang web .
- Điều này xảy ra là do trong code php web , lập trình viên đã sử dụng các lệnh include, require, include_once, require_once , các lệnh này cho phép việc file hiện tại có thể gọi ra 1 file khác.
- Dấu hiệu để nhận biết rằng trang web có thể tấn công file inclusion là đường link thường có dạng php?page=,hoặc php?file= .... Để biết trang web có bị lỗi này hay không ta chỉ cần thêm 1 dấu ' vào đường link , ví dụ như là php?page=' . Và trên trình duyệt sẽ có thông báo dạng

```
Warning: Warning: include() [function.include]: Failed opening ''' for inclusion (include_path='.;C:\php5\pear') in C:\wamp\www\FI.php on line 40
```

- File Inclusion có thể dẫn đến các cuộc tấn công sau :

+ Code execution on the web server
+ Cross Site Scripting Attacks (XSS)
+ Denial of service (DOS)
+ Data Manipulation Attacks

- Nguyên nhân gây ra lỗi này là khi sử dụng các lệnh trên, lập trình viên lại gọi các file cần mở thông qua biến. Các biến này hoặc chưa được khởi tạo, hoặc do người dùng quyết định.

### Phân loại

1. Local File Inclusion (LFI)
- Local file inclustion (LFI) là kĩ thuật đọc file trong hệ thống , lỗi này xảy ra thường sẽ khiến website bị lộ các thông tin nhảy cảm như là passwd, php.ini, access_log,config.php…
- Trong một cuộc tấn công LFI cơ bản , chúng ta sẽ sử dụng local file inclusion để thu thập thông tin trên máy chủ từ xa và khai thác nó để có thể chiếm được quyền root shell .

2. Remote File Inclusion (RFI)
- Remote File Inclusion còn được viết tắt là RFI cho phép kẻ tấn công nhúng một mã độc hại được tuỳ chỉnh trên trang web hoặc máy chủ bằng cách sử dụng các tập lệnh . RFI còn cho phép tải lên một tệp nằm trên máy chủ khác được chuyển đến dưới dạng hàm PHP ( include, include_once, require, or require_once)
#### Nguyên nhân
- Đây là một lỗ hổng rất phổ biến do việc sử dụng hàm include rất nhiều và cũng là thiết đặt mặc định của server như là set allow_url_include = On Lỗ hổng này sẽ khiến kẻ tấn công có thể thực thi các lệnh từ xa trên máy chủ web , xoá các phần của web và lấy dữ liệu thông tin của trang web.



### Phòng tránh :
- Xác thực đầu vào chặt hơn
- Không bao gồm các trình phân tách thư mục như "/"
- Sử dụng danh sách trắng cho các file extension được cho phép
- Set allow_url_fopen và allow_url_include thành off để giới hạn việc có thể gọi các tệp tin từ xa
- Cập nhập phiên bản mới nhất
- Cấu hình PHP để không sử dụng register_globals

### Nguyên nhân chung
- hầu hết các lỗ hổng đều sinh ra do sink và source thì nguyên nhân quan trọng đầu tiên là việc check đầu vào của các hàm dùng để nhúng vào trong chương trình

-Thiếu kiểm tra đầu vào (Input Validation): Khi ứng dụng web không kiểm tra hoặc lọc các dữ liệu đầu vào từ người dùng, như các tham số truy vấn URL, cookie hoặc các dữ liệu gửi đi thông qua form, hacker có thể chèn các đoạn mã độc hại như đường dẫn tệp tin vào các yêu cầu HTTP.

- Sử dụng các hàm không an toàn: Sử dụng các hàm như include() hoặc require() mà không kiểm tra đúng đắn có thể dẫn đến việc bị tấn công LFI hoặc RFI. Khi người dùng có thể kiểm soát các tham số truyền vào các hàm này, chúng có thể sử dụng để bao gồm (include) các tệp tin từ bên ngoài, kể cả các tệp tin không an toàn từ máy tính của hacker.

- Quyền truy cập không đúng: Nếu máy chủ web được cấu hình để chạy dưới quyền của người dùng có đặc quyền cao hơn như root hoặc administrator, việc tấn công RFI hoặc LFI có thể dẫn đến việc hacker kiểm soát toàn bộ hệ thống.

- Sử dụng đường dẫn tương đối: Sử dụng đường dẫn tương đối trong mã nguồn thay vì đường dẫn tuyệt đối có thể tạo điều kiện thuận lợi cho việc tấn công LFI, vì hacker có thể thêm các phần đường dẫn tương đối vào URL để truy cập các tệp tin không an toàn.

- Sử dụng mã nguồn mở: Sử dụng mã nguồn mở mà không cập nhật thường xuyên có thể dẫn đến việc tồn tại các lỗ hổng bảo mật đã được công bố trước đó và có thể bị khai thác để thực hiện các cuộc tấn công LFI hoặc RFI.