CREATE DATABASE IF NOT EXISTS employee_management;
USE employee_management;

CREATE TABLE IF NOT EXISTS employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_number VARCHAR(30) NOT NULL UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    department VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO employees (employee_number, first_name, last_name, email, department, position)
VALUES
('EMP-2026-001', 'Juan', 'Dela Cruz', 'juan.delacruz@company.com', 'IT', 'Systems Analyst'),
('EMP-2026-002', 'Maria', 'Santos', 'maria.santos@company.com', 'HR', 'HR Specialist'),
('EMP-2026-003', 'Pedro', 'Reyes', 'pedro.reyes@company.com', 'Finance', 'Accountant');