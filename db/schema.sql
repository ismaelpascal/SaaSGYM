-- --------------------------------------------------------
-- Archivo de esquema para la base de datos SaaSGYM
-- --------------------------------------------------------

-- 1. Creación de la Base de Datos
DROP DATABASE IF EXISTS saasgym_db;
CREATE DATABASE saasgym_db;
USE saasgym_db;

-- 2. Tabla de Socios (Members)
CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabla de Tipos de Membresía
CREATE TABLE membership_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    duracion_dias INT NOT NULL
);

-- 4. Tabla de Pagos (Payments) con Foreign Key
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    membership_type_id INT NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    fecha_pago DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE,
    FOREIGN KEY (membership_type_id) REFERENCES membership_types(id)
);

-- 5. Datos Iniciales (Seed Data)
INSERT INTO membership_types (nombre, precio, duracion_dias) VALUES
('Plan Mensual', 5000.00, 30),
('Plan Trimestral', 13500.00, 90),
('Plan Anual', 48000.00, 365);

-- (Opcional) Crear un primer socio de ejemplo
INSERT INTO members (nombre, apellido, email) VALUES
('Juan', 'Perez', 'juan.perez@example.com');