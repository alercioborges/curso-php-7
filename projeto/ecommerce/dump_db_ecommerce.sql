-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para procedure db_ecommerce.sp_userspasswordsrecoveries_create
DELIMITER //
CREATE PROCEDURE `sp_userspasswordsrecoveries_create`(
piduser INT,
pdesip VARCHAR(45)
)
BEGIN
  
  INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END//
DELIMITER ;

-- Copiando estrutura para procedure db_ecommerce.sp_usersupdate_save
DELIMITER //
CREATE PROCEDURE `sp_usersupdate_save`(
	IN `piduser` INT,
	IN `pdesperson` VARCHAR(64),
	IN `pdeslogin` VARCHAR(64),
	IN `pdesemail` VARCHAR(128),
	IN `pnrphone` BIGINT,
	IN `pinadmin` TINYINT
)
BEGIN
  
    DECLARE vidperson INT;
    
  SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
    desperson = pdesperson,
        desemail = pdesemail,
        nrphone = pnrphone
  WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
    deslogin = pdeslogin,
        inadmin = pinadmin
  WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END//
DELIMITER ;

-- Copiando estrutura para procedure db_ecommerce.sp_users_delete
DELIMITER //
CREATE PROCEDURE `sp_users_delete`(
piduser INT
)
BEGIN
  
    DECLARE vidperson INT;
    
  SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    DELETE FROM tb_users WHERE iduser = piduser;
    DELETE FROM tb_persons WHERE idperson = vidperson;
    
END//
DELIMITER ;

-- Copiando estrutura para procedure db_ecommerce.sp_users_save
DELIMITER //
CREATE PROCEDURE `sp_users_save`(
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT
)
BEGIN
  
    DECLARE vidperson INT;
    
  INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END//
DELIMITER ;

