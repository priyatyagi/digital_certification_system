CREATE DATABASE IF NOT EXISTS digital_certificates;
USE digital_certificates;

CREATE TABLE IF NOT EXISTS students (
    studentID INT AUTO_INCREMENT PRIMARY KEY,
    studentName VARCHAR(255) NOT NULL,
    studentEmail VARCHAR(255) NOT NULL,
    courseName VARCHAR(255) NOT NULL,
    enrollmentDate timestamp NULL DEFAULT NULL, 
    courseDuration VARCHAR(255) NOT NULL
    created_at timestamp NULL NOT NULL, 
    created_by VARCHAR(255) NOT NULL,
    updated_at timestamp NULL DEFAULT NULL, 
    updated_by VARCHAR(255) NOT NULL,
);



CREATE TABLE IF NOT EXISTS certifictaes (
    certificateID INT AUTO_INCREMENT PRIMARY KEY,
    issuedTo VARCHAR(255) NOT NULL,
    issuedBy VARCHAR(255) NOT NULL,
    expirationDate timestamp NULL DEFAULT NULL, 
    issueDate VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    created_at timestamp NULL NOT NULL, 
    created_by VARCHAR(255) NOT NULL,
    updated_at timestamp NULL DEFAULT NULL, 
    updated_by VARCHAR(255) NOT NULL,
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at timestamp NULL NOT NULL, 
    created_by VARCHAR(255) NOT NULL,
);