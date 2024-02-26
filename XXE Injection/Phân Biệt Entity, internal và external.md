- Entity:

- một entity là một thực thể có thể được sử dụng để định nghĩa lại các giá trị dùng chung (như văn bản, ký tự đặc biệt, hoặc thậm chí là các đoạn mã XML) và tái sử dụng chúng ở nhiều nơi trong tài liệu XML.
- Có hai loại entity: internal entity và external entity.
- Internal entity là entity được định nghĩa trong cùng một tài liệu XML mà nó được sử dụng.
- External entity là entity được định nghĩa bên ngoài tài liệu XML hiện tại và được tham chiếu tới từ tài liệu XML đó.

-External DTD (Document Type Definition):

- DTD là một tập hợp các quy tắc được sử dụng để xác định cấu trúc và nội dung của một tài liệu XML.
- External DTD là một DTD được lưu trữ trong một tệp tin riêng biệt và được tham chiếu vào từ tài liệu XML bằng cách sử dụng khai báo DOCTYPE.
- External DTD cho phép tái sử dụng DTD trong nhiều tài liệu XML khác nhau và dễ dàng quản lý cấu trúc của chúng.
- Internal DTD (Document Type Definition):

- Internal DTD là một DTD được đặt trực tiếp trong phần khai báo DOCTYPE của tài liệu XML.
- Internal DTD thường được sử dụng khi cấu trúc DTD chỉ áp dụng cho một tài liệu XML cụ thể và không cần tái sử dụng trong các tài liệu khác.
### phân biệt:

- Entity là một thực thể trong XML có thể định nghĩa giá trị dùng chung và tái sử dụng ở nhiều nơi, nó giống kiểu biến được khai báo trong mã bình thường.
- Entity
Entity: là một khái niệm có thể được sử dụng như một kiểu tham chiếu đến dữ liệu, cho phép thay thế một ký tự đặc biệt, một khối văn bản hay thậm chí toàn bộ nội dung một file vào trong tài liệu xml. Một số kiểu entity: character, parameter, named (internal), external…
Có thể coi các entity là một biến để lưu trữ dữ liệu vậy, chúng ta có thể khai báo nó một lần, gán giá trị vào cho nó và sử dụng ở trên toàn bộ file XML. Các entity chỉ có thể được khai báo ở DTD (Document Type Definition)
Entity có thể được khai báo như sau:
```
<!ENTITY entity-name “entity-value” >
```
Hoặc:

```
<!ENTITY entity-name SYSTEM "URI/URL">
```
- External DTD là một tập hợp quy tắc xác định cấu trúc của một tài liệu XML, được lưu trữ trong một tệp tin riêng biệt và được tham chiếu vào từ tài liệu XML bằng cách sử dụng khai báo DOCTYPE.
- Internal DTD là một tập hợp quy tắc xác định cấu trúc của một tài liệu XML, được đặt trực tiếp trong phần khai báo DOCTYPE của tài liệu XML.