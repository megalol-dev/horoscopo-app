<?php
try {
    // Ruta a la base de datos SQLite
    $rutaDB = __DIR__ . '/horoscopo.db';

    // Crear conexión PDO con SQLite
    $conexion = new PDO("sqlite:$rutaDB");

    // Modo de errores: excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error de conexión con la base de datos: " . $e->getMessage());
}