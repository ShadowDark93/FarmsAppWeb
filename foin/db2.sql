/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.33-cll-lve : Database - sintrau1_farmsappweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sintrau1_farmsappweb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sintrau1_farmsappweb`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `farms` */

DROP TABLE IF EXISTS `farms`;

CREATE TABLE `farms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) unsigned NOT NULL,
  `AdminName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `farms_users_id_foreign` (`users_id`),
  CONSTRAINT `farms_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `farms` */

/*Table structure for table `inventories` */

DROP TABLE IF EXISTS `inventories`;

CREATE TABLE `inventories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `farms_id` bigint(20) unsigned NOT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  `InternalCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sex` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Third` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ThirdName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Peso` double NOT NULL,
  `valor` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `inventories_farms_id_foreign` (`farms_id`),
  KEY `inventories_users_id_foreign` (`users_id`),
  CONSTRAINT `inventories_farms_id_foreign` FOREIGN KEY (`farms_id`) REFERENCES `farms` (`id`),
  CONSTRAINT `inventories_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `inventories` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2001_04_13_040528_create_person_types_table',1),
(2,'2014_10_12_000000_create_users_table',1),
(3,'2014_10_12_100000_create_password_resets_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2021_04_13_042156_create_farms_table',1),
(6,'2021_04_13_043927_create_inventories_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `person_types` */

DROP TABLE IF EXISTS `person_types`;

CREATE TABLE `person_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `person_types` */

insert  into `person_types`(`id`,`Description`,`created_at`,`updated_at`) values 
(1,'SUPERADMIN',NULL,NULL),
(2,'ADMIN',NULL,NULL),
(3,'USER',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_types_id` bigint(20) unsigned NOT NULL DEFAULT '3',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_person_types_id_foreign` (`person_types_id`),
  CONSTRAINT `users_person_types_id_foreign` FOREIGN KEY (`person_types_id`) REFERENCES `person_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
