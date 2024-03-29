/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.11-MariaDB : Database - buyma
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`buyma` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `buyma`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */
DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_url` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_img` text DEFAULT NULL,
  `product_local_img` text DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_comment` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand` bigint(20) unsigned NOT NULL,
  `season_` varchar(255) DEFAULT NULL,
  `theme_` varchar(255) DEFAULT NULL,
  `size_color` varchar(100) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `shop_name_` varchar(255) DEFAULT NULL,
  `shipping_place` varchar(255) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `normal_pirce_` float DEFAULT NULL,
  `price_type` varchar(10) DEFAULT NULL,
  `tariff_` varchar(255) DEFAULT NULL,
  `exhibition_memo_` text DEFAULT NULL,
  `purchase_memo_` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`brand`) REFERENCES `brands`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29091 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('wAiVb6dqPlM6YbPlMpMfPWHVRHVc2iPfpqtLUlKa',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoicFJqWXRVUDI2dGpZeWZKVlZ5Um9jS2tVcGtqU3RpcnlpQTg2QzlObiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2xvdWlwYWdlIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9teXBhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTFVLTjlMb3k0dG9hVWcvSkk0aS9mdVd4Lm12SnhzbE5PVzB1UXhUTm11bW55UXIucFFQQnEiO30=',1662300483),
('ZViHqg1cdBRQQlaOjqNaTwE8T9oaTyNT7BaDPKYJ',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYjZ2WEFzWDVpNkoxeklFTnBLZElITWpYbTRpZDhnRG41VFJwQXBSdSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL215cGFnZSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG91aXBhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTFVLTjlMb3k0dG9hVWcvSkk0aS9mdVd4Lm12SnhzbE5PVzB1UXhUTm11bW55UXIucFFQQnEiO30=',1662284726);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('producer','worker') COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'init',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`_token`,`email`,`email_verified_at`,`password`,`role`,`family_name`,`cell_phone`,`created_at`,`updated_at`) values 
(1,'123AYwZvmLlVVQi5d2Lmmpot9TbM9APoWKoQZW2E','nonaka@gmail.com',NULL,'$2y$10$LUKN9Loy4toaUg/JI4i/fuWx.mvJxslNOW0uQxTNmumnyQr.pQPBq','producer','Nonaka',NULL,'2022-07-30 10:38:49','2022-07-30 10:38:49'),
(10,'nAbAYwZvmLlVVQi5d2Lmmpot9TbM9APoWKoQZW2E','moon.rider.dev@gmail.com',NULL,'$2y$10$iSsEh6QIz9W3ceiYGj0VKec9nYVdbs3i7AdsssVa4LG0KJIrBpbuG','producer','Moon',NULL,'2022-09-04 15:14:18','2022-09-04 15:19:57');

DROP TABLE IF EXISTS `exhibitsettings`;

CREATE TABLE `exhibitsettings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `commission` int unsigned NOT NULL DEFAULT 7,
  `comment` text NULL, 
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TRIGGER new_insert
BEFORE INSERT ON `exhibitsettings`
FOR EACH ROW 
SET NEW.`comment` = CASE WHEN NEW.comment IS NULL THEN '【商品説明】
〇人気ブランドの在庫は変動が激しいため、ご購入前にお問い合わせより在庫の確認をお願い致します。
〇商品は送料込みです。
〇ご購入手続き後のキャンセル・返品・交換は原則として対応いたしかねます。

【発送ついてのお知らせ】
〇購入手続き完了後１０〜１８日で前後で発送。
 (商品状態により希に発送が遅れることがありますが、その際はご連絡いたしますので予めご了承お願いします。)


【出品者コメント】
〇人気ブランドのため、ご購入前にお問い合わせより在庫の確認をお願い致します。
〇正規品及び本物鑑定済みのショップでのみ商品を買い付けしております。
〇新品・未使用のみ販売致しております。
〇こちらの商品は買付先にて新品保証、鑑定済みです。ただし、買付先の規定でもともと商品に付属しているブランドタグや説明書などの付属品が同梱されない場合があることを事前にご了承ください。


【ショップからのお願い】
〇人気ブランドの在庫は変動が激しいため、ご購入前にお問い合わせより在庫の確認をお願い致します。
 在庫確認せずにご購入され在庫切れの際は「お客様都合」でのキャンセルとさせて頂きますことを
 予めご了承お願いします。
〇在庫のご用意はありますが、完売の場合やむをえずご注文をキャンセルさせて頂くことがありますのでご了承お願いします。
〇丁寧に検品・梱包いたしますが、輸送中に箱に多少の汚れが残る場合がございますので、BUYMA補償制度あんしんプラスへのお申し込みもご検討ください。' ELSE NEW.comment END;

DROP TABLE IF EXISTS `temps`;

CREATE TABLE `temps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

insert into `exhibitsettings`(`id`, `user_id`) values
(1, 1),
(2, 10);
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
