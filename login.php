<?php
session_start();
$fondo = $_COOKIE['fondo'] ?? 'fondo1';
$tema = $_COOKIE['tema'] ?? 'azul';
require_once __DIR__ . '/database/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario['nombre'];
        header('Location: index.php');
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Iniciar sesión</title>
</head>

<header class="hero">
    <img class="hero__img" src="imagenes/banner.png" alt="Banner Horóscopo">
    <h1 class="hero__title">Bienvenido al Horóscopo</h1>
</header>

<main class="<?php echo htmlspecialchars($fondo); ?>">
<body class="tema-<?php echo htmlspecialchars($tema); ?>">

<h1>Iniciar sesión</h1>

<?php if (isset($error)) echo "<p>$error</p>"; ?>

<form method="post">
    <input type="text" name="nombre" placeholder="Nombre" required><br><br>
    <input type="password" name="password" placeholder="Contraseña" required><br><br>
    <button type="submit">Entrar</button>

    <a href="index.php" class="btn-secundario">Volver</a>
</form>


</body>
</main>
</html>
