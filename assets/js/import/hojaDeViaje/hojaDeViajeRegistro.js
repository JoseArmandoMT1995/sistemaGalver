var addViaje = false;
var remolques =1;
arranqueFormulario();
            $(".agregarRemolque2").click(function () 
            {
                agregarRemolque2();
            });
            function agregarRemolque2()
            {
                $('#viaje2').show();
                $('.agregarRemolque2').hide();
                $('.eliminarRemolque2').show();
                $("#hojaDeViajeOrigen2").val("");
                $("#remolquePlaca2").val("");
                $("#hojaDeViajeTalon2A").val("");
                $("#hojaDeViajeTalon2B").val("");
                addViaje = true;
                remolques =2;
            }
            function eliminarRemolque2()
            {
                arranqueFormulario();
                addViaje = false;
                remolques =1;
                $("input:checkbox[name=empresaEmisoraId1]:checked").prop("checked", false);
                $("input:checkbox[name=empresaReceptoraId1]:checked").prop("checked", false);
                $("input:checkbox[name=hojaDeViajeOrigen1]:checked").prop("checked", false);
                $("input:checkbox[name=remolqueCargaId1]:checked").prop("checked", false);
                $("input:checkbox[name=hojaDeViajeRemolqueEconomico1]:checked").prop("checked", false);
                $("input:checkbox[name=hojaDeViajeTalon1A]:checked").prop("checked", false);
                $("input:checkbox[name=hojaDeViajeTalon1B]:checked").prop("checked", false);
                $("input:checkbox[name=cantidad_carga]:checked").prop("checked", false);
                $("input:checkbox[name=unidad_proporcion]:checked").prop("checked", false);
            }
            $(".eliminarRemolque2").click(function () 
            {
                eliminarRemolque2();
            });
            $(".res1").click(function () 
            {
                var cantidad = Number($("#hojaDeViajeCargaCantidad1").val());
                var proporcion = Number($("#hojaDeViajeUnidadDeMedidaProporcional1").val());
                $("#res1").val(cantidad * proporcion);
            });
            $(".res2").click(function () {res2()});
            function res2()
            {
                var cantidad = Number($("#hojaDeViajeCargaCantidad2").val());
                var proporcion = Number($("#hojaDeViajeUnidadDeMedidaProporcional2").val());
                $("#res2").val(cantidad * proporcion);
            }
            function arranqueFormulario() 
            {
                $("#empresaEmisoraId2").val("0");
                $("#empresaReceptoraId2").val("0");
                $("#hojaDeViajeOrigen2").val("null");
                $("#remolqueCargaId2").val("0");
                $("#hojaDeViajeRemolqueEconomico2").val("0");
                $("#remolquePlaca2").val("null");
                $("#hojaDeViajeTalon2A").val("null");
                $("#hojaDeViajeTalon2B").val("null");
                $("#cargaId2").val("0");
                $("#hojaDeViajeCargaCantidad2").val(0);
                $("#cargaUnidadDeMedidaID2").val("0");
                $("#hojaDeViajeUnidadDeMedidaProporcional2").val(0);
                $('#viaje2').hide();
                $('.agregarRemolque2').show();
                $('.eliminarRemolque2').hide();
            }
            $(".agregarHojaDeViaje").click(
                function () 
                {
                    obtenerEInsertar();
                }
            );
            function obtenerEInsertar() 
            {
                if (
                    $("#id_operador").val() === "0" || $("#id_tractor").val() === "0" ||
                    $("#empresaEmisoraId1").val() === "0" || $("#empresaReceptoraId1").val() === "0" ||
                    $("#remolqueCargaId1").val() === "0" || $("#hojaDeViajeRemolqueEconomico1").val() === "0" ||
                    $("#cargaId1").val() === "0" || $("#cargaUnidadDeMedidaID1").val() === "0"
                ) 
                {
                    alert("faltan campos");
                } 
                else 
                {
                    alert("inicio de insercion");
                    var viajes;
                    var viaje_1 = 
                    {          
                        "id_viaje": "pendiente",
                        "id_hojaDeViaje": "pendiente",
                        "id_viajeEstado": 1,
                        "id_empresaEmisora": $("#empresaEmisoraId1").val(),
                        "id_empresaReceptora": $("#empresaReceptoraId1").val(),
                        "id_carga": $("#cargaId1").val(),
                        "id_unidadDeMedida": $("#cargaUnidadDeMedidaID1").val(),
                        "id_unidadDeMedida": $("#cargaUnidadDeMedidaID1").val(),
                        "viaje_fechaDeArribo": "0000:00:00 00:00:00",
                        "viaje_fechaDeCarga": "0000:00:00 00:00:00",
                        "viaje_fechaDeLlegadaDeDescarga": "0000:00:00 00:00:00",
                        "viaje_fechaDeDescarga": "0000:00:00 00:00:00",
                        "viaje_cargaCantidad": $("#hojaDeViajeCargaCantidad1").val(),
                        "viaje_cargaProporcionUM": $("#hojaDeViajeUnidadDeMedidaProporcional1").val(),
                        "viaje_origen":$("#hojaDeViajeOrigen1").val(),
                        "id_remolque": $("#hojaDeViajeRemolqueEconomico1").val(),
                        "id_remolqueServicio": $("#remolqueCargaId1").val(),
                        "viaje_talon1": $("#hojaDeViajeTalon1A").val(),
                        "viaje_talon2": $("#hojaDeViajeTalon1B").val(),
                    };
                    var viaje_2 = 
                    {
                        "id_viaje": "pendiente",
                        "id_hojaDeViaje": "pendiente",
                        "id_viajeEstado": 1,
                        "id_empresaEmisora": $("#empresaEmisoraId2").val(),
                        "id_empresaReceptora": $("#empresaReceptoraId2").val(),
                        "id_carga": $("#cargaId1").val(),
                        "id_unidadDeMedida": $("#cargaUnidadDeMedidaID2").val(),
                        "id_unidadDeMedida": $("#cargaUnidadDeMedidaID2").val(),
                        "viaje_fechaDeArribo": "0000:00:00 00:00:00",
                        "viaje_fechaDeCarga": "0000:00:00 00:00:00",
                        "viaje_fechaDeLlegadaDeDescarga": "0000:00:00 00:00:00",
                        "viaje_fechaDeDescarga": "0000:00:00 00:00:00",
                        "viaje_cargaCantidad": $("#hojaDeViajeCargaCantidad2").val(),
                        "viaje_cargaProporcionUM": $("#hojaDeViajeUnidadDeMedidaProporcional2").val(),
                        "viaje_origen":$("#hojaDeViajeOrigen2").val(),
                        "id_remolque": $("#hojaDeViajeRemolqueEconomico2").val(),
                        "id_remolqueServicio": $("#remolqueCargaId2").val(),
                        "viaje_talon1": $("#hojaDeViajeTalon2A").val(),
                        "viaje_talon2": $("#hojaDeViajeTalon2B").val(),
                    };
                    var tractor_del_operador = 
                    {
                        "id_tractor": $("#id_tractor").val(),
                        "id_operador": $("#id_operador").val(),
                        "id_hojaDeViaje": "pendiente",
                    };
                    if (addViaje === false) 
                    {
                        viajes = 
                        {
                            viaje_1,
                            viaje_2: {}
                        };
                    } 
                    else 
                    {
                        viajes = 
                        {
                            viaje_1,
                            viaje_2
                        };
                    }
                    var hoja_de_viaje = 
                    {
                        tractor_del_operador,
                        viajes,
                        "remolques":remolques,
                        "id_creador": "pendiente",
                        "id_editor": "pendiente",
                        "hojaDeViaje_fechaDeLiberacion": fechaActual(),
                        "hojaDeViaje_fechaDeEdicion": "0000:00:00 00:00:00",
                        "hojaDeViaje_observaciones": $("#hojaDeViajeComentario").val(),
                        "id_hojaDeViaje": "pendiente"
                    };
                    insertarHojaDeViaje(hoja_de_viaje);
                }
            }
            function insertarHojaDeViaje(hoja_de_viaje) 
            {
                $.ajax(
                    {
                    type: "POST",
                    url: "../controlador/modulos/hojaDeViaje/liberacion/hojaDeViajeRegistros.php",
                    data: hoja_de_viaje,
                    success: function (data) {
                        //data = JSON.parse(data);
                        switch (data) {
                            case "1":
                                Swal.fire(
                                    '1-Exito!',
                                    'se ha agregado registro a la hoja de viaje!.',
                                    'success'
                                );
                                location.href ="./HDV_Liberacion.php";
                                break;
                            default:
                                Swal.fire(
                                    'Error!',
                                    'lo sentimos , ha ocurrido un error en la insercion!.',
                                    'error'
                                );
                                break;
                        }
                    }
                });
            }
            $("#id_operador").on('change', function () 
            {
                if ($("#id_operador").val()==="0"||$("#id_operador").val()===0) 
                {
                    $("#operadorLisencia").val("");
                } 
                else
                {
                    select($("#id_operador").val(),"operadorId","operadores","operadorLisencia","#operadorLisencia");
                }
            });
            $("#id_tractor").on('change', function () 
            {
                if ($("#id_tractor").val()==="0"||$("#id_tractor").val()===0) 
                {
                    $("#tractorPlaca").val("");
                } 
                else
                {
                select($("#id_tractor").val(),"tractorId","tractor","tractorPlaca","#tractorPlaca");
                }
            });
            $("#hojaDeViajeRemolqueEconomico1").on('change', function () 
            {
                if ($("#hojaDeViajeRemolqueEconomico1").val()==="0"||$("#hojaDeViajeRemolqueEconomico1").val()===0) 
                {
                    $("#remolquePlaca1").val("");
                } 
                else
                {
                    select($("#hojaDeViajeRemolqueEconomico1").val(),"remolqueID","remolque","remolquePlaca","#remolquePlaca1");
                }
            });
            $("#hojaDeViajeRemolqueEconomico2").on('change', function () 
            {
                if ($("#hojaDeViajeRemolqueEconomico2").val()==="0"||$("#hojaDeViajeRemolqueEconomico2").val()===0) 
                {
                    $("#remolquePlaca2").val("");
                } 
                else
                {
                    select($("#hojaDeViajeRemolqueEconomico2").val(),"remolqueID","remolque","remolquePlaca","#remolquePlaca2");
                }
            });
            function select(valorSelect,campoSelect,tablaSelect,campoSeleccionado,idJquery)
            {
                $.ajax(
                    {
                    type: "POST",
                    url: "../controlador/modulos/hojaDeViaje/liberacion/selectDinamico.php",
                    data: {
                            "valor":valorSelect,
                            "campo":campoSelect,
                            "tabla":tablaSelect
                        }, //capturo array     
                    success: function (data) 
                    {
                        data= JSON.parse(data);
                        $(idJquery).val(data[0][campoSeleccionado]);
                    }
                });
            }
            function fechaActual() 
            {
                var dt = new Date();
                return (
                    `${dt.getFullYear().toString().padStart(4, '0')}:${(
                    dt.getMonth()+1).toString().padStart(2, '0')}:${
                    dt.getDate().toString().padStart(2, '0')} ${
                    dt.getHours().toString().padStart(2, '0')}:${
                    dt.getMinutes().toString().padStart(2, '0')}:${
                    dt.getSeconds().toString().padStart(2, '0')}`
                );
            }
            $(".addCheckBoxDuplicar").click(
                function () 
                {
                    var empresaEmisoraId1=($('input:checkbox[name=empresaEmisoraId1]:checked').val()==="on")?true:false; 
                    var empresaReceptoraId1=($('input:checkbox[name=empresaReceptoraId1]:checked').val()==="on")?true:false;   
                    var hojaDeViajeOrigen1=($('input:checkbox[name=hojaDeViajeOrigen1]:checked').val()==="on")?true:false; 
                    var remolqueCargaId1=($('input:checkbox[name=remolqueCargaId1]:checked').val()==="on")?true:false; 
                    var hojaDeViajeRemolqueEconomico1=($('input:checkbox[name=hojaDeViajeRemolqueEconomico1]:checked').val()==="on")?true:false; 
                    var hojaDeViajeTalon1A=($('input:checkbox[name=hojaDeViajeTalon1A]:checked').val()==="on")?true:false; 
                    var hojaDeViajeTalon1B=($('input:checkbox[name=hojaDeViajeTalon1B]:checked').val()==="on")?true:false;
                    var cantidad_carga= ($('input:checkbox[name=cantidad_carga]:checked').val()==="on")?true:false;
                    var unidad_proporcion= ($('input:checkbox[name=unidad_proporcion]:checked').val()==="on")?true:false;
                    if (empresaEmisoraId1===true || empresaReceptoraId1===true ||hojaDeViajeOrigen1===true||
                        remolqueCargaId1===true || hojaDeViajeRemolqueEconomico1===true ||hojaDeViajeTalon1A===true||
                        hojaDeViajeTalon1B===true||cantidad_carga===true||unidad_proporcion===true) {
                            agregarRemolque2();
                            empresaEmisoraId1=empresaEmisoraId1===true?$("#empresaEmisoraId2").val($("#empresaEmisoraId1").val()):0; 
                            empresaReceptoraId1=empresaReceptoraId1===true?$("#empresaReceptoraId2").val($("#empresaReceptoraId1").val()):""; 
                            hojaDeViajeOrigen1=hojaDeViajeOrigen1===true?$("#hojaDeViajeOrigen2").val($("#hojaDeViajeOrigen1").val()):""; 
                            remolqueCargaId1=remolqueCargaId1===true?$("#remolqueCargaId2").val($("#remolqueCargaId1").val()):"";                             
                            hojaDeViajeRemolqueEconomico1=hojaDeViajeRemolqueEconomico1===true?$("#hojaDeViajeRemolqueEconomico2").val($("#hojaDeViajeRemolqueEconomico1").val()):"";
                            hojaDeViajeTalon1A=hojaDeViajeTalon1A===true?$("#hojaDeViajeTalon2A").val($("#hojaDeViajeTalon1A").val()):"";  
                            hojaDeViajeTalon1B=hojaDeViajeTalon1B===true?$("#hojaDeViajeTalon2B").val($("#hojaDeViajeTalon1B").val()):""; 
                            if (cantidad_carga===true) 
                            {
                                $("#cargaId2").val($("#cargaId1").val());
                                $("#hojaDeViajeCargaCantidad2").val($("#hojaDeViajeCargaCantidad1").val());
                                res2();
                            } else {
                                $("#cargaId2").val(0);
                                $("#hojaDeViajeCargaCantidad2").val(0);
                            }
                            if (unidad_proporcion===true) 
                            {
                                $("#cargaUnidadDeMedidaID2").val($("#cargaUnidadDeMedidaID1").val());
                                $("#hojaDeViajeUnidadDeMedidaProporcional2").val($("#hojaDeViajeUnidadDeMedidaProporcional1").val());
                                res2();
                            } else {
                                $("#cargaUnidadDeMedidaID2").val(0);
                                $("#hojaDeViajeCargaCantidad2").val("");
                            }
                    } 
                    else 
                    {
                        eliminarRemolque2();
                    }
                }
            );