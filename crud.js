$(function(){

    $('#form_tarea').submit(function(e){ 
        
        const datosFormulario = {
            nombre : $('#nombre').val(),
            telefono : $('#telefono').val(),
            tarea : $('#tarea').val(),
            problema : $('#problema').val()
        };
        
        console.log(datosFormulario);
        e.preventDefault();

        $.post('crud.php', datosFormulario, function(respuesta) {
            let erroress = JSON.parse(respuesta);
            let mostrar_errores = '';
            
            if(erroress.length > 0) {
                erroress.forEach(error => {
                    mostrar_errores +=`
                        <p>${error} </p>
                    `
                });  
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: erroress['success'],
                    showConfirmButton: false,
                    timer: 1500
                  })
                $('#form_tarea')[0].reset(); 
            }
            $('#errores_form').html(mostrar_errores);
        });
        
    });


    
});