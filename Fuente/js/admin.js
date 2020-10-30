$(document).ready( function () {
    userTable =$("#userTable").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
        }], 
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

    // Estilo del modal en creacion del usuario 
    $("#btnNew").click( () => {
        $("#formUsers").trigger("reset");
        $(".modal-header").css("background-color", "#28A745");
        $(".modal-header").css("color", "#ffffff");
        $(".modal-title").text("Nuevo Usuario");

        $("#modalCRUD").modal("show");
        id = null;
        option = 1
    });

    var file;
    // Button_Edit 
    $(document).on("click", ".btnEditar", function(){
        file = $(this).closest("tr");
        id = parseInt(file.find('td:eq(0)'.text));
        name = file.find('td:eq(1)'.text());
        lastName = file.find('td:eq(2)'.text());
        birthday = file.find('td:eq(3)'.text());
        gender = file.find('td:eq(4)'.text());
        user = file.find('td:eq(5)'.text());
        password = file.find('td:eq(6)'.text());

        $("#name").val(name);
        $("#lastName").val(lastName);
        $("#birthday").val(birthday);
        $("#gender").val(gender);
        $("#user").val(user);
        $("#password").val(password);
        option = 2

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "#ffffff");
        $(".modal-title").text("Editar Usuario");
        $("#modalCRUD").modal("show");
    });

    // Button_Delete
    $(document).on("click", ".btnBorrar", () =>{
        file = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)'.text));
        option = 3;
        var response = confirm(`¿Está seguro de eliminar el registro: ${id}?`);
        if( response ){
            $.ajax({
                url: "../bd/crud.php",
                type: "POST",
                dataType: "json",
                data: { id:id },
                success: function(){
                    userTable.row(file.parents('tr')).remove().draw();
                }
            });
        }   
    });

    $("#formUsers").submit(function( e ){
        e.preventDefault();
        name = $.trim($("#name").val());
        lastName = $.trim($("#lastName").val());
        birthday = $.trim($("#birthday").val());
        gender = $.trim($("#gender").val());
        user = $.trim($("#user").val());
        password = $.trim($("#password").val());
        $.ajax({
            url: "../bd/crud.php",
            type: "POST",
            dataType: "json",
            data: { name:name, lastName:lastName, birthday:birthday, gender:gender, user:user, password:password, id:id, option:option },
            success: function( data ) {
                // var datos = JSON.parse( data );
                console.log( data );
                id = data[0].id;
                name = data[0].name;
                lastName = data[0].lastName;
                birthday = data[0].birthday;
                gender = data[0].gender;
                user = data[0].user;
                password = data[0].password;
                
                if ( option == 1 ) {
                    userTable.row.add([ id, name, lastName, birthday, gender, user, password]).draw();
                } else {
                    userTable.file( file ).data([ id, name, lastName, birthday, gender, user, password]).draw();
                }
            }
        });
        $("#modalCRUD").modal("hide");
    });
});