-- Crear la base de datos "Atalanta"
CREATE DATABASE Atalanta;

-- Usar la base de datos "Atalanta"
USE Atalanta;

-- Crear la tabla "Usuarios"
CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);

-- Agregar un índice único en la columna "correo" para evitar duplicados
CREATE UNIQUE INDEX idx_correo ON Usuarios (correo);
