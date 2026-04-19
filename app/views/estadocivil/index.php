<h2>Estado Civil</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Descripcion</th>
</tr>

<?php while($row = $datos->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['descripcion']; ?></td>

</tr>

<?php } ?>

</table>