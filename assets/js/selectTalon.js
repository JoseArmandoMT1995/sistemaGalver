var emoresa = "";

        function nuvoTalon() {
            alert("nueva funcion");

        }

        function seleccionarEmpresa(valor) {
            $("#empresaNT").val(empresas[valor].nombre);

        }

        function seleccionarUnidad(valor) {
            $("#unidadNT").val(unidadesDeMedida[valor].nombre);
        }
        function tablaBusquedaEmpresa() 
        {   
            //slect
            var opcionSelect=$('.busquedaEmpresa').val();
            console.log(opcionSelect);

            var input, filter, table, tr, td, i, txtValue;
            input = $('.cajaEmpresa')[0];
            
            console.log(input);
            filter = input.value.toUpperCase();
            console.log(filter);
            table = $('.tablaEmpresa')[0];
            console.log();
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[opcionSelect];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        function tablaBusquedaUnidadDeMedida() 
        {   
            //slect
            var opcionSelect=$('.busquedaUnidadDeMedida').val();
            console.log(opcionSelect);

            var input, filter, table, tr, td, i, txtValue;
            input = $('.cajaUnidadDeMedida')[0];
            
            console.log(input);
            filter = input.value.toUpperCase();
            console.log(filter);
            table = $('.tablaUnidadDeMEdida')[0];
            console.log();
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[opcionSelect];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
   