$('#talonesCargaProporcion').on('change', function () {
    $res=validateDecimal($('#talonesCargaProporcion').val());
    if ($res=== true) {
        $('#resultadoCarga').val(Number($('#talonesCargaCantidad').val())*Number($('#talonesCargaProporcion').val()));
    }else{
        $('#talonesCargaProporcion').val(0)
    }
});
$('#talonesCargaCantidad').on('change', function () {
    $res=validateDecimal($('#talonesCargaCantidad').val());
    if ($res=== true) {
        $('#resultadoCarga').val(Number($('#talonesCargaCantidad').val())*Number($('#talonesCargaProporcion').val()));
    }else{
        $('#talonesCargaCantidad').val(0);
    }
});
function validateDecimal(valor) {
    var RE = /^\d*\.?\d*$/;
    if (RE.test(valor)) {
        return true;
    } else {
        return false;
    }
}