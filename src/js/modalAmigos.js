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
            if(busqueda.length >3 ){
                
            }
        })

        async function BusquedaUsuarios(busqueda) {
            
        }
    }
})();