-- Active: 1685362371932@@127.0.0.1@3306@campus
CREATE DATABASE campus;

USE campus;

CREATE TABLE campers(
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR (80) NOT NULL,
    direccion VARCHAR (80) NOT NULL,
    logros VARCHAR (80) NOT NULL,
    ingles VARCHAR (80) NOT NULL,
    ser VARCHAR (80) NOT NULL,
    review VARCHAR (80) NOT NULL,
    skills VARCHAR (80) NOT NULL
);

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idCamper INT NOT NULL,
    email VARCHAR (80) NOT NULL,
    username VARCHAR (80) NOT NULL,
    password VARCHAR (80) NOT NULL,
    FOREIGN KEY (idCamper) REFERENCES campers(id)
);