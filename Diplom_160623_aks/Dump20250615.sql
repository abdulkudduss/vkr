-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table ` экскурсии`
--

DROP TABLE IF EXISTS ` экскурсии`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE ` экскурсии` (
  `id_Экскурсии` int NOT NULL AUTO_INCREMENT,
  `id_Гида` int DEFAULT NULL,
  `Название экскурсии` varchar(100) NOT NULL,
  `Описание_экскурсии` varchar(20000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Регион` varchar(45) NOT NULL,
  `Стоимость` int NOT NULL,
  `Продолжительность` varchar(45) DEFAULT NULL,
  `фото` varchar(90) DEFAULT NULL,
  `тип` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Экскурсии`),
  KEY `idГида_idx` (`id_Гида`),
  CONSTRAINT `idГида1` FOREIGN KEY (`id_Гида`) REFERENCES `гиды` (`idГида`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table ` экскурсии`
--

LOCK TABLES ` экскурсии` WRITE;
/*!40000 ALTER TABLE ` экскурсии` DISABLE KEYS */;
INSERT INTO ` экскурсии` VALUES (10,2,'sawesf','afsg','Талас',100,'10','10012_4.bmp','Пешая'),(11,2,'qWAD','QWADваыврорлроправыфвЫпвр','Талас',100,'2','1012-1.bmp','Пешая'),(12,2,'lskdjsf','ыфвdfsfgddsrsefasefsefsrsrgggggggggggggggggggggg','Талас',500,'1','1146.bmp','Пешая'),(15,2,'awfsdxh','szdxgdchg','Талас',500,'4','263.bmp','Пешая'),(17,3,'Однодневные круглогодичные экскурсии','Однодневные индивидуальные туры из Бишкека.Транспортные услуги гида- водителя.(рус.яз).Экскурсии , тренинг ,комбинированные туры, многодневные туры по Кыргызстану на внедорожнике Nissan X-Trail\r\n\r\n                                                                             ОДНОДНЕВНЫЕ Экскурсии \r\n\r\n\r\n\r\n\r\n1)Ущелье Кегеты. Посещение большого водопада ,прогулка по ущелью. Далее экскурсия в археологический комплекс БУРАНА, посещение ц.о Гавайи (Авто маршрут 220 км , пеший от 1 км) Продолжительность 5-8 ч. Цена транспорта + гид 120$ за машину (до 4х человек) проводиться круглый год.\r\n\r\n\r\n3) увлекательный поход в сухие  каньоны Конорчек (Гранд каньон Кыргызстана). На обратном пути ц.о Гавайи. (Авто маршрут 280 км ,пеший от 8 км трекинга). Продолжительность 8-10 ч . Цена транспорт + гид 130$ за машину (до 4х человек) проводиться круглый год.\r\n\r\n\r\n3) Ущелье Чункурчак, голубиный водопад с переездом в Аламединское ущелье. Экскурсия в Красный каньон.Далее Тёплые ключи , прогулка по ущелью.Можно посетить бассейн с минеральной водой. Авто маршрут 95 км, пеший от 3 км.Продолжительность 4-8 ч. Цена за машину до 4х человек 100$\r\n\r\n\r\n4) Аламединское ущелье.Экскурсия. Переезд в ущелье Ыссык- ата, поход до водопада, купание в горячих минеральных источниках. Далее переезд в ущелье Кегеты. Посещение большого водопада. Продолжительность 5-8 ч. Авто маршрут 210 км ,пеший от 3км. Цена гид + транспорт 100$ за машину до 4х человек. Проводиться круглый год.\r\n\r\n\r\n5) Бурана - Ыссык-куль . Выезд рано утром . Посещение археологического комплекса Бурана , переезд в город Чолпон-ата. Обед ,прогулка по побережью озера. Далее петроглифы Чолпон- ата, комплекс Рух Ордо, переезд в Боомское ущелье с посещением удивительного Малого каньона , ц.о Гавайи. Продолжительность 12-14 ч. Авто маршрут 540 км . Цена гид + транспорт за машину до 4 х человек 170$\r\n\r\n\r\n    6) Экскурсия г. Бишкек + природный парк Ала арча . Продолжительность 4-6часов.цена 100$ . За машину до 4х человек.  Данные экскурсии проводиться круглый год. \r\n\r\n\r\nТак же имеется много других однодневных и многодневных туров .','Ысык-Куль',100,'12','80IMG-20180309-WA0000.jpg','На автомобиле'),(18,3,'тур по Бишкеку','Будет интересно','Бишкек',200,'2','10Jeti.jpg','Пешая');
/*!40000 ALTER TABLE ` экскурсии` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `гиды`
--

DROP TABLE IF EXISTS `гиды`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `гиды` (
  `idГида` int NOT NULL AUTO_INCREMENT,
  `Имя` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Фамилия` varchar(45) DEFAULT NULL,
  `Страна_проживание` varchar(45) DEFAULT NULL,
  `Номер_тел` varchar(15) DEFAULT NULL,
  `Почта` varchar(100) NOT NULL,
  `Пароль` varchar(45) NOT NULL,
  `Рейтинг` float DEFAULT NULL,
  `Родной_язык` varchar(45) DEFAULT NULL,
  `Доп_языки` varchar(200) DEFAULT NULL,
  `О_себе` varchar(2000) DEFAULT NULL,
  `Аватар` varchar(90) DEFAULT NULL,
  `Сайт` varchar(45) DEFAULT NULL,
  `Инстаграм` varchar(45) DEFAULT NULL,
  `Телеграм` varchar(45) DEFAULT NULL,
  `Подписка` tinyint DEFAULT NULL,
  `Поинты` int DEFAULT NULL,
  PRIMARY KEY (`idГида`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `гиды`
--

LOCK TABLES `гиды` WRITE;
/*!40000 ALTER TABLE `гиды` DISABLE KEYS */;
INSERT INTO `гиды` VALUES (2,'фа','фа',NULL,'5625230','quddus@m.kg','49f0bad299687c62334182178bfd75d8',NULL,'lan_ru','lan_ru','фв','47cambg_3.jpg','фвуа','фв','фыв',NULL,NULL),(3,'Канат','Кагнат',NULL,'+7951634851545','Kanat@m.v','49f0bad299687c62334182178bfd75d8',NULL,'lan_ru','lan_en','Я родился в Туркменабате -Туркменистан. Работаю гидом и имею небольшую успешно функционирующую туристическую компанию. Работал 5 лет в студенческие годы как русско-говорящий гид.','38profile.jpg','https://www.tripzaza.com/guide/4325#about','','',NULL,NULL);
/*!40000 ALTER TABLE `гиды` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `заказы`
--

DROP TABLE IF EXISTS `заказы`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `заказы` (
  `idЗаказа` int NOT NULL AUTO_INCREMENT,
  `id_туриста` int DEFAULT NULL,
  `id_гида` int DEFAULT NULL,
  `Статус заказа` varchar(45) DEFAULT NULL,
  `Время_заказ` date DEFAULT NULL,
  `тексТ` varchar(900) NOT NULL,
  `id_экскурсии` int DEFAULT NULL,
  PRIMARY KEY (`idЗаказа`),
  KEY `idГида_idx` (`id_гида`),
  KEY `id_туриста_idx` (`id_туриста`),
  KEY `id_экскурсии` (`id_экскурсии`),
  KEY `id_гида` (`id_гида`),
  CONSTRAINT `id_туриста1` FOREIGN KEY (`id_туриста`) REFERENCES `пользователи` (`idПользователя`),
  CONSTRAINT `idГида2` FOREIGN KEY (`id_гида`) REFERENCES `гиды` (`idГида`),
  CONSTRAINT `Idэкскурсии2` FOREIGN KEY (`id_экскурсии`) REFERENCES ` экскурсии` (`id_Экскурсии`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `заказы`
--

LOCK TABLES `заказы` WRITE;
/*!40000 ALTER TABLE `заказы` DISABLE KEYS */;
INSERT INTO `заказы` VALUES (7,1,3,'ок',NULL,'уапквчеарнглдш',17);
/*!40000 ALTER TABLE `заказы` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `отзывы`
--

DROP TABLE IF EXISTS `отзывы`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `отзывы` (
  `idОтзыва` int NOT NULL AUTO_INCREMENT,
  `id_туриста` int DEFAULT NULL,
  `id_гида` int DEFAULT NULL,
  `id_экскурсии` int DEFAULT NULL,
  `Оценка` int DEFAULT NULL,
  `Текст_отзыва` varchar(1000) DEFAULT NULL,
  `Время_оставления` date DEFAULT NULL,
  PRIMARY KEY (`idОтзыва`),
  KEY `idПользователя_idx` (`id_туриста`),
  KEY `idГида_idx` (`id_гида`),
  KEY `id_Экскурсии_idx` (`id_экскурсии`),
  CONSTRAINT `id_Экскурсии1` FOREIGN KEY (`id_экскурсии`) REFERENCES ` экскурсии` (`id_Экскурсии`),
  CONSTRAINT `idГида3` FOREIGN KEY (`id_гида`) REFERENCES `гиды` (`idГида`),
  CONSTRAINT `idПользователя1` FOREIGN KEY (`id_туриста`) REFERENCES `пользователи` (`idПользователя`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `отзывы`
--

LOCK TABLES `отзывы` WRITE;
/*!40000 ALTER TABLE `отзывы` DISABLE KEYS */;
/*!40000 ALTER TABLE `отзывы` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `пользователи`
--

DROP TABLE IF EXISTS `пользователи`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `пользователи` (
  `idПользователя` int NOT NULL AUTO_INCREMENT,
  `Имя_пользователя` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'user',
  `Адрес электронной почты` varchar(45) NOT NULL,
  `Пароль` varchar(45) NOT NULL,
  `Номер` decimal(10,0) DEFAULT NULL,
  `Соц_сети` varchar(200) DEFAULT NULL,
  `Аватар` longblob,
  PRIMARY KEY (`idПользователя`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `пользователи`
--

LOCK TABLES `пользователи` WRITE;
/*!40000 ALTER TABLE `пользователи` DISABLE KEYS */;
INSERT INTO `пользователи` VALUES (1,'user','dastan@m.v','49f0bad299687c62334182178bfd75d8',NULL,NULL,NULL);
/*!40000 ALTER TABLE `пользователи` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `сообщение`
--

DROP TABLE IF EXISTS `сообщение`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `сообщение` (
  `idСообщение` int NOT NULL AUTO_INCREMENT,
  `id_туриста` int DEFAULT NULL,
  `id_гида` int DEFAULT NULL,
  `Текст_сообщение` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idСообщение`),
  KEY `id_туриста_idx` (`id_туриста`),
  KEY `id_гида_idx` (`id_гида`),
  CONSTRAINT `id_гида4` FOREIGN KEY (`id_гида`) REFERENCES `гиды` (`idГида`),
  CONSTRAINT `id_туриста3` FOREIGN KEY (`id_туриста`) REFERENCES `пользователи` (`idПользователя`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `сообщение`
--

LOCK TABLES `сообщение` WRITE;
/*!40000 ALTER TABLE `сообщение` DISABLE KEYS */;
/*!40000 ALTER TABLE `сообщение` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-15 17:17:16
