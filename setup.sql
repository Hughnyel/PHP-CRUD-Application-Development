-- Run this in phpMyAdmin (SQL tab) to create the database, table, and sample employees.

CREATE DATABASE IF NOT EXISTS employee_db;
USE employee_db;

CREATE TABLE IF NOT EXISTS employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_number VARCHAR(20) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    department VARCHAR(50) NOT NULL,
    position VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO employees (employee_number, first_name, last_name, email, department, position) VALUES
('EMP-0001', 'Juan', 'Dela Cruz', 'juan.delacruz@email.com', 'IT', 'Web Developer'),
('EMP-0002', 'Maria', 'Santos', 'maria.santos@email.com', 'HR', 'HR Officer'),
('EMP-0003', 'Jose', 'Reyes', 'jose.reyes@email.com', 'IT', 'Network Administrator'),
('EMP-0004', 'Ana', 'Garcia', 'ana.garcia@email.com', 'Finance', 'Accountant'),
('EMP-0005', 'Mark', 'Bautista', 'mark.bautista@email.com', 'Marketing', 'Marketing Assistant');
