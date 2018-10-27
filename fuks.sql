/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.35-MariaDB : Database - eafuksbase
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eafuksbase` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `eafuksbase`;

/*Table structure for table `_maquinaria` */

DROP TABLE IF EXISTS `_maquinaria`;

CREATE TABLE `_maquinaria` (
  `id_ma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_ma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Unidades` int(11) NOT NULL,
  `Descripción` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alerta` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ma`),
  KEY `_maquinaria_id_alerta_foreign` (`id_alerta`),
  CONSTRAINT `_maquinaria_id_alerta_foreign` FOREIGN KEY (`id_alerta`) REFERENCES `alertas` (`id_alerta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `_maquinaria` */

/*Table structure for table `alertas` */

DROP TABLE IF EXISTS `alertas`;

CREATE TABLE `alertas` (
  `id_alerta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alerta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `alertas` */

/*Table structure for table `almacen` */

DROP TABLE IF EXISTS `almacen`;

CREATE TABLE `almacen` (
  `id_almacen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_almacen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_prod` int(10) unsigned NOT NULL,
  `id_area` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_almacen`),
  KEY `almacen_id_prod_foreign` (`id_prod`),
  KEY `almacen_id_area_foreign` (`id_area`),
  CONSTRAINT `almacen_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  CONSTRAINT `almacen_id_prod_foreign` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `almacen` */

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id_area` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_ma` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_area`),
  KEY `area_id_ma_foreign` (`id_ma`),
  CONSTRAINT `area_id_ma_foreign` FOREIGN KEY (`id_ma`) REFERENCES `_maquinaria` (`id_ma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `area` */

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_prod` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `categorias_id_prod_foreign` (`id_prod`),
  CONSTRAINT `categorias_id_prod_foreign` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `categorias` */

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_ext` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_est` int(10) unsigned NOT NULL,
  `id_municipio` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `clientes_id_est_foreign` (`id_est`),
  KEY `clientes_id_municipio_foreign` (`id_municipio`),
  CONSTRAINT `clientes_id_est_foreign` FOREIGN KEY (`id_est`) REFERENCES `estados` (`id_est`),
  CONSTRAINT `clientes_id_municipio_foreign` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `clientes` */

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id_emp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_emp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ape_paterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ape_materno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_ext` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puesto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_est` int(10) unsigned NOT NULL,
  `id_municipio` int(10) unsigned NOT NULL,
  `id_area` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_emp`),
  KEY `empleados_id_est_foreign` (`id_est`),
  KEY `empleados_id_municipio_foreign` (`id_municipio`),
  KEY `empleados_id_area_foreign` (`id_area`),
  CONSTRAINT `empleados_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  CONSTRAINT `empleados_id_est_foreign` FOREIGN KEY (`id_est`) REFERENCES `estados` (`id_est`),
  CONSTRAINT `empleados_id_municipio_foreign` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `empleados` */

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `id_est` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_est` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_est`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `estados` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2018_10_15_172457_producto',1),(4,'2018_10_15_175244_create_categories_table',1),(5,'2018_10_15_182209_create__maquinaria_table',2),(42,'2018_10_15_191848_create_almacen_table',3),(152,'2014_10_12_000000_create_users_table',4),(153,'2014_10_12_100000_create_password_resets_table',4),(154,'2018_10_15_184529_create__alertas_table',4),(155,'2018_10_15_190223_create__maquinaria_table',4),(156,'2018_10_15_193052_create_estados_table',4),(157,'2018_10_15_193352_create_municipios_table',4),(158,'2018_10_15_194021_create_area_table',4),(159,'2018_10_15_194508_create_clientes_table',4),(160,'2018_10_15_195359_create_proveedores_table',4),(161,'2018_10_15_195925_create_productos_table',4),(162,'2018_10_15_200432_create_categorias_table',4),(163,'2018_10_15_200759_create_empleados_table',4),(164,'2018_10_15_202111_create_almacen_table',4);

/*Table structure for table `municipios` */

DROP TABLE IF EXISTS `municipios`;

CREATE TABLE `municipios` (
  `id_municipio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_est` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `municipios_id_est_foreign` (`id_est`),
  CONSTRAINT `municipios_id_est_foreign` FOREIGN KEY (`id_est`) REFERENCES `estados` (`id_est`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `municipios` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_prod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_prod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `existencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_prov` int(10) unsigned NOT NULL,
  `id_cliente` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_prod`),
  KEY `productos_id_prov_foreign` (`id_prov`),
  KEY `productos_id_cliente_foreign` (`id_cliente`),
  CONSTRAINT `productos_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  CONSTRAINT `productos_id_prov_foreign` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `productos` */

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id_prov` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomb_prov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sector_comercial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_ext` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_est` int(10) unsigned NOT NULL,
  `id_municipio` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_prov`),
  KEY `proveedores_id_est_foreign` (`id_est`),
  KEY `proveedores_id_municipio_foreign` (`id_municipio`),
  CONSTRAINT `proveedores_id_est_foreign` FOREIGN KEY (`id_est`) REFERENCES `estados` (`id_est`),
  CONSTRAINT `proveedores_id_municipio_foreign` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proveedores` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
