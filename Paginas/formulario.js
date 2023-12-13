document.addEventListener("DOMContentLoaded", function () {
    const inputTelefono = document.getElementById('telefono');
    const inputPassword1 = document.getElementById('contrasena');
    const inputPassword2 = document.getElementById('rcontrasena');
    const form = document.getElementById('register');



    const validarTelefono = () => {
        // Eliminar cualquier caracter que no sea un número del campo de teléfono
        inputTelefono.value = inputTelefono.value.replace(/\D/g, '');
    };
    
    const validarPassword2 = () => {
        if (inputPassword1.value !== inputPassword2.value) {
            // Contraseñas diferentes
            console.log("Las contraseñas no coinciden");
            // Puedes realizar otras acciones, como mostrar un mensaje de error
            document.getElementById('msgUserExist').textContent = "Las contraseñas no coinciden";
        } else {
            // Contraseñas iguales
            console.log("Las contraseñas coinciden");
            // Puedes realizar otras acciones, como limpiar el mensaje de error
            document.getElementById('msgUserExist').textContent = "";
        }
    };

    // Event listeners para los campos de teléfono y contraseña
    inputTelefono.addEventListener('input', validarTelefono);
    inputPassword1.addEventListener('keyup', validarPassword2);
    inputPassword2.addEventListener('keyup', validarPassword2);
    inputPassword1.addEventListener('blur', validarPassword2);
    inputPassword2.addEventListener('blur', validarPassword2);

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (inputPassword1.value !== inputPassword2.value) {
            // Contraseñas diferentes, evita que se envíe el formulario
            console.log("Las contraseñas no coinciden");
            document.getElementById('msgUserExist').textContent = "Las contraseñas no coinciden";
        } else {
            // Contraseñas iguales, puedes enviar el formulario
            console.log("Las contraseñas coinciden");
            document.getElementById('msgUserExist').textContent = "";

            // Aquí puedes agregar código para enviar el formulario utilizando AJAX u otra lógica necesaria
            form.submit();
        }
    });
});
