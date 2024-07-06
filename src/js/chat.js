(function(){
    const mensajes = document.querySelector("#mensajes"); // div de mensajes
    if(mensajes){ 
        
        const botonEnviarMensaje = document.querySelector("#enviarmensaje")

        botonEnviarMensaje.addEventListener("click", () =>{
            const mensajeInput = document.querySelector("#mensaje").value
            if(mensajeInput){ // si tiene contenido el mensaje ejecuta el siguiente codigo
                
            }
        })
    }
})();