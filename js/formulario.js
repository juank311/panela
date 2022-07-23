api = 'https://62b53006530b26da4cca5812.mockapi.io/formulario';

getAll = async function(){
    try {
        const respuesta = await fetch(this.api);
        if (respuesta.status == 200) {
            let json = await respuesta.json(); // (3)
                return json;
            }
    } catch (error) {
        console.log("ERROR: "+error)
    }
    };
    
guardar = async function(formulario){
    try {
        const respuesta = await fetch(api, {
            method: "POST", 
            body: JSON.stringify(formulario),
            headers: {"Content-type": "application/json; charset=UTF-8"}
            
        });

        const data = await respuesta.json();
        if (respuesta.status == 201) {
            console.log("registro creado!")
            return data;
        }
    } catch (error) {
        console.log("ERROR: "+ error)

    }

};


function limpiarformulario() {
    document.getElementById("nombre").value = "";
    document.getElementById("correo").value = "";
    document.getElementById("telefono").value = "";
    document.getElementById("mensaje").value = "";

}


document.getElementById("btnGuardar").addEventListener("click", (e) => {
    formulario = {
        nombre: document.getElementById("nombre").value,
        correo: document.getElementById("correo").value,
        telefono: document.getElementById("telefono").value,
        mensaje: document.getElementById("mensaje").value
    }
    guardar(formulario)
        .then(Response => {
            console.log(Response)
            return Response
        })
        .then(data => {
            console.log(data)
            alert("Cliente registrado con exito")
            
        })
        .catch(function (err) {
            console.log("Se presento un error en la petición");
            console.error(err);
        });
    e.preventDefault();
});