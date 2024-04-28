(function (){
    const campana = document.getElementById("campana");
    if (campana){
        
        const notificaciones = document.getElementById("notificaciones");
        campana.onclick =  function (){
            notificaciones.classList.toggle("mostrar")
            busquedaNotificaciones();
        }

        // buscar por solicitudes de amistad 
        async function busquedaNotificaciones() {
            try {
                const url = "http://localhost:3000/api/notificaciones";
                const respuesta = await fetch(url, {
                    method:"POST"
                });
                const resultado = await respuesta.json();
                if(resultado){
                    console.log(resultado);
                    mostrarNotificaciones(resultado);
                }
            } catch (error){

            }
        }

        

        async function agregar(id) {
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            try { 
                const url = "http://localhost:3000/api/agregar"; 
                const datos = new FormData();
                datos.append("id",id ); // id de la persona a la que queremos agregar
                const respuesta = await fetch(url, {
                    method:"POST",
                    body: datos
                });
                const resultado = await respuesta.json();
                if(resultado){
                    console.log(resultado); 
                    botonAgregar.textContent = "Agregado"
                }
            } catch (error){

            }
        }

        function mostrarNotificaciones(resultados){
            console.log(resultados)
            notificaciones.innerHTML = ""
            if (resultados.length == 0){
                const texto = document.createElement("P");
                texto.textContent = "No Tienes Solicitudes de amistad"
                texto.classList.add("notificacion__vacio")
                notificaciones.append(texto)
            }
            resultados.forEach(e  => {
                const notificacion = document.createElement("DIV");
                notificacion.classList.add("notificacion")

                const imagen = document.createElement("DIV");
                imagen.classList.add("notificacion__imagen");
                notificacion.appendChild(imagen);

                const nickname = document.createElement("P")
                nickname.classList.add("notificacion__nickname");
                nickname.textContent = e.nickname;
                nickname.dataset.usuario_id = e.usuario_id;
                
                notificacion.appendChild(nickname);

                const botonAgregar = document.createElement("BUTTON");
                botonAgregar.classList.add("notificacion__agregar");
                botonAgregar.textContent = "Agregar";
                botonAgregar.dataset.id = e.id;
                
                botonAgregar.addEventListener("click", ()=> {
                    agregar(e.id);
                });
                notificacion.appendChild(botonAgregar);
                notificaciones.appendChild(notificacion)
            });
        }
    }
})();