-- Copiando estrutura para tabela db_ecommerce.tb_addresses
CREATE TABLE IF NOT EXISTS `tb_addresses` (
  `idaddress` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `desaddress` varchar(128) NOT NULL,
  `descomplement` varchar(32) DEFAULT NULL,
  `descity` varchar(32) NOT NULL,
  `desstate` varchar(32) NOT NULL,
  `descountry` varchar(32) NOT NULL,
  `nrzipcode` int(11) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idaddress`),
  KEY `fk_addresses_persons_idx` (`idperson`),
  CONSTRAINT `fk_addresses_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_addresses: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_ecommerce.tb_carts
CREATE TABLE IF NOT EXISTS `tb_carts` (
  `idcart` int(11) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idaddress` int(11) DEFAULT NULL,
  `vlfreight` decimal(10,2) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idcart`),
  KEY `FK_carts_users_idx` (`iduser`),
  KEY `fk_carts_addresses_idx` (`idaddress`),
  CONSTRAINT `fk_carts_addresses` FOREIGN KEY (`idaddress`) REFERENCES `tb_addresses` (`idaddress`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carts_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_carts: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_ecommerce.tb_cartsproducts
CREATE TABLE IF NOT EXISTS `tb_cartsproducts` (
  `idcartproduct` int(11) NOT NULL AUTO_INCREMENT,
  `idcart` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `dtremoved` datetime NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idcartproduct`),
  KEY `FK_cartsproducts_carts_idx` (`idcart`),
  KEY `FK_cartsproducts_products_idx` (`idproduct`),
  CONSTRAINT `fk_cartsproducts_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cartsproducts_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_cartsproducts: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_ecommerce.tb_categories
CREATE TABLE IF NOT EXISTS `tb_categories` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `descategory` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_categories: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_ecommerce.tb_orders
CREATE TABLE IF NOT EXISTS `tb_orders` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `idcart` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `vltotal` decimal(10,2) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idorder`),
  KEY `FK_orders_carts_idx` (`idcart`),
  KEY `FK_orders_users_idx` (`iduser`),
  KEY `fk_orders_ordersstatus_idx` (`idstatus`),
  CONSTRAINT `fk_orders_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_ordersstatus` FOREIGN KEY (`idstatus`) REFERENCES `tb_ordersstatus` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_orders: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_ecommerce.tb_ordersstatus
CREATE TABLE IF NOT EXISTS `tb_ordersstatus` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `desstatus` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_ordersstatus: ~4 rows (aproximadamente)
INSERT INTO `tb_ordersstatus` (`idstatus`, `desstatus`, `dtregister`) VALUES
	(1, 'Em Aberto', '2017-03-13 06:00:00');
INSERT INTO `tb_ordersstatus` (`idstatus`, `desstatus`, `dtregister`) VALUES
	(2, 'Aguardando Pagamento', '2017-03-13 06:00:00');
INSERT INTO `tb_ordersstatus` (`idstatus`, `desstatus`, `dtregister`) VALUES
	(3, 'Pago', '2017-03-13 06:00:00');
INSERT INTO `tb_ordersstatus` (`idstatus`, `desstatus`, `dtregister`) VALUES
	(4, 'Entregue', '2017-03-13 06:00:00');

-- Copiando estrutura para tabela db_ecommerce.tb_persons
CREATE TABLE IF NOT EXISTS `tb_persons` (
  `idperson` int(11) NOT NULL AUTO_INCREMENT,
  `desperson` varchar(64) NOT NULL,
  `desemail` varchar(128) DEFAULT NULL,
  `nrphone` bigint(20) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_persons: ~4 rows (aproximadamente)
INSERT INTO `tb_persons` (`idperson`, `desperson`, `desemail`, `nrphone`, `dtregister`) VALUES
	(1, 'ALERCIO SILVA', 'admin@hotmail.com.br', 2147483647, '2017-03-01 06:00:00');
INSERT INTO `tb_persons` (`idperson`, `desperson`, `desemail`, `nrphone`, `dtregister`) VALUES
	(7, 'Suporte', 'suporte@hcode.com.br', 1112345678, '2017-03-15 19:10:27');
INSERT INTO `tb_persons` (`idperson`, `desperson`, `desemail`, `nrphone`, `dtregister`) VALUES
	(28, 'USUARIO DE TESTE', 'alercio@alercio', 11555555555, '2023-07-26 17:37:33');
INSERT INTO `tb_persons` (`idperson`, `desperson`, `desemail`, `nrphone`, `dtregister`) VALUES
	(29, 'SILVA DA SILVA UM', 'silva@silva1', 155555555511, '2023-07-26 17:39:03');

-- Copiando estrutura para tabela db_ecommerce.tb_products
CREATE TABLE IF NOT EXISTS `tb_products` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `desproduct` varchar(64) NOT NULL,
  `vlprice` decimal(10,2) NOT NULL,
  `vlwidth` decimal(10,2) NOT NULL,
  `vlheight` decimal(10,2) NOT NULL,
  `vllength` decimal(10,2) NOT NULL,
  `vlweight` decimal(10,2) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_products: ~3 rows (aproximadamente)
INSERT INTO `tb_products` (`idproduct`, `desproduct`, `vlprice`, `vlwidth`, `vlheight`, `vllength`, `vlweight`, `desurl`, `dtregister`) VALUES
	(1, 'Smartphone Android 7.0', 999.95, 75.00, 151.00, 80.00, 167.00, 'smartphone-android-7.0', '2017-03-13 06:00:00');
INSERT INTO `tb_products` (`idproduct`, `desproduct`, `vlprice`, `vlwidth`, `vlheight`, `vllength`, `vlweight`, `desurl`, `dtregister`) VALUES
	(2, 'SmartTV LED 4K', 3925.99, 917.00, 596.00, 288.00, 8600.00, 'smarttv-led-4k', '2017-03-13 06:00:00');
INSERT INTO `tb_products` (`idproduct`, `desproduct`, `vlprice`, `vlwidth`, `vlheight`, `vllength`, `vlweight`, `desurl`, `dtregister`) VALUES
	(3, 'Notebook 14" 4GB 1TB', 1949.99, 345.00, 23.00, 30.00, 2000.00, 'notebook-14-4gb-1tb', '2017-03-13 06:00:00');

-- Copiando estrutura para tabela db_ecommerce.tb_productscategories
CREATE TABLE IF NOT EXISTS `tb_productscategories` (
  `idcategory` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  PRIMARY KEY (`idcategory`,`idproduct`),
  KEY `fk_productscategories_products_idx` (`idproduct`),
  CONSTRAINT `fk_productscategories_categories` FOREIGN KEY (`idcategory`) REFERENCES `tb_categories` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productscategories_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_productscategories: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_ecommerce.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `deslogin` varchar(64) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) NOT NULL DEFAULT 0,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`iduser`),
  KEY `FK_users_persons_idx` (`idperson`),
  CONSTRAINT `fk_users_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_users: ~4 rows (aproximadamente)
INSERT INTO `tb_users` (`iduser`, `idperson`, `deslogin`, `despassword`, `inadmin`, `dtregister`) VALUES
	(1, 1, 'admin', '$2y$12$YlooCyNvyTji8bPRcrfNfOKnVMmZA9ViM2A3IpFjmrpIbp5ovNmga', 1, '2017-03-13 06:00:00');
INSERT INTO `tb_users` (`iduser`, `idperson`, `deslogin`, `despassword`, `inadmin`, `dtregister`) VALUES
	(7, 7, 'suporte', '$2y$12$HFjgUm/mk1RzTy4ZkJaZBe0Mc/BA2hQyoUckvm.lFa6TesjtNpiMe', 1, '2017-03-15 19:10:27');
INSERT INTO `tb_users` (`iduser`, `idperson`, `deslogin`, `despassword`, `inadmin`, `dtregister`) VALUES
	(28, 28, 'teste', 'qwer', 1, '2023-07-26 17:37:33');
INSERT INTO `tb_users` (`iduser`, `idperson`, `deslogin`, `despassword`, `inadmin`, `dtregister`) VALUES
	(29, 29, 'silva1', 'silva', 1, '2023-07-26 17:39:03');

-- Copiando estrutura para tabela db_ecommerce.tb_userslogs
CREATE TABLE IF NOT EXISTS `tb_userslogs` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `deslog` varchar(128) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `desuseragent` varchar(128) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idlog`),
  KEY `fk_userslogs_users_idx` (`iduser`),
  CONSTRAINT `fk_userslogs_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_userslogs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_ecommerce.tb_userspasswordsrecoveries
CREATE TABLE IF NOT EXISTS `tb_userspasswordsrecoveries` (
  `idrecovery` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idrecovery`),
  KEY `fk_userspasswordsrecoveries_users_idx` (`iduser`),
  CONSTRAINT `fk_userspasswordsrecoveries_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela db_ecommerce.tb_userspasswordsrecoveries: ~3 rows (aproximadamente)
INSERT INTO `tb_userspasswordsrecoveries` (`idrecovery`, `iduser`, `desip`, `dtrecovery`, `dtregister`) VALUES
	(1, 7, '127.0.0.1', NULL, '2017-03-15 19:10:59');
INSERT INTO `tb_userspasswordsrecoveries` (`idrecovery`, `iduser`, `desip`, `dtrecovery`, `dtregister`) VALUES
	(2, 7, '127.0.0.1', '2017-03-15 13:33:45', '2017-03-15 19:11:18');
INSERT INTO `tb_userspasswordsrecoveries` (`idrecovery`, `iduser`, `desip`, `dtrecovery`, `dtregister`) VALUES
	(3, 7, '127.0.0.1', '2017-03-15 13:37:35', '2017-03-15 19:37:12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
