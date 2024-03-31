CREATE TABLE `User` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `fullname` varchar(50),
  `dayofbirth` date,
  `email` varchar(150),
  `phoneNumber` varchar(20),
  `address` varchar(200),
  `avartar` varchar(255),
  `role_id` integer,
  `plan_id` integer,
  `deposit_id` integer,
  `discount_id` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `User_role` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `role_type` varchar(255),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `User_credential` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `account` varchar(50),
  `password` varchar(32),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `User_deposit` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `total_money` integer,
  `deposit_detail_id` integer,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Deposit_detail` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `deposit_id` integer,
  `total_money` integer,
  `method` varchar(50),
  `status` varchar(50),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `User_plan` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `plan_type` varchar(50),
  `planstart_at` datetime,
  `planend_at` datetime,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `User_playlist` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `playlist_detail_id` integer,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Playlist_detail` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_playlist_id` integer,
  `movie_id` integer,
  `status` varchar(50),
  `currentime` integer,
  `currentepisode` integer,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Movie` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `category_id` integer,
  `specialgroup_id` integer,
  `title` varchar(250),
  `description` longtext,
  `link_id` integer,
  `created_at` datetime,
  `updated_at` datetime
);


CREATE TABLE `Movie_link` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `poster_link` varchar(255),
  `trailer_link` varchar(255),
  `movie_link` varchar(255)
);

CREATE TABLE `MovieCategory` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100)
);

CREATE TABLE `SpecialGroup` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100)
);

CREATE TABLE `Voucher` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `voucherstart_date` datetime,
  `voucherend_date` datetime,
  `code` varchar(100),
  `discount_percentage` int,
  `status` varchar(50)
);

ALTER TABLE `Playlist_detail` ADD FOREIGN KEY (`movie_id`) REFERENCES `Movie` (`id`);

ALTER TABLE `Playlist_detail` ADD FOREIGN KEY (`user_playlist_id`) REFERENCES `User_playlist` (`id`);

ALTER TABLE `User_playlist` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `User_deposit` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `User` ADD FOREIGN KEY (`role_id`) REFERENCES `User_role` (`id`);

ALTER TABLE `User` ADD FOREIGN KEY (`plan_id`) REFERENCES `User_plan` (`id`);

ALTER TABLE `Deposit_detail` ADD FOREIGN KEY (`deposit_id`) REFERENCES `User_deposit` (`id`);

ALTER TABLE `User_credential` ADD FOREIGN KEY (`id`) REFERENCES `User` (`id`);

ALTER TABLE `Movie` ADD FOREIGN KEY (`category_id`) REFERENCES `MovieCategory` (`id`);

ALTER TABLE `Movie` ADD FOREIGN KEY (`SpecialGroup_id`) REFERENCES `SpecialGroup` (`id`);

ALTER TABLE `Movie` ADD FOREIGN KEY (`link_id`) REFERENCES `Movie_link` (`id`);

ALTER TABLE `User` ADD FOREIGN KEY (`discount_id`) REFERENCES `Voucher` (`id`);


-- Chèn dữ liệu mẫu

-- Chèn dữ liệu cho bảng User_role
INSERT INTO User_role (role_type, created_at, updated_at)
VALUES ('Admin', NOW(), NOW()),
       ('User', NOW(), NOW());

-- Chèn dữ liệu cho bảng User_plan
INSERT INTO User_plan (plan_type, planstart_at, planend_at, created_at, updated_at)
VALUES ('Basic', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH), NOW(), NOW()),
       ('Premium', NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR), NOW(), NOW());

-- Chèn dữ liệu cho bảng User
INSERT INTO User (fullname, dayofbirth, email, phoneNumber, address, avartar, role_id, plan_id, deposit_id, discount_id, created_at, updated_at)
VALUES ('John Doe', '1990-05-15', 'john.doe@example.com', '1234567890', '123 Main St, City, Country', 'avatar1.jpg', 1, 1, 1, NULL, NOW(), NOW()),
       ('Jane Smith', '1985-08-25', 'jane.smith@example.com', '9876543210', '456 Elm St, Town, Country', 'avatar2.jpg', 2, 2, 2, NULL, NOW(), NOW());

