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

USE ecodrive;

INSERT INTO charging_stations (name, location, availability, operator_id) VALUES
('EcoCharge Lugogo', '0.3356,32.6061', 1, 1),
('Nakasero Power Hub', '0.3233,32.5823', 1, 2),
('Bugolobi PlugPoint', '0.3121,32.6205', 0, 1),
('Ntinda GreenCharge', '0.3537,32.6050', 1, 3),
('Kabalagala EV Spot', '0.2963,32.6115', 0, 2),
('Wandegeya Power Station', '0.3320,32.5734', 1, 2),
('Makindye E-Stop', '0.2713,32.6056', 1, 3),
('Kampala Road Charge Zone', '0.3139,32.5809', 1, 1);
