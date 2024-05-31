# Tên đề tài: Website xem phim trực tuyến <a href="https://pnctriet.github.io/UIT_G6_WebProject/">DEMO HERE</a>
# Giới thiệu
## Mục tiêu của project
Đây là project của môn học Phát triển ứng dụng Web - UIT. Nội dung là tạo một trang web cho phép người dùng xem phim trực tuyến, tạo playlist

Trang web phải đảm bảo được các mục tiêu:
- Giúp người dùng có thể trải nghiệm phim trực tuyến chất lượng cao.
- Tiện lợi cho người admin quản lý và thống kê thông tin ủa nền tảng.
- Giao diện hiện đại, thu hút, load nhanh.
## Các thành viên tham gia project

| STT| Họ tên                   | Email                  |
|:--:|--------------------------|------------------------|
| 1  | Phạm Nguyễn Cao Triết    | 19521050@gm.uit.edu.vn |
| 2  | Đinh Tiến Đạt            | 19521331@gm.uit.edu.vn |
| 3  | Lê Hoàng Đức             | 22520351@gm.uit.edu.vn |
| 4  | Nguyễn Trần Thành Tâm    | 21521404@gm.uit.edu.vn |
| 5  | Nguyễn Hoàng Vĩ          | 21522786@gm.uit.edu.vn |
| 6  | Ng

# Mô hình usecase   
![admin_usecase](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/datasources/photodata_readme/admin_usecase.jpg)
![admin_usecasedetails](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/datasources/photodata_readme/admin_usecasedetails.jpg)
![user_usecase](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/datasources/photodata_readme/user_usecase.jpg)
![user_usecasedetails](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/datasources/photodata_readme/user_usecasedetails.jpg)

# Mô hình ERD
![ERD_demo1](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/datasources/sqldatabase/ERD_demo1.png)

# Demo front-end
1. user page
![mainpage_1](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/mainpage_1.png)
![mainpage_2](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/mainpage_2.png)
![mainpage_3](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/mainpage_3.png)
![profilepage](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/profilepage.png)
![detailpage](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/detailpage.png)
![streamingpage](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/streamingpage.png)
2. authentication page
![signinpage](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/signinpage.png)
![signuppage](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/signuppage.png)
3. admin page
![adminpage_1](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/adminpage_1.png)
![adminpage_2](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/adminpage_2.png)
![adminpage_3](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_ORIGINAL/demo/adminpage_3.png)


# Các công nghệ sử dụng trong project
- Front-end: 
- Back-end: 
# Các modules

# Yêu cầu hệ thống

# Cài đặt và sử dụng
### Git Clone
```
$ git clone https://github.com/PNCTriet/UIT_G6_WebProject.git
$ cd UIT_G6_WEBPROJECT_LARAVEL
$ composer update
$ php artisan migrate

```
**GEMINI AI API**
Đầu tiên, cài đặt Gemini thông qua  [Composer](https://getcomposer.org/) package manager:

```bash
composer require google-gemini-php/laravel
```

Sau đó, thực thi  câu lệnh cài đặt sau:

```bash
php artisan gemini:install
```

Lệnh trên sẽ cấu hình gemini AI vào trong project.Biến môi trường có tên GEMINI_API_KEY
đã được tạo trong file .env:

```
GEMINI_API_KEY=
```
### Setup your API key

Để sử dụng Gemini API, bạn cần phải có API key.Nếu bạn không có Key, tạo một cái trong Google AI Studio

[Get an API key](https://makersuite.google.com/app/apikey)

### LARAVEL EXCEL
Cài đặt lệnh phía dưới để dùng thư viện laravel excel
```
composer require maatwebsite/excel:^3.1
```
### Chạy chương trình
Trước tiên, bật Apache serve và mysql php lên (Sử dụng XAMPP tool ).
Sau đó dùng lệnh phía dưới để khởi động chương trình
```
php artisan serve
```

# Nguồn tham khảo
