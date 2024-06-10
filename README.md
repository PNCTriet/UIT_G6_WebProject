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

# Mô hình usecase   
![admin_usecasedetails](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_LARAVEL/public/datasources/photodata_readme/admin_usecasedetails.jpg)
![user_usecasedetails](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_LARAVEL/public/datasources/photodata_readme/user_usecasedetails.jpg)

# Mô hình ERD
![ERD_demo1](https://github.com/PNCTriet/UIT_G6_WebProject/blob/main/UIT_G6_WEBPROJECT_LARAVEL/public/datasources/sqldatabase/ERD_demo1.png)

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
- [XAMPP](https://www.apachefriends.org/index.html) (Phiên bản khuyến nghị: X.X.X)
- [Composer](https://getcomposer.org/download/)
- PHP >= 7.3 (Tích hợp sẵn trong XAMPP)


# Cài đặt và sử dụng
## Bước 1: Cài đặt XAMPP
1. Tải và cài đặt [XAMPP](https://www.apachefriends.org/index.html).
2. Khởi động XAMPP Control Panel và bật `Apache` và `MySQL`.

## Bước 2: Cài đặt Composer
1. Tải và cài đặt [Composer](https://getcomposer.org/download/).

## Bước 3: Thiết lập dự án Laravel
1. Clone hoặc tải về mã nguồn của dự án Laravel vào thư mục `htdocs` của XAMPP.
    ```bash
    cd C:\xampp\htdocs
    git git clone https://github.com/PNCTriet/UIT_G6_WebProject.git
    cd UIT_G6_WEBPROJECT_LARAVEL
    ```
2. Cài đặt các gói phụ thuộc của Laravel:
    ```bash
    composer install
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
3. Sao chép file `.env.xample` thành `.env` và cấu hình cơ sở dữ liệu:
```bash
cp .env.example .env
```
## Bước 4:Cấu hình cơ sở dữ liệu
1. Mở phpMyAdmin qua [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Tạo một cơ sở dữ liệu mới.
3. Cập nhật file `.env` với thông tin cơ sở dữ liệu:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<tên-cơ-sở-dữ-liệu>
    DB_USERNAME=root
    DB_PASSWORD=
    ```
## Bước 5: Chạy các migration và database
1. Đầu tiên,Chạy lệnh truy vấn trực triếp trên hệ QTCSDL MySQL PHP
Copy tất các các câu truy vấn trong file SQL_demo1.sql `datasources/sqldatabase/SQL_demo1.sql` sau đó Paste vào MySQL.Nhấn Run để tạo bảng và dữ liệu.
2. Tiếp theo,chạy lệnh sau để thêm các bảng cần thiết:
```bash
php artisan migrate
```
### Bước 6:Chạy ứng dụng
1. Khởi động server Laravel:
    ```bash
    php artisan serve
    ```
2. Truy cập ứng dụng tại [http://localhost:8000](http://localhost:8000).
# Nguồn tham khảo
