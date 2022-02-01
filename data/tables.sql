-- Database -- 
CREATE DATABASE password_manager CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Tables --
CREATE TABLE passwords(
	id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    site VARCHAR(255) NOT NULL,
    username VARCHAR(100),
    password VARCHAR(1000) NOT NULL,
    favorite BOOLEAN DEFAULT FALSE,
    user_id INT(255) DEFAULT 1
);