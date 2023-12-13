// Este código asume que estás usando jQuery para simplificar el manejo de eventos.
    // Asegúrate de incluir jQuery en tu proyecto si aún no lo has hecho.

    $(document).ready(function() {
        // Cuando se hace clic en un botón de filtrado
        $('.popular-menu__filter button').on('click', function() {
            // Obtén la marca seleccionada
            var marca = $(this).data('filter');
            
            // Agrega la clase 'active' al botón seleccionado y quita 'active' de los demás
            $('.popular-menu__filter button').removeClass('active');
            $(this).addClass('active');

            // Mostrar u ocultar productos basados en la marca seleccionada
            if (marca === "") {
                // Si se selecciona "Todas", muestra todos los productos
                $('.beer-container').show();
            } else {
                // Oculta todos los productos
                $('.beer-container').hide();
                
                // Muestra solo los productos de la marca seleccionada
                $('.beer-' + marca).show();
            }
        });
    });