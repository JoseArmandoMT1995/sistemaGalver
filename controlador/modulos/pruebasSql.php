<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<select id="mi_select">
    <option>select something</option>
    <option value="1" >something 1</option>
    <option value="2" selected="selected" >Default option</option>
</select>
<button type="button" id="boton"></button>
<script>
    
    $("#boton").click(function(){
        $('#mi_select').val($('#mi_select > option:first').val());
    });
</script>
