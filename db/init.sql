CREATE DATABASE IF NOT EXISTS ecodrive;
USE ecodrive;

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role VARCHAR(50)
);

CREATE TABLE charging_stations (
  station_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  location TEXT,
  availability BOOLEAN,
  operator_id INT
);

CREATE TABLE transactions (
  transaction_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  station_id INT,
  amount_paid DECIMAL(10,2),
  payment_method VARCHAR(50),
  timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
);
