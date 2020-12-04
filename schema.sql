CREATE DATABASE IF NOT EXISTS Tracker;
USE Tracker;
CREATE TABLE User(
    id INT AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    password VARCHAR(255)  NOT NULL,
    email VARCHAR(255)  NOT NULL,
    date_joined DATETIME  NOT NULL DEFAULT (NOW()),
    PRIMARY KEY(id)
);
CREATE TABLE ISSUES(
    id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT(300) NOT NULL,
    type VARCHAR(255) NOT NULL,
    priority VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL,
    assigned_to INT(255) NOT NULL,
    created_by INT(255) NOT NULL,
    created DATETIME NOT NULL DEFAULT (NOW()),
    updated DATETIME NOT NULL DEFAULT (NOW()),
    PRIMARY KEY(id)
);