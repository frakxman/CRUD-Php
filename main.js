$('#formLogin').submit(function(e) {
    e.preventDefault();
    var user = $.trim($("#user").val());
    var password = $.trim($("#password").val());

    if ( user.length == "" || password.length == "" ) {
        Swal.fire({
            type: 'warning',
            title: 'Debe ingresar un usuario y/o contraseña correcta'
        });
        return false;
    } else {
        $.ajax({
            url: "./fuente/bd/login.php",
            type: "POST",
            datatype: "json",
            data: { user: user, password: password },
            success: function( data ) {
                if ( data == "null" ) {
                    Swal.fire({
                        type: 'error',
                        title: 'Usuario y/o contraseña incorrectos'
                    });
                } else {
                    window.location.href = './fuente/php/user.php'
                    // Swal.fire({
                    //     type: 'success',
                    //     title: 'Conexion Exitosa',
                    //     confirmButtonColor: '#3085d6',
                    //     confirmButtonText: 'Ingresar'
                    // }).then((result) => {
                    //     if ( result.value ) {
                            
                    //     }
                    // })
                }
            }
        });
    }
});