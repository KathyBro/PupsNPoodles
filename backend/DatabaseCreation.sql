CREATE DATABASE IF NOT EXISTS PupsNPoodles;

use PupsNPoodles;

CREATE USER IF NOT EXISTS 'databaseUser'@'localhost' IDENTIFIED BY 'user123';

GRANT ALL PRIVILEGES ON PupsNPoodles.* TO databaseUser@localhost;