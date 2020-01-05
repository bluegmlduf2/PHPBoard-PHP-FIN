-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        8.0.18 - MySQL Community Server - GPL
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- boarddb 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `boarddb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `boarddb`;

-- 테이블 boarddb.tb_board 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_board` (
  `b_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT 'A : A->B 일대다',
  `b_num` int(11) DEFAULT NULL COMMENT 'B : B->A 다대일 B->C 일대일',
  `b_reply` int(11) DEFAULT '1' COMMENT 'C : C->B 일대일',
  `m_id` varchar(12) NOT NULL COMMENT '일->다->일 관계가 결국 성립해야함',
  `m_name` varchar(10) NOT NULL,
  `b_title` varchar(255) NOT NULL,
  `b_contents` text NOT NULL,
  `b_regdate` datetime NOT NULL,
  PRIMARY KEY (`b_idx`),
  KEY `board_order` (`b_num`,`b_reply`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 boarddb.tb_member 구조 내보내기
CREATE TABLE IF NOT EXISTS `tb_member` (
  `m_idx` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` varchar(12) NOT NULL,
  `m_name` varchar(10) NOT NULL,
  `m_pass` varchar(100) NOT NULL,
  PRIMARY KEY (`m_idx`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 내보낼 데이터가 선택되어 있지 않습니다.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
