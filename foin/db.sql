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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `farms` */

insert  into `farms`(`id`,`users_id`,`AdminName`,`Name`,`Location`,`Phone`,`created_at`,`updated_at`,`state`) values 
(1,2,'N/A','Finca El Diamante','Ibagué','12312313',NULL,'2021-04-30 16:49:45','1'),
(4,2,'N/A','Finca Santa Marta','Ibague','12312313',NULL,'2021-04-30 16:50:08','1'),
(5,4,'David','Francia','Convenio',NULL,'2021-04-28 22:26:44','2021-04-28 23:56:08','1'),
(6,4,'231','123','123','000','2021-04-28 22:27:29','2021-05-04 02:22:35','1'),
(7,2,'Juan Carlos Rodríguez','Finca Casa Loma','Ibagué','1234','2021-04-30 16:54:03','2021-04-30 16:54:03','1'),
(8,6,'Abraham Hernández','Palo quemado','Municipio Caparrapí','123456','2021-05-06 09:50:15','2021-05-06 09:50:15','1');

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
  `state` char(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `inventories_farms_id_foreign` (`farms_id`),
  KEY `inventories_users_id_foreign` (`users_id`),
  CONSTRAINT `inventories_farms_id_foreign` FOREIGN KEY (`farms_id`) REFERENCES `farms` (`id`),
  CONSTRAINT `inventories_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `inventories` */

insert  into `inventories`(`id`,`farms_id`,`users_id`,`InternalCode`,`Category`,`Sex`,`Third`,`ThirdName`,`Peso`,`valor`,`created_at`,`updated_at`,`state`) values 
(1,1,2,'FNA1','Vacunos','M','0','N/A','0','0',NULL,NULL,'1'),
(2,1,2,'FNA2','Caprino','F','0','N/A','0','0',NULL,NULL,'1'),
(3,4,2,'FNA3','Vacuno','F','1','David Ortega','0','0',NULL,NULL,'1'),
(4,4,2,'FNA4','Caprino','M','1','David Ortega','0','0',NULL,NULL,'1'),
(5,6,4,'1231fsd','vaca','M','0',NULL,'0','0','2021-04-30 17:29:45','2021-05-04 03:31:54','3'),
(6,5,4,'321','asdf','M','0',NULL,'0','0','2021-04-30 17:30:15','2021-05-04 03:13:13','0'),
(7,4,2,'20211','Vacuno','M','0',NULL,'0','0','2021-05-04 09:05:49','2021-05-04 09:05:49','1'),
(8,8,6,'20211','Vacuno','F','0',NULL,'0','0','2021-05-06 09:54:17','2021-05-06 09:54:17','1');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`person_types_id`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`estado`) values 
(2,'Nelly Clavijo Bustos','nelly.clavijo@ucc.edu.co',3,NULL,'$2y$10$ggLEVDpYygUFauugJHXfmOaaQpZ1fBxOvcdkL783FOZLWPC2E8mfe','D3HqBgCEzMi90ZT2Q7o4RK4Fshr5EIJ3mobGwjUB6FMrF12P04XNihyOK0cm','2021-04-20 15:02:48','2021-04-28 23:57:24','1'),
(3,'ingclavijo@hotmail.com','ingclavijo@hotmail.es',3,NULL,'$2y$10$Sb.pFAVf8m1qqGcCLBVRV.pjJo1lbdWPEiGTmCtzW8TcRhhk31DfC',NULL,'2021-04-20 21:37:19','2021-04-28 10:23:57','0'),
(4,'David Alberto Ortega Cadena','davidortegacadena@gmail.com',3,NULL,'$2y$10$dqNTYbZXlxuLW1TP35ngXOCpLCD1QKaDY2e/nkLb4zvO28mdztxNy',NULL,'2021-04-27 09:59:32','2021-04-28 10:30:40','1'),
(5,'prueba','prueba@prueba.com',1,NULL,'$2y$10$ggLEVDpYygUFauugJHXfmOaaQpZ1fBxOvcdkL783FOZLWPC2E8mfe',NULL,'2021-04-27 14:20:57','2021-04-27 15:07:37','0'),
(6,'NELLY','nelly.clavijo@campusucc.edu.co',3,NULL,'$2y$10$4VLBJ6/3yTZDcmKC0FPMiecqv1zJe1tePldH3hLyxSU1JQ0xOn./C',NULL,'2021-05-04 16:05:04','2021-05-04 18:15:37','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
