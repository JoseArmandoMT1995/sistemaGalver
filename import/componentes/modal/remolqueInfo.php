<div class="modal fade" id="informacionAlerta" tabindex="-1" role="dialog" aria-labelledby="informacionAlertaTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="informacionAlertaTitle">INORMACION DEL REMOLQUE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body info_visita">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
</div>
<script>
    function verInfoId(id)
    {
        $.ajax(
        {
            type: "POST",
            url: "./prueba1Consulta.php",
            data: 
            {
                "caso":2,
                "id": id
            },
            success: function (res) {
                $(".info_visita").html(res);
                $('#informacionAlerta').modal('show');
            }
        });
    }
</script>