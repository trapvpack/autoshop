-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: autoshop
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `carname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES (1,'Kia1'),(2,'Kia2'),(3,'Kia78'),(4,'Kia928'),(5,'Kia556');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deal`
--

DROP TABLE IF EXISTS `deal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `id_car` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_car` (`id_car`),
  CONSTRAINT `id_car` FOREIGN KEY (`id_car`) REFERENCES `car` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deal`
--

LOCK TABLES `deal` WRITE;
/*!40000 ALTER TABLE `deal` DISABLE KEYS */;
INSERT INTO `deal` VALUES (1,'c4ca4238a0b923820dcc509a6f75849b.jpg','Ярослав Шашин','Внешний вид, динамика, цена качество',1000000,1),(2,'2.jpg','Алёна Сибирцева','Комфортный и современный авто\nСкрипучий пластик багажника\nНет',2000000,2),(3,'3.jpg','Вячеслав Кащеев','Самый лучший автомобиль\nГниет vin на раме под задним правым колесом. Заклеивайте.\nНет. ',3000000,3),(4,'4.jpg','Елизавета Забазнова','Хороший автомобиль во всем\nБагажник\nВсе шикарно',4000000,4),(5,'e4da3b7fbbce2345d7772b0674a318d5.jpg','Андрей Краснопрошин',' Но за двигателем нужно внимательно следить и аккуратно эксплуатировать, тогда прослужит очень долго.',5000000,5),(22,NULL,'fsdfsd f','gfdsfgdf',3125346,NULL),(23,NULL,'fsfd fsd f','dafsd',3123124,NULL),(24,NULL,'gfdg ','gdfgdf',1254376,NULL);
/*!40000 ALTER TABLE `deal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `bloodgroup` varchar(255) DEFAULT NULL,
  `resusfactor` varchar(255) DEFAULT NULL,
  `date_of_birthday` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'vitost123@mail.ru','das sdas sda','4','1','2002-12-15','1111'),(2,'vitost66@gmail.com','мяу мяу мяу','45','14','5555-12-15','777'),(3,'sobaka@mail.ru','Ауе басота','312','32','1996-12-15','3333'),(4,'helb@mail.ru','dsa da','231','321','2002-12-15','Ddd321Cmg!!#@'),(8,'velik@mail.ru','sda datr ree','12','32','2002-12-15','SMX!!!34124fsdss'),(9,'asdas@mail.ru','das dsad saedas','31','321','2001-12-15','Dfds##$%@dasd12'),(10,'dasdas@mail.ru','das asd asa','12','123','2002-12-15','FDASX1232141!@!#@!AAa');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-29 15:12:29
