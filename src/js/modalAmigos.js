(function (){
    const lupa = document.getElementById("lupa");
    if (lupa){
        const modal = document.getElementById("busqueda");
        const input = document.getElementById("busqueda__input");
        lupa.onclick =  function (){
            modal.classList.toggle("mostrar")
        }
        input.addEventListener("input", function(){
            let busqueda = this.value;
            if(busqueda.length > 3 ){
                busquedaUsuarios(busqueda);
            }
        })

        async function busquedaUsuarios(busqueda) {
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
                    mostrarResultados(resultado)
                }
            } catch (error){

            }
        }

        async function agregarAmigo(amigoId){
            
            const datos = new FormData();
            datos.append("amigoId",amigoId);
            
            try {
                const url = "http://localhost:3000/api/agregaamigo";
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

        async function relacion(amigoId){
            
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



        function estadoBoton(relacion){
            const {usuarioAmigoId, estado} = relacion
            const botonAgregar = document.querySelector(`[data-id="${usuarioAmigoId}"]`);

            if(estado==0){
                botonAgregar.textContent = "Enviado"
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
                relacion(e.id);
                botonAgregar.addEventListener("click", ()=> {
                    agregarAmigo(e.id)
                    
                });
                usuario.appendChild(botonAgregar);

                resultados.appendChild(usuario)
            });
        }
    }
})();