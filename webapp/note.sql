CREATE DATABASE note;
USE note;

CREATE TABLE liste (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    corps TEXT
);

CREATE USER 'unote'@'localhost' IDENTIFIED BY 'unotepass';
GRANT ALL PRIVILEGES ON note.* TO 'unote'@'localhost';
FLUSH PRIVILEGES;
