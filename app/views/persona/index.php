<!DOCTYPE html>
<html>
<head>
    <title>Personas</title>
</head>
<body>

<h1>Lista de Personas</h1>

<h2>Agregar Persona</h2>
<form method="POST" action="/persona/guardar">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <button type="submit">Guardar</button>
</form>

<hr>

<h2>Listado</h2>

<?php if (!empty($personas)): ?>
    <?php foreach ($personas as $p): ?>
        <p>
            <?php echo $p['nombre'] . " " . $p['apellido']; ?>
        </p>
    <?php endforeach; ?>
<?php else: ?>
    <p>No hay registros</p>
<?php endif; ?>

</body>
</html>
