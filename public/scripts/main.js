document.addEventListener('DOMContentLoaded', function() {
    // Eventos a cada botón de cerrar mensaje popup de confirmacion
    var closeButtons = document.querySelectorAll('.close-button');
    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var alertDiv = this.closest('.alert');
            if (alertDiv) {
                alertDiv.style.display = 'none';
            }
        });
    });

    // Evento de cierre automático después de 10 segundos
    var alertDivs = document.querySelectorAll('.alert');
    alertDivs.forEach(function(alertDiv) {
        setTimeout(function() {
            alertDiv.style.display = 'none';
        }, 10000); // 10000 milisegundos (10 segundos)
    });

    // Evento al presionar "eliminar" de cada empleado
    
    var eliminarButton = document.querySelectorAll('.button-link');
    eliminarButton.forEach(function(button){
        button.addEventListener('click', function(e){
            let empId = e.target.getAttribute('data-id');
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    'Deleted!',
                    'The employee has been deleted.',
                    'success'
                  );
                  document.getElementById('form-invisible-' + empId).submit();
                }
              });            
        });
    });
        
});