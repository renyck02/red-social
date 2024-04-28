(function (){
    const lupa = document.getElementById("lupa"); // lupa para hacer las busquedas
    if (lupa){
        const modal = document.getElementById("busqueda"); // ventana modal para las busquedas
        const input = document.getElementById("busqueda__input"); // input de las busquedas
        lupa.onclick =  function (){
            modal.classList.toggle("mostrar")
        }
        input.addEventListener("input", function(){
            let busqueda = this.value;
            if(busqueda.length > 3 ){ // a partir de 3 caracteres hara la busqueda
                busquedaUsuarios(busqueda);
            }
        })

        async function busquedaUsuarios(busqueda) { // funcion que busca en base a lo puesto en el input
            const datos = new FormData();
            datos.append("busqueda", busqueda);
            try {
                const url = "http://localhost:3000/api/busquedaamigos";
                const respuesta = await fetch(url, {
                    method:"POST",
                    body:datos
                });
                const resultado = await respuesta.json();
                if(resultado){
                    mostrarResultados(resultado) // mostrar los resultados en pantalla
                }
            } catch (error){

            }
        }

        async function agregarAmigo(amigoId){
            
            const datos = new FormData();
            datos.append("amigoId",amigoId);
            
            try {
                const url = "http://localhost:3000/api/agregaamigo"; // esta api agrega al usuario cambiando la relacion de amistad a 1 (amigos)
                const respuesta = await fetch(url, {
                    method: "POST",
                    body: datos
                });
                const resultado = await respuesta.json();
                if(resultado){
                    estadoBoton(resultado)
                    
                }
            } catch (error){

            }
        }

        async function relacion(amigoId){ // api para buscar alguna relacion entre el resultado y el usuarios, si ya son amigos, o si tiene su solicitud pendente
            
            const datos = new FormData();
            datos.append("amigoId",amigoId);
            
            try {
                const url = "http://localhost:3000/api/estadorelacion";
                const respuesta = await fetch(url, {
                    method: "POST",
                    body: datos
                });
                const resultado = await respuesta.json();
                if(resultado){
                    console.log(resultado);
                    estadoBoton(resultado);
                    
                }
            } catch (error){

            }
        }



        function estadoBoton(relacion){ // dependiendo de si son amigos o no cambiara el boton de agregar para que en caso de que sean amigos no se puedan agregar o no se puedan enviar multiples solicitudos de amistad
            
            const {usuarioAmigoId,usuarioId, estado} = relacion
            let botonAgregar = document.querySelector(`[data-id="${usuarioAmigoId}"]`); // busca el boton por el id del amigo
            if(!botonAgregar){
                botonAgregar = document.querySelector(`[data-id="${usuarioId}"]`); // en caso de que quien haya enviado la solicitud fue el usuario logeado, lo busca con el id del usuario
            }

            if(estado==0){
                botonAgregar.textContent = "Pendiente"
                botonAgregar.disabled = true;
            }
            if(estado==1){
                botonAgregar.textContent = "Agregado"
                botonAgregar.disabled = true;
            }
        }

        function mostrarResultados(busqueda){
            const resultados = document.getElementById("busqueda__resultados");
            resultados.innerHTML = ""
            busqueda.forEach(e => {
                const usuario = document.createElement("DIV");
                usuario.classList.add("busqueda-resultado")

                const imagen = document.createElement("DIV");
                imagen.classList.add("busqueda-resultado__imagen");
                usuario.appendChild(imagen);

                const nickname = document.createElement("P")
                nickname.classList.add("busqueda-resultado__nickname");
                nickname.textContent = e.nickname;
                usuario.appendChild(nickname);

                const botonAgregar = document.createElement("BUTTON");
                botonAgregar.classList.add("busqueda-resultado__agregar");
                botonAgregar.textContent = "Agregar";
                botonAgregar.dataset.id = e.id;
                relacion(e.id); // como debemos de saber si son amigos o no o incluso se ya se han enviado solicitud, ocupamos buscar su relacion
                botonAgregar.addEventListener("click", ()=> {
                    agregarAmigo(e.id)
                });
                usuario.appendChild(botonAgregar);

                resultados.appendChild(usuario)
            });
        }
    }
})();