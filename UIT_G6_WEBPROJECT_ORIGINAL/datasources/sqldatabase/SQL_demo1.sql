CREATE TABLE `User` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50),
  `birthday` date,
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

ALTER TABLE User
ALTER COLUMN role_id SET DEFAULT 2;


CREATE TABLE `User_role` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `role_type` varchar(255),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `User_credential` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id`integer,
  `email` varchar(50),
  `password` varchar(250),
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
  `updated_at` datetime,
  --
  `rank` integer NOT NULL DEFAULT 0,
  `point` integer NOT NULL DEFAULT 0
);


CREATE TABLE `Movie_link` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `poster_link` varchar(255),
  `trailer_link` varchar(255),
  `movie_link` varchar(255),
  --
  `rank_link` varchar(255) NULL
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

ALTER TABLE `User_credential` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

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
INSERT INTO User (name, birthday, email, phoneNumber, address, avartar, role_id, plan_id, deposit_id, discount_id, created_at, updated_at)
VALUES ('John Doe', '1990-05-15', 'john.doe@example.com', '1234567890', '123 Main St, City, Country', 'avatar1.jpg', 1, 1, 1, NULL, NOW(), NOW()),
       ('Jane Smith', '1985-08-25', 'jane.smith@example.com', '9876543210', '456 Elm St, Town, Country', 'avatar2.jpg', 2, 2, 2, NULL, NOW(), NOW());

-- Chèn dữ liệu cho bảng User_credential
INSERT INTO User_credential (user_id,email, password, created_at, updated_at)
VALUES (1,'john.doe@example.com', 'password123', NOW(), NOW()),
       (2,'jane.smith@example.com', 'letmein', NOW(), NOW());

-- Chèn dữ liệu cho bảng User_deposit
INSERT INTO User_deposit (user_id, total_money, deposit_detail_id, created_at, updated_at)
VALUES (1, 100, 1, NOW(), NOW()),
       (2, 200, 2, NOW(), NOW());

-- Chèn dữ liệu cho bảng Deposit_detail
INSERT INTO Deposit_detail (deposit_id, total_money, method, status, created_at, updated_at)
VALUES (1, 100, 'Credit Card', 'Success', NOW(), NOW()),
       (2, 200, 'PayPal', 'Success', NOW(), NOW());

-- Chèn dữ liệu cho bảng Movie_link
INSERT INTO Movie_link (poster_link, trailer_link, movie_link, rank_link)
VALUES 
('datasources/filmphoto_[body]/filmphoto_[body]_1.png', 'https://www.youtube.com/watch?v=nvdSbuizTUA&pp=ygUgZ2nhu69hIGPGoW4gYsOjbyB0dXnhur90IHRyYWlsZXI%3D', 'https://www.youtube.com/watch?v=nvdSbuizTUA&pp=ygUgZ2nhu69hIGPGoW4gYsOjbyB0dXnhur90IHRyYWlsZXI%3D', 'datasources/imageranking/img1.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_2.png', 'https://www.youtube.com/watch?v=9SdYFYflVbw&pp=ygUlbuG7ryBsdeG6rXQgc8awIHdvbyB5b3VuZyB3b28gdHJhaWxlcg%3D%3D', 'https://www.youtube.com/watch?v=9SdYFYflVbw&pp=ygUlbuG7ryBsdeG6rXQgc8awIHdvbyB5b3VuZyB3b28gdHJhaWxlcg%3D%3D', 'datasources/imageranking/img2.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_3.png', 'trailer_link_3', 'movie_link_3', 'datasources/imageranking/img3.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_4.png', 'trailer_link_4', 'movie_link_4', 'datasources/imageranking/img4.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_5.png', 'trailer_link_5', 'movie_link_5', 'datasources/imageranking/img5.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_6.png', 'trailer_link_6', 'movie_link_6', 'datasources/imageranking/img6.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_7.png', 'trailer_link_7', 'movie_link_7', 'datasources/imageranking/img7.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_8.png', 'trailer_link_8', 'movie_link_8', 'datasources/imageranking/img8.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_9.png', 'trailer_link_9', 'movie_link_9', 'datasources/imageranking/img9.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_10.png', 'trailer_link_10', 'movie_link_10','datasources/imageranking/img10.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_11.png', 'trailer_link_11', 'movie_link_11','datasources/imageranking/img11.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_12.png', 'trailer_link_12', 'movie_link_12','datasources/imageranking/img12.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_13.png', 'trailer_link_13', 'movie_link_13','datasources/imageranking/img13.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_14.png', 'trailer_link_14', 'movie_link_14','datasources/imageranking/img14.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_15.png', 'trailer_link_15', 'movie_link_15','datasources/imageranking/img15.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_16.png', 'trailer_link_16', 'movie_link_16','datasources/imageranking/img16.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_17.png', 'trailer_link_17', 'movie_link_17','datasources/imageranking/img17.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_18.png', 'trailer_link_18', 'movie_link_18','datasources/imageranking/img18.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_19.png', 'trailer_link_19', 'movie_link_19','datasources/imageranking/img19.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_20.png', 'trailer_link_20', 'movie_link_20','datasources/imageranking/img20.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_21.png', 'trailer_link_21', 'movie_link_21','datasources/imageranking/img21.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_22.png', 'trailer_link_22', 'movie_link_22','datasources/imageranking/img22.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_23.png', 'trailer_link_23', 'movie_link_23','datasources/imageranking/img23.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_24.png', 'trailer_link_24', 'movie_link_24','datasources/imageranking/img24.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_25.png', 'trailer_link_25', 'movie_link_25','datasources/imageranking/img25.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_26.png', 'trailer_link_26', 'movie_link_26','datasources/imageranking/img26.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_27.png', 'trailer_link_27', 'movie_link_27','datasources/imageranking/img27.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_28.png', 'trailer_link_28', 'movie_link_28','datasources/imageranking/img28.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_29.png', 'trailer_link_29', 'movie_link_29','datasources/imageranking/img29.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_30.png', 'trailer_link_30', 'movie_link_30','datasources/imageranking/img30.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_31.png', 'trailer_link_31', 'movie_link_31','datasources/imageranking/img31.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_32.png', 'trailer_link_32', 'movie_link_32','datasources/imageranking/img32.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_33.png', 'trailer_link_33', 'movie_link_33','datasources/imageranking/img33.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_34.png', 'trailer_link_34', 'movie_link_34','datasources/imageranking/img34.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_35.png', 'trailer_link_35', 'movie_link_35','datasources/imageranking/img35.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_36.png', 'trailer_link_36', 'movie_link_36','datasources/imageranking/img36.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_37.png', 'trailer_link_37', 'movie_link_37','datasources/imageranking/img37.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_38.png', 'trailer_link_38', 'movie_link_38','datasources/imageranking/img38.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_39.png', 'trailer_link_39', 'movie_link_39','datasources/imageranking/img39.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_40.png', 'trailer_link_40', 'movie_link_40','datasources/imageranking/img40.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_41.png', 'trailer_link_41', 'movie_link_41','datasources/imageranking/img41.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_42.png', 'trailer_link_42', 'movie_link_42','datasources/imageranking/img42.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_43.png', 'trailer_link_43', 'movie_link_43','datasources/imageranking/img43.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_44.png', 'trailer_link_44', 'movie_link_44','datasources/imageranking/img44.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_45.png', 'trailer_link_45', 'movie_link_45','datasources/imageranking/img45.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_46.png', 'trailer_link_46', 'movie_link_46','datasources/imageranking/img46.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_47.png', 'trailer_link_47', 'movie_link_47','datasources/imageranking/img47.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_48.png', 'trailer_link_48', 'movie_link_48','datasources/imageranking/img48.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_49.png', 'trailer_link_49', 'movie_link_49','datasources/imageranking/img49.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_50.png', 'trailer_link_50', 'movie_link_50','datasources/imageranking/img50.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_51.png', 'trailer_link_51', 'movie_link_51','datasources/imageranking/img51.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_52.png', 'trailer_link_52', 'movie_link_52','datasources/imageranking/img52.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_53.png', 'trailer_link_53', 'movie_link_53','datasources/imageranking/img53.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_54.png', 'trailer_link_54', 'movie_link_54','datasources/imageranking/img54.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_55.png', 'trailer_link_55', 'movie_link_55','datasources/imageranking/img55.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_56.png', 'trailer_link_56', 'movie_link_56','datasources/imageranking/img56.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_57.png', 'trailer_link_57', 'movie_link_57','datasources/imageranking/img57.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_58.png', 'trailer_link_58', 'movie_link_58','datasources/imageranking/img58.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_59.png', 'trailer_link_59', 'movie_link_59','datasources/imageranking/img59.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_60.png', 'trailer_link_60', 'movie_link_60','datasources/imageranking/img60.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_61.png', 'trailer_link_61', 'movie_link_61','datasources/imageranking/img61.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_62.png', 'trailer_link_62', 'movie_link_62','datasources/imageranking/img62.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_63.png', 'trailer_link_63', 'movie_link_63','datasources/imageranking/img63.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_64.png', 'trailer_link_64', 'movie_link_64','datasources/imageranking/img64.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_65.png', 'trailer_link_65', 'movie_link_65','datasources/imageranking/img65.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_66.png', 'trailer_link_66', 'movie_link_66','datasources/imageranking/img66.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_67.png', 'trailer_link_67', 'movie_link_67','datasources/imageranking/img67.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_68.png', 'trailer_link_68', 'movie_link_68','datasources/imageranking/img68.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_69.png', 'trailer_link_69', 'movie_link_69','datasources/imageranking/img69.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_70.png', 'trailer_link_70', 'movie_link_70','datasources/imageranking/img70.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_71.png', 'trailer_link_71', 'movie_link_71','datasources/imageranking/img71.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_72.png', 'trailer_link_72', 'movie_link_72','datasources/imageranking/img72.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_73.png', 'trailer_link_73', 'movie_link_73','datasources/imageranking/img73.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_74.png', 'trailer_link_74', 'movie_link_74','datasources/imageranking/img74.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_75.png', 'trailer_link_75', 'movie_link_75','datasources/imageranking/img75.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_76.png', 'trailer_link_76', 'movie_link_76','datasources/imageranking/img76.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_77.png', 'trailer_link_77', 'movie_link_77','datasources/imageranking/img77.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_78.png', 'trailer_link_78', 'movie_link_78','datasources/imageranking/img78.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_79.png', 'trailer_link_79', 'movie_link_79','datasources/imageranking/img79.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_80.png', 'trailer_link_80', 'movie_link_80','datasources/imageranking/img80.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_81.png', 'trailer_link_81', 'movie_link_81','datasources/imageranking/img81.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_82.png', 'trailer_link_82', 'movie_link_82','datasources/imageranking/img82.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_83.png', 'trailer_link_83', 'movie_link_83','datasources/imageranking/img83.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_84.png', 'trailer_link_84', 'movie_link_84','datasources/imageranking/img84.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_85.png', 'trailer_link_85', 'movie_link_85','datasources/imageranking/img85.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_86.png', 'trailer_link_86', 'movie_link_86','datasources/imageranking/img86.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_87.png', 'trailer_link_87', 'movie_link_87','datasources/imageranking/img87.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_88.png', 'trailer_link_88', 'movie_link_88','datasources/imageranking/img88.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_89.png', 'trailer_link_89', 'movie_link_89','datasources/imageranking/img89.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_90.png', 'trailer_link_90', 'movie_link_90','datasources/imageranking/img90.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_91.png', 'trailer_link_91', 'movie_link_91','datasources/imageranking/img91.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_92.png', 'trailer_link_92', 'movie_link_92','datasources/imageranking/img92.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_93.png', 'trailer_link_93', 'movie_link_93','datasources/imageranking/img93.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_94.png', 'trailer_link_94', 'movie_link_94','datasources/imageranking/img94.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_95.png', 'trailer_link_95', 'movie_link_95','datasources/imageranking/img95.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_96.png', 'trailer_link_96', 'movie_link_96','datasources/imageranking/img96.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_97.png', 'trailer_link_97', 'movie_link_97','datasources/imageranking/img97.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_98.png', 'trailer_link_98', 'movie_link_98','datasources/imageranking/img98.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_99.png', 'trailer_link_99', 'movie_link_99','datasources/imageranking/img99.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_100.png', 'trailer_link_100', 'movie_link_100','datasources/imageranking/img100.jpg'),
('datasources/filmphoto_[body]/filmphoto_[body]_101.png', 'trailer_link_101', 'movie_link_101','datasources/imageranking/img100.jpg');

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
INSERT INTO Movie (category_id, specialgroup_id, title, description, link_id, created_at, updated_at, point)
VALUES (1, 1, 'Giữa cơn bão tuyết', '221112', 1, NOW(), NOW(),807),
(1, 1, 'Nữ luật sư kỳ lạ', '197067', 2, NOW(), NOW(),182),
(1, 1, 'Lấy danh nghĩa người nhà', '107329', 3, NOW(), NOW(),822),
(1, 1, 'Hoàn hồn ALCHEMY OF SOULS', '135157', 4, NOW(), NOW(),644),
(1, 1, 'Đời sống ngục tù', '74821', 5, NOW(), NOW(),584),
(1, 1, 'Mùa hè yêu dấu của chúng ta', '135897', 6, NOW(), NOW(),585),
(1, 1, 'Yêu tinh', '67915', 7, NOW(), NOW(),765),
(1, 1, 'Vinh quang trong thù hận', '136283', 8, NOW(), NOW(),292),
(1, 1, 'Khi anh chạy về phía em', '228547', 9, NOW(), NOW(),435),
(1, 1, 'Trường tương tư', '210524', 10, NOW(), NOW(),801),
(1, 1, 'Trường tương tư', '210524', 11, NOW(), NOW(),100),
(1, 1, 'Đi đến nơi có gió', '216424', 12, NOW(), NOW(),100),
(1, 1, 'Chiếc bật lửa và váy công chúa', '134331', 13, NOW(), NOW(),100),
(1, 1, 'Minh lan truyện', '81502', 14, NOW(), NOW(),100),
(1, 1, 'Chệch quỹ đạo', '237918', 15, NOW(), NOW(),100),
(1, 1, 'Trường nguyệt tẫn minh', '137206', 16, NOW(), NOW(),100),
(1, 1, 'Em đẹp nhất là khi mỉm cười', '95486', 17, NOW(), NOW(),100),
(1, 1, 'Yêu em từ cái nhìn đầu tiên', '66776', 18, NOW(), NOW(),100),
(1, 1, 'An lạc truyện', '134679', 19, NOW(), NOW(),100),
(1, 1, 'Thương lan quyết', '130368', 20, NOW(), NOW(),100),
(1, 1, 'Trường ca hành', '122182', 21, NOW(), NOW(),100),
(1, 1, 'Go go squid', '82817', 22, NOW(), NOW(),100),
(1, 1, 'Manh thê thực thần', '79574', 23, NOW(), NOW(),100),
(1, 1, 'Put your head on my shoulder', '88548', 24, NOW(), NOW(),100),
(1, 1, 'Tôi đã gặp được vị cứu tinh', '216405', 25, NOW(), NOW(),100),
(1, 1, 'Tình đầu ngây ngô', '95100', 26, NOW(), NOW(),100),
(1, 1, 'Thả thí thiên hạ', '127323', 27, NOW(), NOW(),100),
(1, 1, 'Cuộc sống lý trí', '122206', 28, NOW(), NOW(),100),
(1, 1, 'Lưỡng bất nghi', '121870', 29, NOW(), NOW(),100),
(1, 1, 'Tại sao boss muốn cưới tôi?', '86605', 30, NOW(), NOW(),100),
(1, 1, 'Trạm kế tiêp là hạnh phúc', '98830', 31, NOW(), NOW(),100),
(1, 1, 'Tam sinh tam thế thập lý đào hoa', '69316', 32, NOW(), NOW(),100),
(1, 1, 'Ngự giao ký', '136973', 33, NOW(), NOW(),100),
(1, 1, 'Vường sao băng', '16420', 34, NOW(), NOW(),100),
(1, 1, 'Gửi thời thanh xuân ngây thơ tươi đẹp', '75387', 35, NOW(), NOW(),100),
(1, 1, 'Ngọc cốt dao', '130270', 36, NOW(), NOW(),100),
(1, 1, 'Câu chuyện cảm động nhất', '87299', 37, NOW(), NOW(),100),
(1, 1, 'Cẩm tú vị ương', '68358', 38, NOW(), NOW(),100),
(1, 1, 'Thiên quan tứ phúc', '112398', 39, NOW(), NOW(),100),
(1, 1, 'Vào giờ phút này', '218177', 40, NOW(), NOW(),100),
(1, 1, 'Công chúa hội tam hoàng', '96049', 41, NOW(), NOW(),100),
(1, 1, 'Thầm yêu quất sinh hoài nam', '104982', 42, NOW(), NOW(),100),
(1, 1, 'Sexy central', '91491', 43, NOW(), NOW(),100),
(1, 1, 'Mẹ đừng làm vậy', '135726', 44, NOW(), NOW(),100),
(1, 1, 'Cực phẩm xứng đôi', '70580', 45, NOW(), NOW(),100),
(1, 1, 'Chỉ cần em hạnh phúc', '124578', 46, NOW(), NOW(),100),
(1, 1, 'Tình yêu đến sau ba ngày', '130839', 47, NOW(), NOW(),100),
(1, 1, 'Ông chú của tôi', '76662', 48, NOW(), NOW(),100),
(1, 1, 'Cuộc chiến thượng lưu', '99489', 49, NOW(), NOW(),100),
(1, 1, 'Sweet home thế giới ma quái', '96648', 50, NOW(), NOW(),100),
(1, 1, 'Yêu tinh', '67915', 51, NOW(), NOW(),100),
(1, 1, 'Lời hồi đáp 1988', '64010', 52, NOW(), NOW(),100),
(1, 1, 'Điên thì có sao', '96462', 53, NOW(), NOW(),100),
(1, 1, 'Nghệ thuật săn quỷ và nấu mì', '113268', 54, NOW(), NOW(),100),
(1, 1, 'Chàng trai cuồng sạch sẽ thân yêu của tôi', '125255', 55, NOW(), NOW(),100),
(1, 1, 'Diên hi công lược', '96997', 56, NOW(), NOW(),100),
(1, 1, 'Truy bắt lính đào ngũ', '110534', 57, NOW(), NOW(),100),
(1, 1, 'Luyến mộ', '129478', 58, NOW(), NOW(),100),
(1, 1, 'Khóa học yêu cấp tốc', '202318', 59, NOW(), NOW(),100),
(1, 1, 'Tuổi hai lăm tuổi hai mốt', '129888', 60, NOW(), NOW(),100),
(1, 1, 'Tầng lớp itaewon', '96162', 61, NOW(), NOW(),100),
(1, 1, 'Trò chơi con mực', '93405', 62, NOW(), NOW(),100),
(1, 1, 'Hậu duệ mặt trời', '82665', 63, NOW(), NOW(),100),
(1, 1, 'Lâu đài tham vọng', '84327', 64, NOW(), NOW(),100),
(1, 1, 'Thế giới hôn nhân', '96164', 65, NOW(), NOW(),100),
(1, 1, 'Dưới bóng trung điện', '156406', 66, NOW(), NOW(),100),
(1, 1, 'Quý ngài ánh dương', '75820', 67, NOW(), NOW(),100),
(1, 1, 'Khu rừng bí mật', '97565', 68, NOW(), NOW(),100),
(1, 1, 'Người thầy y đức', '68398', 69, NOW(), NOW(),100),
(1, 1, 'Vì sao đưa anh tới', '60957', 70, NOW(), NOW(),100),
(1, 1, 'Khi hoa trà nở', '93097', 71, NOW(), NOW(),100),
(1, 1, 'Quý cô ưu tú', '71497', 72, NOW(), NOW(),100),
(1, 1, 'Tòa án vị thành niên', '112833', 73, NOW(), NOW(),100),
(1, 1, 'Con của bạn không phải là con của bạn', '80759', 74, NOW(), NOW(),100),
(1, 1, 'Mơ hồ', '76715', 75, NOW(), NOW(),100),
(1, 1, 'Mặt trăng ôm mặt trời', '45579', 76, NOW(), NOW(),100),
(1, 1, 'Bác sĩ nhân ái', '57647', 77, NOW(), NOW(),100),
(1, 1, 'Thanh tra Koo', '129475', 78, NOW(), NOW(),100),
(1, 1, 'Tội nhân vô định', '94384', 79, NOW(), NOW(),100),
(1, 1, 'Thánh ma túy', '97970', 80, NOW(), NOW(),100),
(1, 1, 'Sát nhân bắt chước', '158876', 81, NOW(), NOW(),100),
(1, 1, 'Hoa của quỷ', '99494', 82, NOW(), NOW(),100),
(1, 1, 'Đội bóng chày Dreams', '95484', 83, NOW(), NOW(),100),
(1, 1, 'Hướng tới thiên đường', '96571', 84, NOW(), NOW(),100),
(1, 1, 'Hoa đăng sơ thượng', '130330', 85, NOW(), NOW(),100),
(1, 1, 'Gió đông năm ấy', '47091', 86, NOW(), NOW(),100),
(1, 1, 'Đôi mắt rực rỡ', '86546', 87, NOW(), NOW(),100),
(1, 1, 'Mashle', '204832', 88, NOW(), NOW(),100),
(1, 1, 'Pháp sư tiễn táng', '209867', 89, NOW(), NOW(),100),
(1, 1, 'Hậu cung chân hoàn chuyện', '50878', 90, NOW(), NOW(),100),
(1, 1, 'Chệch quỹ đạo', '237918', 91, NOW(), NOW(),100),
(1, 1, 'One piece', '111110', 92, NOW(), NOW(),100),
(1, 1, 'The kings avatar', '71194', 93, NOW(), NOW(),100),
(1, 1, 'Sơn hà lệnh', '119362', 94, NOW(), NOW(),100),
(1, 1, 'Tỉnh mộng', '73021', 95, NOW(), NOW(),100),
(1, 1, 'Thơ săn quái vật', '71912', 96, NOW(), NOW(),100),
(1, 1, 'Sweet tooth cậu bé gạc nai', '103768', 97, NOW(), NOW(),100),
(1, 1, 'Arcane', '94605', 98, NOW(), NOW(),100),
(1, 1, 'Huyển thoại vikings: Valhalla', '116135', 99, NOW(), NOW(),100),
(1, 1, 'Shadow and bone', '85720', 100, NOW(), NOW(),100),
(1, 1, 'Biệt đội titans', '75450', 101, NOW(), NOW(),100);



-- Chèn dữ liệu cho bảng User_playlist
INSERT INTO User_playlist (user_id, playlist_detail_id, created_at, updated_at)
VALUES (1, 1, NOW(), NOW()),
       (2, 2, NOW(), NOW());

-- Chèn dữ liệu cho bảng Playlist_detail
INSERT INTO Playlist_detail (user_playlist_id, movie_id, status, currentime, currentepisode, created_at, updated_at)
VALUES (1, 1, 'Watching', 120, 3, NOW(), NOW()),
       (2, 2, 'Paused', 90, 2, NOW(), NOW());

