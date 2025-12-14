<?php
session_start();

$tema  = $_COOKIE['tema']  ?? 'azul';
$fondo = $_COOKIE['fondo'] ?? 'fondo1';

$signos = [
  'aries' => [
    'nombre' => 'Aries',
    'elemento' => 'Fuego',
    'fechas' => '21 de marzo – 19 de abril',
    'descripcion' => 'Impulsivo, valiente y directo. Aries suele tomar la iniciativa y no le asusta empezar de cero. Cuando se motiva, va a por ello sin mirar atrás.',
    'compatibles' => ['Leo', 'Sagitario', 'Géminis', 'Acuario'],
    'no_compatibles' => ['Cáncer', 'Capricornio'],
    'imagen' => 'imagenes/aries.png'
  ],
  'tauro' => [
    'nombre' => 'Tauro',
    'elemento' => 'Tierra',
    'fechas' => '20 de abril – 20 de mayo',
    'descripcion' => 'Constante, práctico y fiel. Tauro busca seguridad y estabilidad; cuando se compromete, lo hace en serio y con paciencia.',
    'compatibles' => ['Virgo', 'Capricornio', 'Cáncer', 'Piscis'],
    'no_compatibles' => ['Acuario', 'Leo'],
    'imagen' => 'imagenes/tauro.png'
  ],
  'geminis' => [
    'nombre' => 'Géminis',
    'elemento' => 'Aire',
    'fechas' => '21 de mayo – 20 de junio',
    'descripcion' => 'Curioso, comunicativo y versátil. Géminis necesita estímulos y variedad; aprende rápido y se adapta mejor que nadie.',
    'compatibles' => ['Libra', 'Acuario', 'Aries', 'Leo'],
    'no_compatibles' => ['Virgo', 'Piscis'],
    'imagen' => 'imagenes/geminis.png'
  ],
  'cancer' => [
    'nombre' => 'Cáncer',
    'elemento' => 'Agua',
    'fechas' => '21 de junio – 22 de julio',
    'descripcion' => 'Emocional, protector y sensible. Cáncer valora el hogar, los vínculos y la lealtad; puede ser reservado hasta que confía.',
    'compatibles' => ['Escorpio', 'Piscis', 'Tauro', 'Virgo'],
    'no_compatibles' => ['Aries', 'Libra'],
    'imagen' => 'imagenes/cancer.png'
  ],
  'leo' => [
    'nombre' => 'Leo',
    'elemento' => 'Fuego',
    'fechas' => '23 de julio – 22 de agosto',
    'descripcion' => 'Carismático, creativo y orgulloso. Leo brilla cuando se siente valorado; le gusta liderar, proteger y dejar huella.',
    'compatibles' => ['Aries', 'Sagitario', 'Géminis', 'Libra'],
    'no_compatibles' => ['Tauro', 'Escorpio'],
    'imagen' => 'imagenes/leo.png'
  ],
  'virgo' => [
    'nombre' => 'Virgo',
    'elemento' => 'Tierra',
    'fechas' => '23 de agosto – 22 de septiembre',
    'descripcion' => 'Analítico, detallista y resolutivo. Virgo busca mejorar lo que toca; es práctico y muy fiable cuando hay que organizar.',
    'compatibles' => ['Tauro', 'Capricornio', 'Cáncer', 'Escorpio'],
    'no_compatibles' => ['Géminis', 'Sagitario'],
    'imagen' => 'imagenes/virgo.png'
  ],
  'libra' => [
    'nombre' => 'Libra',
    'elemento' => 'Aire',
    'fechas' => '23 de septiembre – 22 de octubre',
    'descripcion' => 'Diplomático, sociable y equilibrado. Libra busca armonía y justicia; le cuesta decidir rápido, pero acierta cuando se calma.',
    'compatibles' => ['Géminis', 'Acuario', 'Leo', 'Sagitario'],
    'no_compatibles' => ['Cáncer', 'Capricornio'],
    'imagen' => 'imagenes/libra.png'
  ],
  'escorpio' => [
    'nombre' => 'Escorpio',
    'elemento' => 'Agua',
    'fechas' => '23 de octubre – 21 de noviembre',
    'descripcion' => 'Intenso, leal y profundo. Escorpio siente todo con fuerza; cuando confía, se entrega de verdad y protege a los suyos.',
    'compatibles' => ['Cáncer', 'Piscis', 'Virgo', 'Capricornio'],
    'no_compatibles' => ['Leo', 'Acuario'],
    'imagen' => 'imagenes/escorpio.png'
  ],
  'sagitario' => [
    'nombre' => 'Sagitario',
    'elemento' => 'Fuego',
    'fechas' => '22 de noviembre – 21 de diciembre',
    'descripcion' => 'Aventurero, optimista y sincero. Sagitario necesita libertad y metas; aprende viajando, explorando y probando cosas nuevas.',
    'compatibles' => ['Aries', 'Leo', 'Libra', 'Acuario'],
    'no_compatibles' => ['Virgo', 'Piscis'],
    'imagen' => 'imagenes/sagitario.png'
  ],
  'capricornio' => [
    'nombre' => 'Capricornio',
    'elemento' => 'Tierra',
    'fechas' => '22 de diciembre – 19 de enero',
    'descripcion' => 'Ambicioso, disciplinado y constante. Capricornio construye a largo plazo; no va rápido, va seguro.',
    'compatibles' => ['Tauro', 'Virgo', 'Escorpio', 'Piscis'],
    'no_compatibles' => ['Aries', 'Libra'],
    'imagen' => 'imagenes/capricornio.png'
  ],
  'acuario' => [
    'nombre' => 'Acuario',
    'elemento' => 'Aire',
    'fechas' => '20 de enero – 18 de febrero',
    'descripcion' => 'Original, independiente y visionario. Acuario piensa diferente, ama la libertad y suele tener ideas fuera de la caja.',
    'compatibles' => ['Géminis', 'Libra', 'Aries', 'Sagitario'],
    'no_compatibles' => ['Tauro', 'Escorpio'],
    'imagen' => 'imagenes/acuario.png'
  ],
  'piscis' => [
    'nombre' => 'Piscis',
    'elemento' => 'Agua',
    'fechas' => '19 de febrero – 20 de marzo',
    'descripcion' => 'Empático, soñador y sensible. Piscis conecta con lo emocional; necesita calma y un entorno donde pueda inspirarse.',
    'compatibles' => ['Cáncer', 'Escorpio', 'Tauro', 'Capricornio'],
    'no_compatibles' => ['Géminis', 'Sagitario'],
    'imagen' => 'imagenes/piscis.png'
  ],
];

