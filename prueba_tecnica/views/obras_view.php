<?php
include_once('layout/header.html');
?>
<table class="table table-striped table-centered table-hover">
    <thead class="thead-dark center">
        <tr>
            <th></th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Aforo</th>
            <th>Disponibles</th>
            <th>Sala</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($obras as $obra) {

            if ($obra['fecha_disponible']) {
                if ($obra["entradas_disponibles"]) {
                    $mensaje_boton = 'Comprar Entradas';
                    $clase_boton = 'primary';
                } else {
                    $mensaje_boton = 'No hay entradas disponibles';
                    $clase_boton = 'danger';
                }
            } else {
                $mensaje_boton = 'Fecha Caducada';
                $clase_boton = 'info';
            }
            echo "<tr>
            <td><img style='height: 50px;' src='".$obra["imagen"]."' alt='".$obra["nombre"]."'/></td>
            <td class='text-left'>" .
                $obra["nombre"] . "</td>
        <td>" . $obra["fecha_obra"] . "</td>
        <td>" . $obra["aforo"] . "</td>
        <td>" . $obra["disponibles"] . "</td>
        <td>" . $obra["sala"] . "</td>
        <td><button 
        class='btn btn-" . $clase_boton . " w-100'
        onclick=\"document.location = 'ventas.php?cod_obra=" . $obra['cod_obra'] . "'\"
        >$mensaje_boton</button></td>
        ";

            echo "</tr>";
        }

        ?>
    </tbody>
</table>

<?php
include_once('layout/footer.html');
?>