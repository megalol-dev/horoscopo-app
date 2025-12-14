<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$tema = $_POST['tema'] ?? 'azul';

if (in_array($tema, ['azul', 'rojo', 'verde', 'rosa'])) {
    setcookie('tema', $tema, time() + (60 * 60 * 24 * 30), '/');
}

header('Location: index.php');
exit;
