(function(){
    const mensajes = document.querySelector("#mensajes"); // div de mensajes
    if(mensajes){ 
        
        const botonEnviarMensaje = document.querySelector("#enviarmensaje")

        botonEnviarMensaje.addEventListener("click", async () =>{
            const mensajeInput = document.querySelector("#mensaje").value
            if(mensajeInput){ // si tiene contenido el mensaje ejecuta el siguiente codigo
                const url = new URL(window.location);
                if(url.href.includes("chats")) {
                    
                    // checar en la tabla de miembros_grupos uno donde esten los dos
                    const datos = new FormData();
                    const idAmigo = url.searchParams.get('idamigo');
                    datos.append("idAmigo", idAmigo);
                    try {
                        const url = "http://localhost:3000/api/busquedadegrupo";
                        const respuesta = await fetch(url, {
                            method:"POST",
                            body:datos
                        });
                        const resultado = await respuesta.json();
                        if(resultado){ // si si hay resultados significa que el gupo ya esta creado
                            console.log(resultado) // mostrar los resultados en pantalla
                            console.log("hay resultados")
                            mandarMensaje(resultado);
                        }else {
                            // no hay resultados, osea no hay un grupo de ellos, crearemos uno
                            try {
                                console.log("intentando crear el chat")
                                const url = "http://localhost:3000/api/crearchat";
                                const respuesta = await fetch(url, {
                                    method:"POST",
                                    body:datos
                                });
                                const resultado = await respuesta.json();
                                if(resultado){
                                    console.log(resultado)
                                }else {
                                    console.log("no se creo el chat")
                                }
                            } catch (error){
                                
                            }
                        }
                    } catch (error){
        
                    }

                    // funcion para crear un grupo de 2 personas, un chat tipico
                    async function mandarMensaje(grupoId){
                        try {
                            
                            const url = "http://localhost:3000/api/enviarmensaje";
                            const datos = new FormData();
                            datos.append("contenido", mensajeInput);
                            datos.append("grupoId", grupoId);
                            const respuesta = await fetch(url, {
                                method:"POST",
                                body:datos
                            });
                            const resultado = await respuesta.json();
                            if(resultado){
                                console.log(resultado)
                            }
                        } catch (error){
                            
                        }
                    }
                    async function obtenerMensajes(grupoId){
                        try {
                            
                            const url = "http://localhost:3000/api/obtenerMensajes";
                            const datos = new FormData();
                            datos.append("grupoId", grupoId);
                            const respuesta = await fetch(url, {
                                method:"POST",
                                body:datos
                            });
                            const resultado = await respuesta.json();
                            if(resultado){
                                console.log(resultado)
                            }
                        } catch (error){
                            
                        }
                    }
                }
                
            }
        })
    }
})();