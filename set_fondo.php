<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$fondo = $_POST['fondo'] ?? 'fondo1';

if (in_array($fondo, ['fondo1', 'fondo2', 'fondo3'])) {
    setcookie('fondo', $fondo, time() + (60 * 60 * 24 * 30), '/');
}

header('Location: index.php');
exit;
