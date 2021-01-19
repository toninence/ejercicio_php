<?php
include_once('layout/header.html');
?>

<!-- $obra_a_vender tiene los datos de la obra en la que se hizo click -->
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo $obra_a_vender['imagen'] ?>" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title"><?php echo $obra_a_vender['nombre'] ?></h4>
        <h6 class="card-text">Fecha de estreno: <?php echo $obra_a_vender['fecha_obra'] ?></h6>
        <h6 class="card-text">Aforo: <?php echo $obra_a_vender['aforo'] ?></h6>
        <h6 class="card-text">Localidades disponibles: <span id="disponibles"><?php echo $obra_a_vender['disponibles'] ?></span></h6>
        <h6 class="card-text">Sala: <?php echo $obra_a_vender['sala'] ?></h6>

        <!-- Button trigger modal -->
        <div class="text-center">
            <?php if ($hay_disponibles && $fecha_valida) { ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Comprar Entrada
                </button>
            <?php } ?>

        </div>
    </div>
</div>

<!-- Modal Venta de entrada -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Comprar Entrada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cod_obra" name="cod_obra" value="<?php echo $obra_a_vender['cod_obra'] ?>">
                <p>Ingrese su nombre</p>
                <input class="form-control" id="comprador" type="text" name="comprador" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button onclick="comprarEntrada()" type="button" class="btn btn-primary">Comprar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirmacion de venta -->
<div class="modal fade" id="confirmVenta" tabindex="-1" role="dialog" aria-labelledby="confirmVenta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Venta Realizada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>La venta ha sido realizada con éxito</h6>
                <h6>su ticket es el número:
                    <span id="ticket"></span>
                </h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Error -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ha habido un error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6><span id="errorMessage"></span></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script src="public/js/ventas.js"></script>
<?php
include_once('layout/footer.html');
?>