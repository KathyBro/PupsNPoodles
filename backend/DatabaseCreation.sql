CREATE DATABASE IF NOT EXISTS PupsNPoodles;

use PupsNPoodles;

CREATE USER IF NOT EXISTS 'databaseUser'@'localhost' IDENTIFIED BY 'user123';

GRANT ALL PRIVILEGES ON PupsNPoodles.* TO databaseUser@localhost;

CREATE TABLE IF NOT EXISTS UserTable (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(25) NOT NULL,
username VARCHAR(25) NOT NULL,
password VARCHAR(25) NOT NULL,
isBusiness BINARY NOT NULL
);

CREATE TABLE IF NOT EXISTS AppointmentTable(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    businessId INT NOT NULL,
    ownerId INT NOT NULL,
    petName VARCHAR(25) NOT NULL,
    petSpecies VARCHAR(30) NOT NULL,
    appointmentTime DATETIME NOT NULL,
    status ENUM('pending', 'rejected', 'accepted')
);

INSERT INTO UserTable(name, username, password, isBusiness) VALUES ('Test User', 'test', 'test', 0);
