-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla star_db.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla star_db.posts: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `description`, `created_at`, `updated_at`) VALUES
	(5, 'Hello, what a beautiful weather today', '2020-02-23 00:00:00', '2020-02-23 00:00:00'),
	(6, 'Yesterday\'s show was amazing', '2020-02-23 00:00:00', '2020-02-23 00:00:00'),
	(7, 'What music do you like?', '2020-02-23 00:00:00', '2020-02-23 00:00:00'),
	(8, 'I like it\'s pizza', '2020-02-23 00:00:00', '2020-02-23 00:00:00'),
	(9, 'You like dancing', '2020-02-23 00:00:00', '2020-02-23 00:00:00');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Volcando estructura para tabla star_db.post_likes
CREATE TABLE IF NOT EXISTS `post_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_likes_posts1_idx` (`post_id`),
  CONSTRAINT `fk_post_likes_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=589 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla star_db.post_likes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `post_likes` DISABLE KEYS */;
INSERT INTO `post_likes` (`id`, `post_id`, `ip_address`) VALUES
	(584, 7, '127.0.0.1'),
	(585, 6, '127.0.0.1'),
	(588, 5, '127.0.0.1');
/*!40000 ALTER TABLE `post_likes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
