<?php
session_start();
$fondo = $_COOKIE['fondo'] ?? 'fondo1';
$tema = $_COOKIE['tema'] ?? 'azul';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Horóscopo Personalizado</title>
</head>
<body class="tema-<?php echo htmlspecialchars($tema); ?>">



<header class="hero">
    <img class="hero__img" src="imagenes/banner.png" alt="Banner Horóscopo">
    <h1 class="hero__title">Bienvenido al Horóscopo</h1>
</header>

<main class="<?php echo htmlspecialchars($fondo); ?>">

<?php if (!isset($_SESSION['usuario'])): ?>

    <!-- Usuario NO logeado -->
    <section class="home-section">
        <h2>Acceso de usuario</h2>
        <a href="registro.php">Ir a registro</a> |
        <a href="login.php">Iniciar sesión</a>

    <!-- Cuadrícula de signos -->
        <div class="zodiac-grid">
            
            <a class="zodiac-card" href="signo.php?signo=aries">
                <img src="imagenes/aries.png" alt="Aries">
                <p>Aries</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=tauro">
                <img src="imagenes/tauro.png" alt="Tauro">
                <p>Tauro</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=geminis">
                <img src="imagenes/geminis.png" alt="Géminis">
                <p>Géminis</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=cancer">
                <img src="imagenes/cancer.png" alt="Cáncer">
                <p>Cáncer</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=leo">
                <img src="imagenes/leo.png" alt="Leo">
                <p>Leo</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=virgo">
                <img src="imagenes/virgo.png" alt="Virgo">
                <p>Virgo</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=libra">
                <img src="imagenes/libra.png" alt="Libra">
                <p>Libra</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=escorpio">
                <img src="imagenes/escorpio.png" alt="Escorpio">
                <p>Escorpio</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=sagitario">
                <img src="imagenes/sagitario.png" alt="Sagitario">
                <p>Sagitario</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=capricornio">
                <img src="imagenes/capricornio.png" alt="Capricornio">
                <p>Capricornio</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=acuario">
                <img src="imagenes/acuario.png" alt="Acuario">
                <p>Acuario</p>
            </a>

            <a class="zodiac-card" href="signo.php?signo=piscis">
                <img src="imagenes/piscis.png" alt="Piscis">
                <p>Piscis</p>
            </a>
    </div>
    </section>


<?php else: ?>

    <!-- Usuario logeado -->
    <section class="home-section">
  <p>Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>

  <!-- Form SOLO para cerrar sesión -->
  <form action="logout.php" method="post">
    <button type="submit">Cerrar sesión</button>
  </form>
</section>

<!-- Selector de fondo EN OTRO form (separado) -->
<section class="home-section">
  <h2>Cambiar color del tema</h2>

  <form method="post" action="set_tema.php" class="tema-selector">
        <button name="tema" value="azul"  class="tema-btn azul">Azul</button>
        <button name="tema" value="rojo"  class="tema-btn rojo">Rojo</button>
        <button name="tema" value="verde" class="tema-btn verde">Verde</button>
        <button name="tema" value="rosa"  class="tema-btn rosa">Rosa</button>
    </form>
    
    <h2>Cambiar fondo</h2>
  <form method="post" action="set_fondo.php" class="fondo-form">
    <button type="submit" name="fondo" value="fondo1" class="fondo-btn">
      <img src="imagenes/fondo.png" alt="Fondo 1"><span>Fondo 1</span>
    </button>

    <button type="submit" name="fondo" value="fondo2" class="fondo-btn">
      <img src="imagenes/fondo2.png" alt="Fondo 2"><span>Fondo 2</span>
    </button>

    <button type="submit" name="fondo" value="fondo3" class="fondo-btn">
      <img src="imagenes/fondo3.png" alt="Fondo 3"><span>Fondo 3</span>
    </button>
  </form>
</section>

<?php endif; ?>

<hr>

<!-- Horóscopo -->
 <!--
finalmente esta seccion no se usa en esta parte de la web 
<section class="home-section">

    


    <h2>Selecciona tu signo zodiacal</h2>

    <form action="guardar_preferencias.php" method="post">
        <select name="signo" required>
            <option value="">-- Selecciona --</option>
            <option value="aries">Aries</option>
            <option value="tauro">Tauro</option>
            <option value="geminis">Géminis</option>
            <option value="cancer">Cáncer</option>
            <option value="leo">Leo</option>
            <option value="virgo">Virgo</option>
            <option value="libra">Libra</option>
            <option value="escorpio">Escorpio</option>
            <option value="sagitario">Sagitario</option>
            <option value="capricornio">Capricornio</option>
            <option value="acuario">Acuario</option>
            <option value="piscis">Piscis</option>
        </select>

        <button type="submit">Guardar signo</button>
    </form>
</section>
-->
</body>
</main>
</html>

