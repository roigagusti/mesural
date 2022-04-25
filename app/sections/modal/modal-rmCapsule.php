<div id="removeCapsule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmar borrado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="conexiones/capsule.php?action=removeCapsule&id=<?php echo $_GET['id'];?>" >
                <div class="modal-body">
                    <p>Los datos no se borrarán y la cápsula podrá ser añadida de nuevo.<br>¿Estás seguro que quieres borrar esta cápsula?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Borrar</button>
                </div>
            </form>
        </div>
    </div>
</div>