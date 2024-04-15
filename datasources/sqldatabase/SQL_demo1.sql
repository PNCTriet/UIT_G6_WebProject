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
VALUES 
('datasources/filmphoto_[body]/filmphoto_[body]_1.png', 'https://www.youtube.com/watch?v=nvdSbuizTUA&pp=ygUgZ2nhu69hIGPGoW4gYsOjbyB0dXnhur90IHRyYWlsZXI%3D', 'https://www.youtube.com/watch?v=nvdSbuizTUA&pp=ygUgZ2nhu69hIGPGoW4gYsOjbyB0dXnhur90IHRyYWlsZXI%3D'),
('datasources/filmphoto_[body]/filmphoto_[body]_2.png', 'https://www.youtube.com/watch?v=9SdYFYflVbw&pp=ygUlbuG7ryBsdeG6rXQgc8awIHdvbyB5b3VuZyB3b28gdHJhaWxlcg%3D%3D', 'https://www.youtube.com/watch?v=9SdYFYflVbw&pp=ygUlbuG7ryBsdeG6rXQgc8awIHdvbyB5b3VuZyB3b28gdHJhaWxlcg%3D%3D'),
('datasources/filmphoto_[body]/filmphoto_[body]_3.png', 'trailer_link_3', 'movie_link_3'),
('datasources/filmphoto_[body]/filmphoto_[body]_4.png', 'trailer_link_4', 'movie_link_4'),
('datasources/filmphoto_[body]/filmphoto_[body]_5.png', 'trailer_link_5', 'movie_link_5'),
('datasources/filmphoto_[body]/filmphoto_[body]_6.png', 'trailer_link_6', 'movie_link_6'),
('datasources/filmphoto_[body]/filmphoto_[body]_7.png', 'trailer_link_7', 'movie_link_7'),
('datasources/filmphoto_[body]/filmphoto_[body]_8.png', 'trailer_link_8', 'movie_link_8'),
('datasources/filmphoto_[body]/filmphoto_[body]_9.png', 'trailer_link_9', 'movie_link_9'),
('datasources/filmphoto_[body]/filmphoto_[body]_10.png', 'trailer_link_10', 'movie_link_10'),
('datasources/filmphoto_[body]/filmphoto_[body]_11.png', 'trailer_link_11', 'movie_link_11'),
('datasources/filmphoto_[body]/filmphoto_[body]_12.png', 'trailer_link_12', 'movie_link_12'),
('datasources/filmphoto_[body]/filmphoto_[body]_13.png', 'trailer_link_13', 'movie_link_13'),
('datasources/filmphoto_[body]/filmphoto_[body]_14.png', 'trailer_link_14', 'movie_link_14'),
('datasources/filmphoto_[body]/filmphoto_[body]_15.png', 'trailer_link_15', 'movie_link_15'),
('datasources/filmphoto_[body]/filmphoto_[body]_16.png', 'trailer_link_16', 'movie_link_16'),
('datasources/filmphoto_[body]/filmphoto_[body]_17.png', 'trailer_link_17', 'movie_link_17'),
('datasources/filmphoto_[body]/filmphoto_[body]_18.png', 'trailer_link_18', 'movie_link_18'),
('datasources/filmphoto_[body]/filmphoto_[body]_19.png', 'trailer_link_19', 'movie_link_19'),
('datasources/filmphoto_[body]/filmphoto_[body]_20.png', 'trailer_link_20', 'movie_link_20'),
('datasources/filmphoto_[body]/filmphoto_[body]_21.png', 'trailer_link_21', 'movie_link_21'),
('datasources/filmphoto_[body]/filmphoto_[body]_22.png', 'trailer_link_22', 'movie_link_22'),
('datasources/filmphoto_[body]/filmphoto_[body]_23.png', 'trailer_link_23', 'movie_link_23'),
('datasources/filmphoto_[body]/filmphoto_[body]_24.png', 'trailer_link_24', 'movie_link_24'),
('datasources/filmphoto_[body]/filmphoto_[body]_25.png', 'trailer_link_25', 'movie_link_25'),
('datasources/filmphoto_[body]/filmphoto_[body]_26.png', 'trailer_link_26', 'movie_link_26'),
('datasources/filmphoto_[body]/filmphoto_[body]_27.png', 'trailer_link_27', 'movie_link_27'),
('datasources/filmphoto_[body]/filmphoto_[body]_28.png', 'trailer_link_28', 'movie_link_28'),
('datasources/filmphoto_[body]/filmphoto_[body]_29.png', 'trailer_link_29', 'movie_link_29'),
('datasources/filmphoto_[body]/filmphoto_[body]_30.png', 'trailer_link_30', 'movie_link_30'),
('datasources/filmphoto_[body]/filmphoto_[body]_31.png', 'trailer_link_31', 'movie_link_31'),
('datasources/filmphoto_[body]/filmphoto_[body]_32.png', 'trailer_link_32', 'movie_link_32'),
('datasources/filmphoto_[body]/filmphoto_[body]_33.png', 'trailer_link_33', 'movie_link_33'),
('datasources/filmphoto_[body]/filmphoto_[body]_34.png', 'trailer_link_34', 'movie_link_34'),
('datasources/filmphoto_[body]/filmphoto_[body]_35.png', 'trailer_link_35', 'movie_link_35'),
('datasources/filmphoto_[body]/filmphoto_[body]_36.png', 'trailer_link_36', 'movie_link_36'),
('datasources/filmphoto_[body]/filmphoto_[body]_37.png', 'trailer_link_37', 'movie_link_37'),
('datasources/filmphoto_[body]/filmphoto_[body]_38.png', 'trailer_link_38', 'movie_link_38'),
('datasources/filmphoto_[body]/filmphoto_[body]_39.png', 'trailer_link_39', 'movie_link_39'),
('datasources/filmphoto_[body]/filmphoto_[body]_40.png', 'trailer_link_40', 'movie_link_40'),
('datasources/filmphoto_[body]/filmphoto_[body]_41.png', 'trailer_link_41', 'movie_link_41'),
('datasources/filmphoto_[body]/filmphoto_[body]_42.png', 'trailer_link_42', 'movie_link_42'),
('datasources/filmphoto_[body]/filmphoto_[body]_43.png', 'trailer_link_43', 'movie_link_43'),
('datasources/filmphoto_[body]/filmphoto_[body]_44.png', 'trailer_link_44', 'movie_link_44'),
('datasources/filmphoto_[body]/filmphoto_[body]_45.png', 'trailer_link_45', 'movie_link_45'),
('datasources/filmphoto_[body]/filmphoto_[body]_46.png', 'trailer_link_46', 'movie_link_46'),
('datasources/filmphoto_[body]/filmphoto_[body]_47.png', 'trailer_link_47', 'movie_link_47'),
('datasources/filmphoto_[body]/filmphoto_[body]_48.png', 'trailer_link_48', 'movie_link_48'),
('datasources/filmphoto_[body]/filmphoto_[body]_49.png', 'trailer_link_49', 'movie_link_49'),
('datasources/filmphoto_[body]/filmphoto_[body]_50.png', 'trailer_link_50', 'movie_link_50'),
('datasources/filmphoto_[body]/filmphoto_[body]_51.png', 'trailer_link_51', 'movie_link_51'),
('datasources/filmphoto_[body]/filmphoto_[body]_52.png', 'trailer_link_52', 'movie_link_52'),
('datasources/filmphoto_[body]/filmphoto_[body]_53.png', 'trailer_link_53', 'movie_link_53'),
('datasources/filmphoto_[body]/filmphoto_[body]_54.png', 'trailer_link_54', 'movie_link_54'),
('datasources/filmphoto_[body]/filmphoto_[body]_55.png', 'trailer_link_55', 'movie_link_55'),
('datasources/filmphoto_[body]/filmphoto_[body]_56.png', 'trailer_link_56', 'movie_link_56'),
('datasources/filmphoto_[body]/filmphoto_[body]_57.png', 'trailer_link_57', 'movie_link_57'),
('datasources/filmphoto_[body]/filmphoto_[body]_58.png', 'trailer_link_58', 'movie_link_58'),
('datasources/filmphoto_[body]/filmphoto_[body]_59.png', 'trailer_link_59', 'movie_link_59'),
('datasources/filmphoto_[body]/filmphoto_[body]_60.png', 'trailer_link_60', 'movie_link_60'),
('datasources/filmphoto_[body]/filmphoto_[body]_61.png', 'trailer_link_61', 'movie_link_61'),
('datasources/filmphoto_[body]/filmphoto_[body]_62.png', 'trailer_link_62', 'movie_link_62'),
('datasources/filmphoto_[body]/filmphoto_[body]_63.png', 'trailer_link_63', 'movie_link_63'),
('datasources/filmphoto_[body]/filmphoto_[body]_64.png', 'trailer_link_64', 'movie_link_64'),
('datasources/filmphoto_[body]/filmphoto_[body]_65.png', 'trailer_link_65', 'movie_link_65'),
('datasources/filmphoto_[body]/filmphoto_[body]_66.png', 'trailer_link_66', 'movie_link_66'),
('datasources/filmphoto_[body]/filmphoto_[body]_67.png', 'trailer_link_67', 'movie_link_67'),
('datasources/filmphoto_[body]/filmphoto_[body]_68.png', 'trailer_link_68', 'movie_link_68'),
('datasources/filmphoto_[body]/filmphoto_[body]_69.png', 'trailer_link_69', 'movie_link_69'),
('datasources/filmphoto_[body]/filmphoto_[body]_70.png', 'trailer_link_70', 'movie_link_70'),
('datasources/filmphoto_[body]/filmphoto_[body]_71.png', 'trailer_link_71', 'movie_link_71'),
('datasources/filmphoto_[body]/filmphoto_[body]_72.png', 'trailer_link_72', 'movie_link_72'),
('datasources/filmphoto_[body]/filmphoto_[body]_73.png', 'trailer_link_73', 'movie_link_73'),
('datasources/filmphoto_[body]/filmphoto_[body]_74.png', 'trailer_link_74', 'movie_link_74'),
('datasources/filmphoto_[body]/filmphoto_[body]_75.png', 'trailer_link_75', 'movie_link_75'),
('datasources/filmphoto_[body]/filmphoto_[body]_76.png', 'trailer_link_76', 'movie_link_76'),
('datasources/filmphoto_[body]/filmphoto_[body]_77.png', 'trailer_link_77', 'movie_link_77'),
('datasources/filmphoto_[body]/filmphoto_[body]_78.png', 'trailer_link_78', 'movie_link_78'),
('datasources/filmphoto_[body]/filmphoto_[body]_79.png', 'trailer_link_79', 'movie_link_79'),
('datasources/filmphoto_[body]/filmphoto_[body]_80.png', 'trailer_link_80', 'movie_link_80'),
('datasources/filmphoto_[body]/filmphoto_[body]_81.png', 'trailer_link_81', 'movie_link_81'),
('datasources/filmphoto_[body]/filmphoto_[body]_82.png', 'trailer_link_82', 'movie_link_82'),
('datasources/filmphoto_[body]/filmphoto_[body]_83.png', 'trailer_link_83', 'movie_link_83'),
('datasources/filmphoto_[body]/filmphoto_[body]_84.png', 'trailer_link_84', 'movie_link_84'),
('datasources/filmphoto_[body]/filmphoto_[body]_85.png', 'trailer_link_85', 'movie_link_85'),
('datasources/filmphoto_[body]/filmphoto_[body]_86.png', 'trailer_link_86', 'movie_link_86'),
('datasources/filmphoto_[body]/filmphoto_[body]_87.png', 'trailer_link_87', 'movie_link_87'),
('datasources/filmphoto_[body]/filmphoto_[body]_88.png', 'trailer_link_88', 'movie_link_88'),
('datasources/filmphoto_[body]/filmphoto_[body]_89.png', 'trailer_link_89', 'movie_link_89'),
('datasources/filmphoto_[body]/filmphoto_[body]_90.png', 'trailer_link_90', 'movie_link_90'),
('datasources/filmphoto_[body]/filmphoto_[body]_91.png', 'trailer_link_91', 'movie_link_91'),
('datasources/filmphoto_[body]/filmphoto_[body]_92.png', 'trailer_link_92', 'movie_link_92'),
('datasources/filmphoto_[body]/filmphoto_[body]_93.png', 'trailer_link_93', 'movie_link_93'),
('datasources/filmphoto_[body]/filmphoto_[body]_94.png', 'trailer_link_94', 'movie_link_94'),
('datasources/filmphoto_[body]/filmphoto_[body]_95.png', 'trailer_link_95', 'movie_link_95'),
('datasources/filmphoto_[body]/filmphoto_[body]_96.png', 'trailer_link_96', 'movie_link_96'),
('datasources/filmphoto_[body]/filmphoto_[body]_97.png', 'trailer_link_97', 'movie_link_97'),
('datasources/filmphoto_[body]/filmphoto_[body]_98.png', 'trailer_link_98', 'movie_link_98'),
('datasources/filmphoto_[body]/filmphoto_[body]_99.png', 'trailer_link_99', 'movie_link_99'),
('datasources/filmphoto_[body]/filmphoto_[body]_100.png', 'trailer_link_100', 'movie_link_100'),
('datasources/filmphoto_[body]/filmphoto_[body]_101.png', 'trailer_link_101', 'movie_link_101');

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
VALUES 
(1, 1, 'Action Movie 1', 'Description of Action Movie 1', 1, NOW(), NOW()),
(1, 1, 'Action Movie 2', 'Description of Action Movie 2', 2, NOW(), NOW()),
(1, 1, 'Action Movie 3', 'Description of Action Movie 3', 3, NOW(), NOW()),
(1, 1, 'Action Movie 4', 'Description of Action Movie 4', 4, NOW(), NOW()),
(1, 1, 'Action Movie 5', 'Description of Action Movie 5', 5, NOW(), NOW()),
(1, 1, 'Action Movie 6', 'Description of Action Movie 6', 6, NOW(), NOW()),
(1, 1, 'Action Movie 7', 'Description of Action Movie 7', 7, NOW(), NOW()),
(1, 1, 'Action Movie 8', 'Description of Action Movie 8', 8, NOW(), NOW()),
(1, 1, 'Action Movie 9', 'Description of Action Movie 9', 9, NOW(), NOW()),
(1, 1, 'Action Movie 10', 'Description of Action Movie 10', 10, NOW(), NOW()),
(1, 1, 'Action Movie 11', 'Description of Action Movie 11', 11, NOW(), NOW()),
(1, 1, 'Action Movie 12', 'Description of Action Movie 12', 12, NOW(), NOW()),
(1, 1, 'Action Movie 13', 'Description of Action Movie 13', 13, NOW(), NOW()),
(1, 1, 'Action Movie 14', 'Description of Action Movie 14', 14, NOW(), NOW()),
(1, 1, 'Action Movie 15', 'Description of Action Movie 15', 15, NOW(), NOW()),
(1, 1, 'Action Movie 16', 'Description of Action Movie 16', 16, NOW(), NOW()),
(1, 1, 'Action Movie 17', 'Description of Action Movie 17', 17, NOW(), NOW()),
(1, 1, 'Action Movie 18', 'Description of Action Movie 18', 18, NOW(), NOW()),
(1, 1, 'Action Movie 19', 'Description of Action Movie 19', 19, NOW(), NOW()),
(1, 1, 'Action Movie 20', 'Description of Action Movie 20', 20, NOW(), NOW()),
(1, 1, 'Action Movie 21', 'Description of Action Movie 21', 21, NOW(), NOW()),
(1, 1, 'Action Movie 22', 'Description of Action Movie 22', 22, NOW(), NOW()),
(1, 1, 'Action Movie 23', 'Description of Action Movie 23', 23, NOW(), NOW()),
(1, 1, 'Action Movie 24', 'Description of Action Movie 24', 24, NOW(), NOW()),
(1, 1, 'Action Movie 25', 'Description of Action Movie 25', 25, NOW(), NOW()),
(1, 1, 'Action Movie 26', 'Description of Action Movie 26', 26, NOW(), NOW()),
(1, 1, 'Action Movie 27', 'Description of Action Movie 27', 27, NOW(), NOW()),
(1, 1, 'Action Movie 28', 'Description of Action Movie 28', 28, NOW(), NOW()),
(1, 1, 'Action Movie 29', 'Description of Action Movie 29', 29, NOW(), NOW()),
(1, 1, 'Action Movie 30', 'Description of Action Movie 30', 30, NOW(), NOW()),
(1, 1, 'Action Movie 31', 'Description of Action Movie 31', 31, NOW(), NOW()),
(1, 1, 'Action Movie 32', 'Description of Action Movie 32', 32, NOW(), NOW()),
(1, 1, 'Action Movie 33', 'Description of Action Movie 33', 33, NOW(), NOW()),
(1, 1, 'Action Movie 34', 'Description of Action Movie 34', 34, NOW(), NOW()),
(1, 1, 'Action Movie 35', 'Description of Action Movie 35', 35, NOW(), NOW()),
(1, 1, 'Action Movie 36', 'Description of Action Movie 36', 36, NOW(), NOW()),
(1, 1, 'Action Movie 37', 'Description of Action Movie 37', 37, NOW(), NOW()),
(1, 1, 'Action Movie 38', 'Description of Action Movie 38', 38, NOW(), NOW()),
(1, 1, 'Action Movie 39', 'Description of Action Movie 39', 39, NOW(), NOW()),
(1, 1, 'Action Movie 40', 'Description of Action Movie 40', 40, NOW(), NOW()),
(1, 1, 'Action Movie 41', 'Description of Action Movie 41', 41, NOW(), NOW()),
(1, 1, 'Action Movie 42', 'Description of Action Movie 42', 42, NOW(), NOW()),
(1, 1, 'Action Movie 43', 'Description of Action Movie 43', 43, NOW(), NOW()),
(1, 1, 'Action Movie 44', 'Description of Action Movie 44', 44, NOW(), NOW()),
(1, 1, 'Action Movie 45', 'Description of Action Movie 45', 45, NOW(), NOW()),
(1, 1, 'Action Movie 46', 'Description of Action Movie 46', 46, NOW(), NOW()),
(1, 1, 'Action Movie 47', 'Description of Action Movie 47', 47, NOW(), NOW()),
(1, 1, 'Action Movie 48', 'Description of Action Movie 48', 48, NOW(), NOW()),
(1, 1, 'Action Movie 49', 'Description of Action Movie 49', 49, NOW(), NOW()),
(1, 1, 'Action Movie 50', 'Description of Action Movie 50', 50, NOW(), NOW()),
(1, 1, 'Action Movie 51', 'Description of Action Movie 51', 51, NOW(), NOW()),
(1, 1, 'Action Movie 52', 'Description of Action Movie 52', 52, NOW(), NOW()),
(1, 1, 'Action Movie 53', 'Description of Action Movie 53', 53, NOW(), NOW()),
(1, 1, 'Action Movie 54', 'Description of Action Movie 54', 54, NOW(), NOW()),
(1, 1, 'Action Movie 55', 'Description of Action Movie 55', 55, NOW(), NOW()),
(1, 1, 'Action Movie 56', 'Description of Action Movie 56', 56, NOW(), NOW()),
(1, 1, 'Action Movie 57', 'Description of Action Movie 57', 57, NOW(), NOW()),
(1, 1, 'Action Movie 58', 'Description of Action Movie 58', 58, NOW(), NOW()),
(1, 1, 'Action Movie 59', 'Description of Action Movie 59', 59, NOW(), NOW()),
(1, 1, 'Action Movie 60', 'Description of Action Movie 60', 60, NOW(), NOW()),
(1, 1, 'Action Movie 61', 'Description of Action Movie 61', 61, NOW(), NOW()),
(1, 1, 'Action Movie 62', 'Description of Action Movie 62', 62, NOW(), NOW()),
(1, 1, 'Action Movie 63', 'Description of Action Movie 63', 63, NOW(), NOW()),
(1, 1, 'Action Movie 64', 'Description of Action Movie 64', 64, NOW(), NOW()),
(1, 1, 'Action Movie 65', 'Description of Action Movie 65', 65, NOW(), NOW()),
(1, 1, 'Action Movie 66', 'Description of Action Movie 66', 66, NOW(), NOW()),
(1, 1, 'Action Movie 67', 'Description of Action Movie 67', 67, NOW(), NOW()),
(1, 1, 'Action Movie 68', 'Description of Action Movie 68', 68, NOW(), NOW()),
(1, 1, 'Action Movie 69', 'Description of Action Movie 69', 69, NOW(), NOW()),
(1, 1, 'Action Movie 70', 'Description of Action Movie 70', 70, NOW(), NOW()),
(1, 1, 'Action Movie 71', 'Description of Action Movie 71', 71, NOW(), NOW()),
(1, 1, 'Action Movie 72', 'Description of Action Movie 72', 72, NOW(), NOW()),
(1, 1, 'Action Movie 73', 'Description of Action Movie 73', 73, NOW(), NOW()),
(1, 1, 'Action Movie 74', 'Description of Action Movie 74', 74, NOW(), NOW()),
(1, 1, 'Action Movie 75', 'Description of Action Movie 75', 75, NOW(), NOW()),
(1, 1, 'Action Movie 76', 'Description of Action Movie 76', 76, NOW(), NOW()),
(1, 1, 'Action Movie 77', 'Description of Action Movie 77', 77, NOW(), NOW()),
(1, 1, 'Action Movie 78', 'Description of Action Movie 78', 78, NOW(), NOW()),
(1, 1, 'Action Movie 79', 'Description of Action Movie 79', 79, NOW(), NOW()),
(1, 1, 'Action Movie 80', 'Description of Action Movie 80', 80, NOW(), NOW()),
(1, 1, 'Action Movie 81', 'Description of Action Movie 81', 81, NOW(), NOW()),
(1, 1, 'Action Movie 82', 'Description of Action Movie 82', 82, NOW(), NOW()),
(1, 1, 'Action Movie 83', 'Description of Action Movie 83', 83, NOW(), NOW()),
(1, 1, 'Action Movie 84', 'Description of Action Movie 84', 84, NOW(), NOW()),
(1, 1, 'Action Movie 85', 'Description of Action Movie 85', 85, NOW(), NOW()),
(1, 1, 'Action Movie 86', 'Description of Action Movie 86', 86, NOW(), NOW()),
(1, 1, 'Action Movie 87', 'Description of Action Movie 87', 87, NOW(), NOW()),
(1, 1, 'Action Movie 88', 'Description of Action Movie 88', 88, NOW(), NOW()),
(1, 1, 'Action Movie 89', 'Description of Action Movie 89', 89, NOW(), NOW()),
(1, 1, 'Action Movie 90', 'Description of Action Movie 90', 90, NOW(), NOW()),
(1, 1, 'Action Movie 91', 'Description of Action Movie 91', 91, NOW(), NOW()),
(1, 1, 'Action Movie 92', 'Description of Action Movie 92', 92, NOW(), NOW()),
(1, 1, 'Action Movie 93', 'Description of Action Movie 93', 93, NOW(), NOW()),
(1, 1, 'Action Movie 94', 'Description of Action Movie 94', 94, NOW(), NOW()),
(1, 1, 'Action Movie 95', 'Description of Action Movie 95', 95, NOW(), NOW()),
(1, 1, 'Action Movie 96', 'Description of Action Movie 96', 96, NOW(), NOW()),
(1, 1, 'Action Movie 97', 'Description of Action Movie 97', 97, NOW(), NOW()),
(1, 1, 'Action Movie 98', 'Description of Action Movie 98', 98, NOW(), NOW()),
(1, 1, 'Action Movie 99', 'Description of Action Movie 99', 99, NOW(), NOW()),
(1, 1, 'Action Movie 100', 'Description of Action Movie 100', 100, NOW(), NOW()),
(1, 1, 'Action Movie 101', 'Description of Action Movie 101', 101, NOW(), NOW());


-- Chèn dữ liệu cho bảng User_playlist
INSERT INTO User_playlist (user_id, playlist_detail_id, created_at, updated_at)
VALUES (1, 1, NOW(), NOW()),
       (2, 2, NOW(), NOW());

-- Chèn dữ liệu cho bảng Playlist_detail
INSERT INTO Playlist_detail (user_playlist_id, movie_id, status, currentime, currentepisode, created_at, updated_at)
VALUES (1, 1, 'Watching', 120, 3, NOW(), NOW()),
       (2, 2, 'Paused', 90, 2, NOW(), NOW());