-- Chèn dữ liệu cho bảng User_credential
INSERT INTO User_credential (account, password, created_at, updated_at)
VALUES ('john.doe@example.com', 'password123', NOW(), NOW()),
       ('jane.smith@example.com', 'letmein', NOW(), NOW());

-- Chèn dữ liệu cho bảng User_deposit
INSERT INTO User_deposit (user_id, total_money, deposit_detail_id, created_at, updated_at)
VALUES (1, 100, 1, NOW(), NOW()),
       (2, 200, 2, NOW(), NOW());

-- Chèn dữ liệu cho bảng Deposit_detail
INSERT INTO Deposit_detail (deposit_id, total_money, method, status, created_at, updated_at)
VALUES (1, 100, 'Credit Card', 'Success', NOW(), NOW()),
       (2, 200, 'PayPal', 'Success', NOW(), NOW());

-- Chèn dữ liệu cho bảng Movie_link
INSERT INTO Movie_link (poster_link, trailer_link, movie_link)
VALUES ('https://drive.google.com/file/d/1cazTFU1cx8Z9V9HvWAELwOy3hzNTpHAj/view?usp=drive_link', 'https://www.youtube.com/watch?v=nvdSbuizTUA&pp=ygUgZ2nhu69hIGPGoW4gYsOjbyB0dXnhur90IHRyYWlsZXI%3D', 'https://www.youtube.com/watch?v=nvdSbuizTUA&pp=ygUgZ2nhu69hIGPGoW4gYsOjbyB0dXnhur90IHRyYWlsZXI%3D'),
       ('https://drive.google.com/file/d/1fF3onZyrXvtv3yT73n_Rry5y8Za1lCPo/view?usp=drive_link', 'https://www.youtube.com/watch?v=9SdYFYflVbw&pp=ygUlbuG7ryBsdeG6rXQgc8awIHdvbyB5b3VuZyB3b28gdHJhaWxlcg%3D%3D', 'https://www.youtube.com/watch?v=9SdYFYflVbw&pp=ygUlbuG7ryBsdeG6rXQgc8awIHdvbyB5b3VuZyB3b28gdHJhaWxlcg%3D%3D');

-- Chèn dữ liệu cho bảng MovieCategory
INSERT INTO MovieCategory (name)
VALUES ('Action'),
       ('Comedy'),
       ('Drama');

-- Chèn dữ liệu cho bảng SpecialGroup
INSERT INTO SpecialGroup (name)
VALUES ('New Releases'),
       ('Top Rated');

-- Chèn dữ liệu cho bảng Voucher
INSERT INTO Voucher (name, voucherstart_date, voucherend_date, code, discount_percentage, status)
VALUES ('Spring Sale', NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH), 'SPRING2024', 20, 'Active'),
       ('Summer Discount', NOW(), DATE_ADD(NOW(), INTERVAL 2 MONTH), 'SUMMER2024', 15, 'Active');


-- Chèn dữ liệu cho bảng Movie
INSERT INTO Movie (category_id, specialgroup_id, title, description, link_id, created_at, updated_at)
VALUES (1, 1, 'Action Movie 1', 'Description of Action Movie 1', 1, NOW(), NOW()),
       (2, 2, 'Comedy Movie 1', 'Description of Comedy Movie 1', 2, NOW(), NOW());



-- Chèn dữ liệu cho bảng User_playlist
INSERT INTO User_playlist (user_id, playlist_detail_id, created_at, updated_at)
VALUES (1, 1, NOW(), NOW()),
       (2, 2, NOW(), NOW());

-- Chèn dữ liệu cho bảng Playlist_detail
INSERT INTO Playlist_detail (user_playlist_id, movie_id, status, currentime, currentepisode, created_at, updated_at)
VALUES (1, 1, 'Watching', 120, 3, NOW(), NOW()),
       (2, 2, 'Paused', 90, 2, NOW(), NOW());

