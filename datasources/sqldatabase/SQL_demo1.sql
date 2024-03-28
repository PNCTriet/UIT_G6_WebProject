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
  `deposit_id` interger,
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
  `user_id` integer,
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
  `productimage` varchar(255),
  `created_at` datetime,
  `updated_at` datetime
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

ALTER TABLE `Playlist_detail` ADD FOREIGN KEY (`user_playlist_id`) REFERENCES `User_playlist` (`playlist_detail_id`);

ALTER TABLE `User_playlist` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `User_deposit` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `User` ADD FOREIGN KEY (`role_id`) REFERENCES `User_role` (`id`);

ALTER TABLE `User_plan` ADD FOREIGN KEY (`id`) REFERENCES `User` (`plan_id`);

ALTER TABLE `Deposit_detail` ADD FOREIGN KEY (`deposit_id`) REFERENCES `User_deposit` (`id`);

ALTER TABLE `User` ADD FOREIGN KEY (`id`) REFERENCES `User_credential` (`id`);

ALTER TABLE `MovieCategory_Movie` ADD FOREIGN KEY (`MovieCategory_id`) REFERENCES `MovieCategory` (`id`);

ALTER TABLE `MovieCategory_Movie` ADD FOREIGN KEY (`Movie_category_id`) REFERENCES `Movie` (`category_id`);

ALTER TABLE `SpecialGroup_Movie` ADD FOREIGN KEY (`SpecialGroup_id`) REFERENCES `SpecialGroup` (`id`);

ALTER TABLE `SpecialGroup_Movie` ADD FOREIGN KEY (`Movie_specialgroup_id`) REFERENCES `Movie` (`specialgroup_id`);


ALTER TABLE `User` ADD FOREIGN KEY (`discount_id`) REFERENCES `Voucher` (`id`);
