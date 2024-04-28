( function (){
    const publicarInput = document.querySelector("#publicar"); // input que se muestra para publicar
    if (publicarInput){
        const publiacion = document.querySelector("#publicacion"); // ventana modal para publicar una publicacion

        publicarInput.onclick = () => publiacion.classList.toggle("mostrar");

        const publicacionImagen = document.getElementById("publicacion__imagen");
        const publicacionTexto = document.getElementById("publicacion__texto");
        const botonPublicar = document.getElementById("publicacion__boton")

        botonPublicar.onclick = publicar;

        async function publicar(){
        const imagen = publicacionImagen.files[0];
        console.log(imagen);
        datos = new FormData();
        datos.append("mensaje", publicacionTexto.value) 
        datos.append("imagen", imagen)
        try {
            const url = "http://localhost:3000/api/publicar";
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