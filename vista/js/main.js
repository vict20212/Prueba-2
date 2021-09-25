$(document).ready(function () {

    cargarDatos();
    cargarRol();
    $("#btnRegistrar").click(function () {

        var nombre = $("#txtnombre").val();
        var apellido = $("#txtapellido").val();
        var email = $("#txtemail").val();
        var contraseña = $("#txtcontraseña").val();
        var rol = $("#selectRol").val();

        var objData = new FormData();

        objData.append("nombre", nombre);
        objData.append("apellido", apellido);
        objData.append("email", email);
        objData.append("contraseña", contraseña);
        objData.append("rol", rol);

        $.ajax({

            url: "control/usuarioControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                cargarDatos();
            }

        })
    })

    function cargarDatos() {
        var listarUsuarios = "ok",
        var objlistar = new FormData();
        objlistar.append("cargar", listarUsuarios);

        $.ajax({

            url: "control/usuarioControl.php",
            type: "post",
            dataType: "json",
            data: objlistar,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                var interface ='';
                respuesta.forEach(cargarTablaUsuarios);

                function cargarTablaUsuarios(item,index) {
                   interface += '<th>'; 
                   interface += '<td>'+item.nombre+ '</td>';
                   interface += '<td>'+item.apellido+ '</td>';
                   interface += '<td>'+item.email+ '</td>';
                   interface += '<td>'+item.contrasseña+ '</td>';
                   interface += '<td>'+item.descripcion+ '</td>';
                   interface += '</th>'; 

                   interface += '<div class="btn-group">';
                   interface += '<button type="button" class="btn btn-warning" title="Editar" id="btnEditar" idusuario="'+item.idusuario +'" nombre="' + item.nombre + '" apellido="'+ item.apellido +'" email="'+ item.email +'" contraseña="'+ item.contraseña +'" idRol="'+ item.idRol +'" data-toggle="modal" data-target="#modalMUsuarios"><span class="glyphicon glyphicon-pencil"></span></button>';
                   interface += '<button type="button" class="btn btn-danger" title="Eliminar" id="btnEliminar" idusuario="'+ item.idusuario +'"><span class="glyphicon glyphicon-remove"></span></button>';
                   interface += '</div>'; 

                }
             $("#cuerpoUsuarios").html(interface);
            }

        })


    }


   function cargarRol(){
    var cargarRol = "ok",
    var objcargarRol = new FormData();
    objcargarRol.append("cargarRol", cargarRol);

    $.ajax({

        url: "control/usuarioControl.php",
        type: "post",
        dataType: "json",
        data: objcargarRol,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            $("#selectRol").html("");
            respuesta.forEach(cargarSRol);
            function cargarSRol(item, index) {
                $("#selectRol").append( '<option value="'+item.idRol+'"> '+ item.descripcion+'</option>')
            }
        }

    })
   }









})




    







 
    
