<?php
session_start();
$fondo = $_COOKIE['fondo'] ?? 'fondo1';
$tema = $_COOKIE['tema'] ?? 'azul';
require_once __DIR__ . '/database/conexion.php';

// 1) Si venimos de un error anterior, lo cogemos y lo borramos (flash message)
$error = $_SESSION['error_registro'] ?? null;
unset($_SESSION['error_registro']);

// 2) Si se envía el formulario por POST, procesamos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmar = $_POST['confirmar_password'] ?? '';

    // Validaciones servidor
    if ($nombre === '' || $apellidos === '' || $email === '' || $password === '' || $confirmar === '') {
        $_SESSION['error_registro'] = 'Todos los campos son obligatorios.';
        header('Location: registro.php');
        exit;
    }

    if ($password !== $confirmar) {
        $_SESSION['error_registro'] = 'Las contraseñas no coinciden.';
        header('Location: registro.php');
        exit;
    }

    if (!preg_match('/^(?=.*[A-Z]).{8,}$/', $password)) {
        $_SESSION['error_registro'] = 'La contraseña debe tener mínimo 8 caracteres y al menos 1 mayúscula.';
        header('Location: registro.php');
        exit;
    }

    // Hash seguro
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, password)
                VALUES (:nombre, :apellidos, :email, :password)";

        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':apellidos', $apellidos);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $passwordHash);
        $stmt->execute();

        // Iniciar sesión automáticamente
        $_SESSION['usuario'] = $nombre;

        header('Location: index.php');
        exit;

    } catch (PDOException $e) {
        // Email duplicado u otro error
        $_SESSION['error_registro'] = 'Error al registrar: ese email ya existe.';
        header('Location: registro.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Registro de Usuario</title>
</head>

<header class="hero">
    <img class="hero__img" src="imagenes/banner.png" alt="Banner Horóscopo">
    <h1 class="hero__title">Bienvenido al Horóscopo</h1>
</header>

<main class="<?php echo htmlspecialchars($fondo); ?>">
<body class="tema-<?php echo htmlspecialchars($tema); ?>">

<h1>Registro de Usuario</h1>

<?php if ($error): ?>
    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form action="registro.php" method="post">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Apellidos:</label><br>
    <input type="text" name="apellidos" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input
        type="password"
        name="password"
        required
        pattern="^(?=.*[A-Z]).{8,}$"
        title="Mínimo 8 caracteres y al menos una mayúscula"
    ><br><br>

    <label>Confirmar contraseña:</label><br>
    <input
        type="password"
        name="confirmar_password"
        required
        pattern="^(?=.*[A-Z]).{8,}$"
        title="Debe coincidir con la contraseña"
    ><br><br>

    <button type="submit">Registrarse</button>
    <a href="index.php" class="btn-secundario">Volver</a>
</form>

<br>


</body>
</main>
</html>
