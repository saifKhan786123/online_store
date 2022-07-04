-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: online_store
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `status` int NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (31,1,'Mr. Schuyler Kling IV','Dignissimos labore blanditiis a quis quia nemo aperiam et. Dolores at reiciendis at eum debitis facilis. Et consectetur voluptatem nihil. Asperiores possimus expedita numquam.',NULL,0,408,42,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(32,2,'Heather Haley','Aut laudantium sunt officia. Dolorum nulla quia et vel odit. Est ex praesentium ipsa corrupti. Velit et exercitationem itaque.',NULL,1,117,60,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(33,NULL,'Mrs. Izabella Jacobs I','Atque minima rerum earum molestias maiores. Fugit quia non voluptatibus aut qui. Nesciunt molestiae sunt illum quo itaque.',NULL,1,20,97,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(34,1,'Kari Walter IV','Eum debitis eius suscipit. Dolorem non et deleniti nihil commodi ullam. Nihil dolores quisquam odit doloremque voluptas.',NULL,1,882,37,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(35,1,'Joanny Koelpin','Doloribus omnis labore consequatur impedit. Occaecati nobis libero molestiae aut corporis et. Dolore suscipit eius voluptatibus quo et est. Quos modi error possimus earum et voluptatem.',NULL,1,102,68,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(36,1,'Andreane Robel','Sed sed maiores eum quis minima qui repellendus. Ea inventore autem et vero eum.',NULL,1,179,46,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(37,1,'Dr. Rudolph Ankunding','Sed rerum rerum atque cumque magni aliquam sit. Quo omnis dolores harum consequatur sit eos.',NULL,1,908,26,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(38,2,'Ramon Kris','Itaque repellat ad aliquid fugit reiciendis. Error exercitationem numquam accusantium repellat sunt similique impedit. Ea quia corrupti qui quidem nihil et.',NULL,1,553,34,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(39,1,'Lydia Cummerata','Est veritatis tempore laboriosam unde voluptate pariatur. Sed corrupti quasi praesentium maxime eum cum. Voluptatem ab voluptates consequatur voluptate est. Quo est qui iure laborum voluptatem placeat.',NULL,1,875,55,'2022-07-01 07:16:48','2022-07-01 07:16:48'),(40,2,'Prof. Toy Kozey DVM','Vero vel non non dolor laboriosam expedita commodi. Autem eos eligendi dolor incidunt quo illo. Commodi consequatur rerum qui consequatur accusantium. Aut qui eveniet doloremque ratione modi voluptatum.',NULL,1,759,65,'2022-07-01 07:16:48','2022-07-01 07:16:48');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` int NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'saif','khan',NULL,'saifvizzweb@gmail.com','8a0c01de4d539a471669d5c2e58f0014',1,'1','2022-07-01 00:00:00',NULL),(2,'zeehan','khan',NULL,'zeeshan@gmail.com','8a0c01de4d539a471669d5c2e58f0014',2,'1','2022-07-01 00:00:00',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-04 20:08:28
