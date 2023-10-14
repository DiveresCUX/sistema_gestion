$(function(){
 
    $('#formulario').submit(function(e){
        const datosFormulario = {
            email : $('#email').val(),
            pass : $('#pass').val()
        };
        $.post('login.php', datosFormulario, function (respuesta) {
            console.log(respuesta);
            let opciones_login = JSON.parse(respuesta);
            console.log(opciones_login);
            let accion_login = opciones_login.url;
            let mostrar_error = opciones_login.error;
            if (accion_login) {
                window.location.href = accion_login;

                $('#formulario').trigger('reset');
            }else{
                let msjerr = mostrar_error[0];
                Swal.fire({
                    icon: 'error',
                    title: msjerr,
                    text: 'Ingrese nuevamente los datos',
                    timer: 2000,
                    showConfirmButton: false,
                  })
            }

        }); 
        
        e.preventDefault();
    });
});