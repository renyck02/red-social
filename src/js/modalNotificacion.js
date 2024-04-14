(function (){
    const campana = document.getElementById("campana");
    if (campana){
        
        const notificaciones = document.getElementById("notificaciones");
        campana.onclick =  function (){
            notificaciones.classList.toggle("mostrar")
        }
    }
})();