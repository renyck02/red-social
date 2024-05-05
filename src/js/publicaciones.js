(function (){
    const publicacionesDiv = document.getElementById("publicaciones");
    if(publicacionesDiv){// checamos si esta el div para inyectar las publicaciones
        let publicaciones = [] // arreglo de publicaciones para en caso de  de hacer una nosotros, se muestre
        document.addEventListener("DOMContentLoaded",function(){ // buscara por las publicaciones cuando carge toda la pagina
            buscarPublicacicones() // busca por publicaciones
        });
        async function buscarPublicacicones(){
            datos = new FormData();
            try {
                const url = "http://localhost:3000/api/busquedapublicaciones";
                const respuesta = await fetch(url, {
                    method:"POST",
                    body:datos
                });
                const resultado = await respuesta.json();
                if(resultado){
                    console.log(resultado);
                    mostrarResultados(resultado) // mostrar los resultados en pantalla
                }
            } catch (error){

            }
            function mostrarResultados(resultados){
                if(!resultados){
                    
                }
                resultados.forEach(e => {
                    const publicacion = document.createElement("DIV");
                    publicacion.classList.add("post");

                    const divPerfil = document.createElement("DIV");
                    divPerfil.classList.add("post__perfil");

                    const imagenPerfil = document.createElement("DIV");
                    imagenPerfil.classList.add("post__imagen-perfil");
                    divPerfil.appendChild(imagenPerfil);

                    const nickname = document.createElement("P");
                    nickname.textContent = e.nickname;
                    nickname.classList.add("post__nickname");
                    divPerfil.appendChild(nickname);
                    publicacion.appendChild(divPerfil)

                    const mensaje = document.createElement("P");
                    mensaje.textContent = e.mensaje;
                    mensaje.classList.add("post__texto");
                    publicacion.appendChild(mensaje);

                    const imagen = document.createElement("IMG");
                    imagen.setAttribute("src", "/imagenes-publicaciones/" + e.imagen );
                    imagen.classList.add("post__imagen");
                    publicacion.appendChild(imagen);



                    publicacionesDiv.appendChild(publicacion);
                });
            }
        }
    }
})();