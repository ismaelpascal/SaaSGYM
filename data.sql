-- =================================================================
-- Esquema de Base de Datos para SaaSGYM
-- Generado a partir del Diagrama Entidad-Relación
-- =================================================================

-- Creación y selección de la base de datos
DROP DATABASE IF EXISTS saasgym_db;
CREATE DATABASE saasgym_db;
USE saasgym_db;

-- -----------------------------------------------------
-- Tabla: Socios
-- -----------------------------------------------------
CREATE TABLE Socios (
    socio_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    dni VARCHAR(20) UNIQUE,
    email VARCHAR(255) UNIQUE NOT NULL,
    telefono VARCHAR(50),
    fecha_nacimiento DATE,
    domicilio VARCHAR(255),
    contacto_emergencia VARCHAR(255),
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------------
-- Tabla: Planes
-- -----------------------------------------------------
CREATE TABLE Planes (
    plan_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL COMMENT 'Ej: tiempo, clases',
    duracion_dias INT,
    cantidad_clases INT,
    precio DECIMAL(10, 2) NOT NULL
);

-- -----------------------------------------------------
-- Tabla: Membresias
-- -----------------------------------------------------
CREATE TABLE Membresias (
    membresia_id INT AUTO_INCREMENT PRIMARY KEY,
    socio_id INT NOT NULL,
    plan_id INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_vencimiento DATE NOT NULL,
    estado VARCHAR(50) NOT NULL COMMENT 'Ej: activo, vencido, congelado',
    FOREIGN KEY (socio_id) REFERENCES Socios(socio_id),
    FOREIGN KEY (plan_id) REFERENCES Planes(plan_id)
);

-- -----------------------------------------------------
-- Tabla: Productos
-- -----------------------------------------------------
CREATE TABLE Productos (
    producto_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    categoria VARCHAR(100),
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0
);

-- -----------------------------------------------------
-- Tabla: Ventas_POS
-- -----------------------------------------------------
CREATE TABLE Ventas_POS (
    venta_id INT AUTO_INCREMENT PRIMARY KEY,
    socio_id INT NULL,
    fecha_venta DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (socio_id) REFERENCES Socios(socio_id)
);

-- -----------------------------------------------------
-- Tabla: Detalle_Ventas
-- -----------------------------------------------------
CREATE TABLE Detalle_Ventas (
    detalle_id INT AUTO_INCREMENT PRIMARY KEY,
    venta_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (venta_id) REFERENCES Ventas_POS(venta_id),
    FOREIGN KEY (producto_id) REFERENCES Productos(producto_id)
);

-- -----------------------------------------------------
-- Tabla: Pagos
-- -----------------------------------------------------
CREATE TABLE Pagos (
    pago_id INT AUTO_INCREMENT PRIMARY KEY,
    membresia_id INT NULL,
    venta_id INT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    metodo_pago VARCHAR(50),
    fecha_pago DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (membresia_id) REFERENCES Membresias(membresia_id),
    FOREIGN KEY (venta_id) REFERENCES Ventas_POS(venta_id)
);

-- -----------------------------------------------------
-- Tabla: Asistencias
-- -----------------------------------------------------
CREATE TABLE Asistencias (
    asistencia_id INT AUTO_INCREMENT PRIMARY KEY,
    socio_id INT NOT NULL,
    fecha_hora_ingreso DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (socio_id) REFERENCES Socios(socio_id)
);

-- -----------------------------------------------------
-- Tabla: Notas_Cliente
-- -----------------------------------------------------
CREATE TABLE Notas_Cliente (
    nota_id INT AUTO_INCREMENT PRIMARY KEY,
    socio_id INT NOT NULL,
    contenido TEXT,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    visible_cliente BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (socio_id) REFERENCES Socios(socio_id)
);
