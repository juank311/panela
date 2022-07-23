api = 'https://62abeb2bbd0e5d29af174598.mockapi.io/Panelas';

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

        guardar = async function(panelas){
            try {
                const respuesta = await fetch(api, {
                    method: "POST", 
                    body: JSON.stringify(panelas),
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
    var tablaDatos=document.getElementById("tblDatos");
    var tBodyDatos=document.getElementById("tbdDatos");

    const todos = getAll()
    .then(data => {
        datosJson = data;
        data.forEach((element, index) => {
            var row = document.createElement("TR");
            var col1=document.createElement("TD");
            col1.innerHTML = element.id;
            var col2=document.createElement("TD");
            col2.innerHTML = element.producto;
            var col3=document.createElement("TD");
            col3.innerHTML = element.descripcion;
            var col4=document.createElement("TD");
            col4.innerHTML = element.cantidad;
            var col5=document.createElement("TD");
            col5.innerHTML = element.tipo;
            var col6=document.createElement("TD");
            col6.innerHTML = element.valor;
            var col7=document.createElement("TD");
            col7.innerHTML = `<a class="btn btn-success me-1 my1" id="modificar" href="#" onclick="">Modificar</a> <a class="btn btn-danger" id="modificar" href="#" onclick="eliminar(${element.id})">Eliminar</a>`;
            
            row.appendChild(col1);
            row.appendChild(col2);
            row.appendChild(col3);
            row.appendChild(col4);
            row.appendChild(col5);
            row.appendChild(col6);
            row.appendChild(col7);
            row.id="row-" +element.id

            tBodyDatos.appendChild(row);
        });

        });
    }

    document.getElementById("btnAgregar").addEventListener("click", (e) => {
        seccion =  document.getElementById("seccionformulario");
        seccion.classList.remove("d-none");
        e.preventDefault();
    });

    function limpiarformulario(){
        document.getElementById("producto").value="";
        document.getElementById("descripcion").value="";
        document.getElementById("tipo").value="";
        document.getElementById("valor").value="";
        document.getElementById("cantidad").value="";
    }

    document.getElementById("btnCancelar").addEventListener("click", (e) => {
        seccion = document.getElementById("seccionformulario");
        seccion.classList.add("d-none");
        limpiarformulario()
        e.preventDefault();

    });

    document.getElementById("btnGuardar").addEventListener("click", (e) => {
        panelas = {
            producto: document.getElementById("producto").value,
            descripcion: document.getElementById("descripcion").value,
            cantidad: document.getElementById("cantidad").value,
            tipo: document.getElementById("tipo").value,
            valor: document.getElementById("valor").value
        }
        guardar(panelas)
        .then(Response => {
            console.log(Response)
            return Response
        })
        .then(data => {
            console.log(data)
            alert("Producto registrado con exito")
            var tBodyDatos=document.getElementById("tbdDatos");
            var row = document.createElement("TR");
            var col1=document.createElement("TD");
            col1.innerHTML = data.id;
            var col2=document.createElement("TD");
            col2.innerHTML = data.producto;
            var col3=document.createElement("TD");
            col3.innerHTML = data.descripcion;
            var col4=document.createElement("TD");
            col4.innerHTML = data.cantidad;
            var col5=document.createElement("TD");
            col5.innerHTML = data.tipo;
            var col6=document.createElement("TD");
            col6.innerHTML = data.valor;
            var col7=document.createElement("TD");
            col7.innerHTML = `<a class="btn btn-success me-1 my-1" id="modificar" href="#" onclick="">Modificar</a> <a class="btn btn-danger" id="modificar" href="#" onclick="eliminar(${data.id})">Eliminar</a>`;

            row.appendChild(col1);
            row.appendChild(col2);
            row.appendChild(col3);
            row.appendChild(col4);
            row.appendChild(col5);
            row.appendChild(col6);
            row.appendChild(col7);
            row.id="row-"+data.id

            tBodyDatos.appendChild(row);

            limpiarformulario () 
        } )
        .catch(function(err) {
            console.log("Se presento un error en la petición");
            console.error(err);
    });
    e.preventDefault();
});