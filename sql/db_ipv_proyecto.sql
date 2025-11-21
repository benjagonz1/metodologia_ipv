-- SQL para db_ipv_proyecto (usar root sin password)
CREATE DATABASE IF NOT EXISTS db_ipv_proyecto CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_ipv_proyecto;

CREATE TABLE IF NOT EXISTS roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  descripcion VARCHAR(150),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO roles (nombre, descripcion) VALUES ('Administrador','Acceso total'),('Inspector','Inspector'),('Consulta','Solo lectura');

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  rol_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (rol_id) REFERENCES roles(id)
);

CREATE TABLE IF NOT EXISTS tipos_viviendas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  descripcion VARCHAR(255)
);

INSERT INTO tipos_viviendas (nombre, descripcion) VALUES
('37m2 c5','Prototipo 37m2 c5'),
('F','Prototipo F'),
('F DIS','Prototipo F DIS'),
('H','Prototipo H'),
('C','Prototipo C');

CREATE TABLE IF NOT EXISTS estados_inspeccion (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  color VARCHAR(20)
);

INSERT INTO estados_inspeccion (nombre, color) VALUES ('Aprobada','#22c55e'),('Pendiente','#facc15'),('Rechazada','#ef4444');

CREATE TABLE IF NOT EXISTS inspecciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  codigo VARCHAR(50) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  tipo_vivienda_id INT,
  estado_id INT,
  inspector_id INT,
  fecha_inspeccion DATE,
  observaciones TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL,
  FOREIGN KEY (tipo_vivienda_id) REFERENCES tipos_viviendas(id),
  FOREIGN KEY (estado_id) REFERENCES estados_inspeccion(id),
  FOREIGN KEY (inspector_id) REFERENCES users(id)
);

-- insertar usuario admin e inspector
INSERT INTO users (nombre,email,password,rol_id) VALUES
('Admin','admin@ipv.local','$2y$10$abcdefghijklmnopqrstuv',1);

-- usuario inspector con id 2 (password de ejemplo)
INSERT INTO users (nombre,email,password,rol_id) VALUES
('Inspector Uno','inspector@ipv.local','$2y$10$abcdefghijklmnopqrstuv',2);

INSERT INTO inspecciones (codigo,direccion,tipo_vivienda_id,estado_id,inspector_id,fecha_inspeccion,observaciones) VALUES
('INS-2025-001','Av. Ejemplo 123',1,1,2,'2025-01-15','Inspección inicial'),
('INS-2025-002','Calle Falsa 456',2,2,2,'2025-02-10','Avance parcial');
