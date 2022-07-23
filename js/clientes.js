api = 'https://62b53006530b26da4cca5812.mockapi.io/clientes';

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
    
    eliminar = async function(id){
       try{
        const respuesta = await fetch(api+'/'+id,{
            method: "DELETE",
            headers: {"Content-type": "application/json; charset=UTF-8"}
       });
       const data = await respuesta.json();
        if(respuesta.status == 200) {
            console.log("Registro eliminado: " + data)
            var item = document.getElementById("row-"+id);
            item.parentNode.removeChild(item);
            alert("Registro eliminado!")
        }
    } catch (error) {
        console.log("ERROR: " +error)
    }
};

modificar = async function (id) {
    let url = this.api + '/' + id;
    const seccion = document.getElementById('seccionModificar');
    seccion.classList.remove("d-none");
    const response = await fetch(url).then(response => response.json());
    seccion.innerHTML += `
    <form action="#">
    <h2 class="text-center">ACTUALIZAR CLIENTES</h2>
        <div class="mb-3">
            <label for="nombreM" class="form-label">Nombre del cliente</label>
            <input type="text" class="form-control" id="nombreM" placeholder="ingrese el nombre" value ="${response.nombre}">
        </div>

        <div class="mb-3">
            <label for="telefonoM" class="form-label">Telefono</label>
            <input type="number" class="form-control" id="telefonoM" placeholder="example: 000-0000-000" value ="${response.telefono}">
        </div>

        
        <div class="mb-3">
            <label for="identificacionM" class="form-label">Numero de identificacion</label>
            <input type="number" class="form-control" id="identificacionM" value ="${response.identificacion}">
        </div>

        <div class="mb-3">
            <label for="correoM" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" id="correoM" placeholder="name@example.com" value ="${response.correo}">
          </div>

          <div class="mb-3">
            <label for="direccionM" class="form-label">Dirrecion</label>
            <input type="text" class="form-control" id="direccionM" value ="${response.direccion}">
          </div>


          <div class="mb-3"> 
          <input type="button" class="btn btn-primary" value="modificar" onclick="actualizardatos(${response.id})"> 
          <input type="button" class="btn btn-danger" id="btnCancelarM" value="Cancelar" onclick="location.reload()"> 
      </div> 
</form>`
};

actualizardatos = async function (id) {
    let url = this.api + '/' + id;
    console.log(id);
    const clientes = {
        nombre: document.getElementById("nombreM").value,
        telefono: document.getElementById("telefonoM").value,
        identificacion: document.getElementById("identificacionM").value,
        correo: document.getElementById("correoM").value,
        direccion: document.getElementById("direccionM").value
    };
    console.log(clientes);
    const actualizar = await fetch(url, {
        method: "PUT",
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(clientes)
    });
    document.getElementById("nombreM").value = "";
    document.getElementById("telefonoM").value = "";
    document.getElementById("identificacionM").value = "";
    document.getElementById("correoM").value = "";
    document.getElementById("direccionM").value = "";

    limpiarformulario();
    cargardatos();
    alert("Actualizado con éxito!");
    location.reload();
    return actualizar.json();
};

guardar = async function(clientes){
    try {
        const respuesta = await fetch(api, {
            method: "POST", 
            body: JSON.stringify(clientes),
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

function cargardatos() {
    var tablaDatos = document.getElementById("tblDatos");
    var tBodyDatos = document.getElementById("tbdDatos");

    const todos = getAll()
        .then(data => {
            datosJson = data;
            data.forEach((element, index) => {
                var row = document.createElement("TR");
                var col1 = document.createElement("TD");
                col1.innerHTML = element.id;
                var col2 = document.createElement("TD");
                col2.innerHTML = element.nombre;
                var col3 = document.createElement("TD");
                col3.innerHTML = element.telefono;
                var col4 = document.createElement("TD");
                col4.innerHTML = element.identificacion;
                var col5 = document.createElement("TD");
                col5.innerHTML = element.correo;
                var col6 = document.createElement("TD");
                col6.innerHTML = element.direccion;
                var col7 = document.createElement("TD");
                col7.innerHTML = `<a class="btn btn-primary me-1 my1" id="modificar" href="#" onclick="modificar(${element.id})">Modificar</a> <a class="btn btn-danger" id="eliminar" href="#" onclick="eliminar(${element.id})">Eliminar</a>`;

                row.appendChild(col1);
                row.appendChild(col2);
                row.appendChild(col3);
                row.appendChild(col4);
                row.appendChild(col5);
                row.appendChild(col6);
                row.appendChild(col7);
                row.id = "row-" + element.id

                tBodyDatos.appendChild(row);
            });

        });
}

document.getElementById("btnAgregar").addEventListener("click", (e) => {
    seccion = document.getElementById("seccionformulario");
    seccion.classList.remove("d-none");
    e.preventDefault();
});

function limpiarformulario() {
    document.getElementById("nombre").value = "";
    document.getElementById("telefono").value = "";
    document.getElementById("identificacion").value = "";
    document.getElementById("correo").value = "";
    document.getElementById("direccion").value = "";

}

document.getElementById("btnCancelar").addEventListener("click", (e) => {
    seccion = document.getElementById("seccionformulario");
    seccion.classList.add("d-none");
    limpiarformulario()
    e.preventDefault();

});

document.getElementById("btnGuardar").addEventListener("click", (e) => {
    clientes = {
        nombre: document.getElementById("nombre").value,
        telefono: document.getElementById("telefono").value,
        identificacion: document.getElementById("identificacion").value,
        correo: document.getElementById("correo").value,
        direccion: document.getElementById("direccion").value
    }
    guardar(clientes)
        .then(Response => {
            console.log(Response)
            return Response
        })
        .then(data => {
            console.log(data)
            alert("Cliente registrado con exito")
            var tBodyDatos = document.getElementById("tbdDatos");
            var row = document.createElement("TR");
            var col1 = document.createElement("TD");
            col1.innerHTML = data.id;
            var col2 = document.createElement("TD");
            col2.innerHTML = data.nombre;
            var col3 = document.createElement("TD");
            col3.innerHTML = data.telefono;
            var col4 = document.createElement("TD");
            col4.innerHTML = data.identificacion;
            var col5 = document.createElement("TD");
            col5.innerHTML = data.correo;
            var col6 = document.createElement("TD");
            col6.innerHTML = data.direccion;
            var col7 = document.createElement("TD");
            col7.innerHTML = `<a class="btn btn-primary me-1 my-1" id="modificar" href="#" onclick="">Modificar</a> <a class="btn btn-danger" id="modificar" href="#" onclick="eliminar(${data.id})">Eliminar</a>`;

            row.appendChild(col1);
            row.appendChild(col2);
            row.appendChild(col3);
            row.appendChild(col4);
            row.appendChild(col5);
            row.appendChild(col6);
            row.appendChild(col7);
            row.id = "row-" + data.id

            tBodyDatos.appendChild(row);

            limpiarformulario()
        })
        .catch(function (err) {
            console.log("Se presento un error en la petición");
            console.error(err);
        });
    e.preventDefault();
});
