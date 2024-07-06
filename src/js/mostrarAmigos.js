( function (){
    const divAmigos = document.querySelector(".amigos")
    
    if(divAmigos){
        
        document.addEventListener("DOMContentLoaded", () => {
           buscarAmigos();
        })
            async function buscarAmigos(){
        try {
            const url = "http://localhost:3000/api/busquedaAmigos"; // busca por los amigos a traves de la api
            const respuesta = await fetch(url, {
                method:"POST"
            });
            const resultado = await respuesta.json();
            if(resultado){
                console.log(resultado);
                const resultados = resultado[0] // agarra los resultados de la consulta ya que en la api nos trae un arreglo de dos resultados, los dela base de datos y el id del usuario que inicio sesion
                const idSesion = resultado[1] // toma el id del usuario que inicio sesion
                const filtrado = resultados.map(e => { // filtra para poner el id del amigo en el campo de usuarioAmigoId en caso de que no este ahi
                    if (!(e.usuarioId == idSesion)){
                        e.usuarioAmigoId = e.usuarioId 
                    }
                    return e;
                })
                mostrarAmigos(filtrado); // con los datos filtrados llama a la funcion para mostrar los datos en el html           
            }
        } catch (error){

        }
    }
    async function busquedaNombre(id){ // api para buscar el nombre de un usuario
        const datos = new FormData();
        datos.append("id",id)
        try {
            const url = "http://localhost:3000/api/busquedaNombreUsuario"; // busca por el nombre del amigo por medio de su id
            const respuesta = await fetch(url, {
                method:"POST",
                body: datos
            });
            const resultado = await respuesta.json();
            if(resultado){
                const nickname = document.querySelector(`[data-id="${id}"]`);
                nickname.textContent = resultado.nickname;
            }
        } catch (error){

        }
    }

    function mostrarAmigos(amigos){ // funcion para mostrar a los amigos
        if(!amigos){
            return;
        }
        amigos.forEach(e => {
            const div = document.createElement("DIV")
            div.classList.add("amigo")
            div.onclick = ()=>{
                const url = new URL(window.location);
                url.searchParams.set("idamigo", e.usuarioAmigoId);
                window.history.pushState({}, '', url);
                // 
                if(!url.href.includes("chats")){
                    window.location.href = `http://localhost:3000/dashboard/chats?idamigo=${e.usuarioAmigoId}`;
                }
            }
            div.dataset.idAmigo = e.usuarioAmigoId

            const divImagen = document.createElement("DIV")
            divImagen.classList.add("amigo__imagen")

            const nickname = document.createElement("P");
            nickname.classList.add("amigo__nombre");
            nickname.dataset.id = e.usuarioAmigoId;

            div.appendChild(divImagen);
            div.appendChild(nickname);

            divAmigos.appendChild(div)

            busquedaNombre(e.usuarioAmigoId); // busca el nombre del amigo para mostrarlo
        });
    }
    }

})();