## arbitary file read và LFI

### Local File Inclusion (LFI):

- LFI là một lỗ hổng bảo mật trong ứng dụng web cho phép tấn công viên chèn và thực thi các tệp tin trên máy chủ.
Cách thực hiện: Tấn công viên sử dụng đầu vào của ứng dụng web, thường là các tham số của URL hoặc dữ liệu gửi qua các biểu mẫu, để chèn đường dẫn của một tệp tin local vào yêu cầu HTTP.
Khi thành công, lỗ hổng LFI cho phép tấn công viên đọc nội dung của các tệp tin local trên máy chủ, chẳng hạn như tệp tin cấu hình, tệp tin log, hoặc mã nguồn của các tệp tin khác trên hệ thống.
Arbitrary File Read (ARF):

### ARF là một phần của một loạt các tấn công mà một tấn công viên có thể thực hiện sau khi khai thác một lỗ hổng LFI.
- Khác biệt chính giữa ARF và LFI là trong ARF, tấn công viên không chỉ đọc các tệp tin local mà còn có khả năng đọc bất kỳ tệp tin nào trên hệ thống, không giới hạn bởi hạn chế đường dẫn hoặc loại tệp tin.
- Trong ARF, tấn công viên thường sử dụng kỹ thuật như thay đổi đường dẫn, sử dụng các kí tự đặc biệt hoặc thậm chí khai thác các lỗ hổng khác trong hệ thống để đọc các tệp tin không nằm trong phạm vi thư mục được kiểm soát của ứng dụng web.
Tóm lại, LFI là một lỗ hổng cho phép tấn công viên đọc các tệp tin local trên máy chủ, trong khi ARF mở rộng khả năng đọc tệp tin bằng cách cho phép tấn công viên đọc bất kỳ tệp tin nào trên hệ thống, không giới hạn bởi hạn chế đường dẫn hoặc loại tệp tin.


## Theo ý hiểu của em :
+ Nhìn chung 2 lỗ hổng này có thể trông giống hệt nhau, nhưng thực ra lại là 2 cuộc tấn công khác nhau.
+ đối với file txt thì nội dung của 2 file này đều sẽ hiển thị ở 2 lỗ hổng, còn nếu mà file là PHP thì arbitary file read vẫn sẽ hiển thị nội dung của file này còn LFI sẽ xử lí file này dưới dạng PHP và được thực thi và sẽ hiện thị kết quả sau khi thực thi file, còn nếu chúng ta muốn đọc file này thì phải lợi dụng php wrapper điển hình là php filter để convert thành base64 hoặc các loại mã hóa khác để đọc được file


Nguồn : https://vulndb.wordpress.com/2013/06/20/local-file-inclusion-vs-arbitrary-file-access/