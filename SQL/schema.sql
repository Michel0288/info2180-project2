CREATE DATABASE IF NOT EXISTS Tracker;
USE Tracker;
CREATE TABLE Users(
    id INT AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    password VARCHAR(255)  NOT NULL,
    email VARCHAR(255)  NOT NULL,
    date_joined DATETIME  NOT NULL DEFAULT (NOW()),
    PRIMARY KEY(id)
);
CREATE TABLE Issues(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT(300) NOT NULL,
    type VARCHAR(255) NOT NULL,
    priority VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL DEFAULT 'Open',
    assigned_to INT(255) NOT NULL,
    created_by INT(255) NOT NULL,
    created DATETIME NOT NULL DEFAULT (NOW()),
    updated DATETIME NOT NULL DEFAULT (NOW()),
    PRIMARY KEY(id)
);
INSERT INTO Users(firstname,lastname,password,email) VALUES ('admin','admin','$2y$10$E.LnbI7qHpseGX976w7haOXg2rBVejLSizC2Sqje9qqrpHVMqhCzi','admin@project2.com');
GRANT ALL PRIVILEGES ON Tracker.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';
