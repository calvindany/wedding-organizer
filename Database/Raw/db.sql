CREATE DATABASE wedding_organizer;

USE wedding_organizer;

CREATE TABLE tb_users (
	pk_tb_user INT(4) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE tb_catalogues (
 	pk_tb_catalogue INT(4) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    price INT(11) NOT NULL,
    fk_tb_user INT(4) NOT NULL,
    is_published TINYINT(1) NOT NULL,
    created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (fk_tb_user) REFERENCES tb_users(pk_tb_user)
);

CREATE TABLE tb_orders (
 	pk_tb_order INT(4) PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(16) NOT NULL,
    status ENUM("Requested", "Approved") NOT NULL,
    created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE `tb_orders` ADD `fk_tb_catalogue` INT(4) NOT NULL AFTER `phone_number`;
ALTER TABLE `tb_orders` ADD CONSTRAINT `tb_orders_ibfk_1` FOREIGN KEY (`fk_tb_catalogue`) REFERENCES `tb_catalogues`(`pk_tb_catalogue`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE tb_settings (
	pk_tb_setting INT(4) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    setting_name VARCHAR(100) NOT NULL,
    setting_value VARCHAR(100) NOT NULL,
    created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE `tb_settings` ADD `description` TEXT NOT NULL AFTER `setting_value`;