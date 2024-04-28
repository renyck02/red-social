( function (){
    const publicarInput = document.querySelector("#publicar"); // input que se muestra para publicar
    if (publicarInput){
        const publiacion = document.querySelector("#publicacion"); // ventana modal para publicar una publicacion

        publicarInput.onclick = () => publiacion.classList.toggle("mostrar"); // agrega o quita la clase

        const publicacionImagen = document.getElementById("publicacion__imagen");
        const publicacionTexto = document.getElementById("publicacion__texto");
        const botonPublicar = document.getElementById("publicacion__boton")

        botonPublicar.onclick = publicar; 

        async function publicar(){
        const imagen = publicacionImagen.files[0]; // agarra el primer elemento que tenga el input de archivos, osea que toma el valor que le hayamos cargado
        console.log(imagen);
        datos = new FormData();
        datos.append("mensaje", publicacionTexto.value) 
        datos.append("imagen", imagen)
        try {
            const url = "http://localhost:3000/api/publicar"; // manda los datos a la api
            const respuesta = await fetch(url, {
                method:"POST",
                body: datos
            });
            const resultado = await respuesta.json();
            if(resultado){
                console.log(resultado);
            }
        } catch (error){

        }
    }
        }
    }
)();