$clave = strtolower($_GET['signo'] ?? '');
if (!isset($signos[$clave])) {
  header('Location: index.php');
  exit;
}
$info = $signos[$clave];
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <title><?php echo htmlspecialchars($info['nombre']); ?> - Horóscopo</title>
</head>

<body class="tema-<?php echo htmlspecialchars($tema); ?>">
<header class="hero">
  <img class="hero__img" src="imagenes/banner.png" alt="Banner Horóscopo">
  <h1 class="hero__title">Bienvenido al Horóscopo</h1>
</header>

<main class="<?php echo htmlspecialchars($fondo); ?>">

  <section class="home-section sign-card">
    <div class="sign-header">
      <img class="sign-icon" src="<?php echo htmlspecialchars($info['imagen']); ?>" alt="<?php echo htmlspecialchars($info['nombre']); ?>">
      <h2><?php echo htmlspecialchars($info['nombre']); ?></h2>
    </div>

    <table class="sign-table">
      <tr>
        <th>Nombre</th>
        <td><?php echo htmlspecialchars($info['nombre']); ?></td>
      </tr>
      <tr>
        <th>Elemento</th>
        <td><?php echo htmlspecialchars($info['elemento']); ?></td>
      </tr>
      <tr>
        <th>Fechas</th>
        <td><?php echo htmlspecialchars($info['fechas']); ?></td>
      </tr>
      <tr>
        <th>Descripción</th>
        <td><?php echo htmlspecialchars($info['descripcion']); ?></td>
      </tr>
      <tr>
        <th>Compatibles con</th>
        <td><?php echo htmlspecialchars(implode(' · ', $info['compatibles'])); ?></td>
      </tr>
      <tr>
        <th>No compatibles con</th>
        <td><?php echo htmlspecialchars(implode(' · ', $info['no_compatibles'])); ?></td>
      </tr>
    </table>

    <a href="index.php" class="btn-secundario">Volver</a>
  </section>

</main>
</body>
</html>
