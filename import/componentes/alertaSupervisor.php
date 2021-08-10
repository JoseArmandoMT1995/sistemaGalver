<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">
        Alertas
    </h6>
    <div class="alertas_supervisor">
    <!--todo-->
    </div>
    <a class="dropdown-item text-center small text-gray-500" href="./ALERTAS_SUPERVISOR.php">Ver todas las
        alertas</a>
</div>
<script>
    imprimirAlertas();
    function imprimirAlertas() {
        $.ajax({
            type: "POST",
            url: "../import/componentes/alertasSupervisorBack.php",
            success: function (res) {
                $(".alertas_supervisor").html(res);
            }
        });
    }
</script>