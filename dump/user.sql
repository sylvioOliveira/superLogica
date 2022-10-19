CREATE DATABASE IF NOT EXISTS superlogica;

USE superlogica;

CREATE TABLE users (
    `uuid` varchar(40) NOT NULL,    
    `name` varchar(255) NOT NULL,
    `userName` varchar(255) NOT NULL,
    `zipCode` INT(8),
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL
);
SET GLOBAL local_infile=1;

CREATE TRIGGER before_insert_users
    BEFORE INSERT ON users
    FOR EACH ROW
    SET new.uuid = uuid();