api = 'https://62b53006530b26da4cca5812.mockapi.io/compras';

var datosJson;

getAll = async function () {
    try {
        const respuesta = await fetch(this.api);

        if (respuesta.status == 200) {
            let json = await respuesta.json();

            return json;
        }
    } catch (error) {
        console.log("ERROR: " + error)
    }
};



eliminar = async function (id) {
    try {
        const respuesta = await fetch(api + '/' + id, {
            method: "DELETE",
            headers: { "Content-type": "application/json; charset=UTF-8" }
        });
        const data = await respuesta.json();
        if (respuesta.status == 200) {
            console.log("Registro eliminado: " + data)
            var item = document.getElementById("row-" + id);
            item.parentNode.removeChild(item);
            alert("Registro eliminado!")
        }
    } catch (error) {
        console.log("ERROR: " + error)
    }
};

guardar = async function (compras) {
    try {
        const respuesta = await fetch(api, {
            method: "POST",
            body: JSON.stringify(compras),
            headers: { "Content-type": "application/json; charset=UTF-8" }
        });
        const data = await respuesta.json();
        if (respuesta.status == 201) {
            console.log("Registro creado!")
            return data;
        }
    } catch (error) {
        console.log("ERROR: " + error)
    }
};

/** Obtener todos los datos de matrículados en un
@nombre
@producto
@tipo
@codigo
@valor

*/
get = async function (nombre, producto, tipo, codigo, valor) {
    try {
        url =
            this.api + "?nombre=" + nombre + "&producto=" + producto + "&tipo=" + tipo + "&codigo=" + codigo + "$valor=" + valor;
        const respuesta = await fetch(this.api);
        //const data = await respuesta.json();
        if (respuesta.status == 200) {
            let json = await respuesta.json(); // (3)
            //console.log(json);
            return json;
        }
    } catch (error) {
        console.log("ERROR: " + error)
    }
}

document.getElementById("btnCargar").addEventListener("click", (e) => {
    const todos = getAll()
        .then(data => {
            datosJson = data;
            const divApp = document.getElementById("app");
            const element = document.createElement("div");
            element.className = 'row';

            let htmlTabla = `<table id="tablaDatos">
                         <thead>
                         <tr>
                         <th scope="col">#</th>
                         <th scope="col">Nombre</th>
                         <th scope="col">Producto</th>
                         <th scope="col">Tipo de producto</th>
                         <th scope="col">Codigo de compra</th>
                         <th scope="col">Valor total</th>
                         <th scope="col">Opciones</th>
                         </tr>
                         </thead>`;
            data.forEach((element, index) => {
                htmlTabla = htmlTabla + `<tr>
                               <td
                               scope="row">${index + 1}</td>
                               <td>${element.nombre}</td>
                               <td>${element.producto}</td>
                               <td>${element.tipo}</td>
                               <td>${element.codigo}</td>
                               <td>${element.valor}</td>
                               <td><a  class="waves-effect waves-light btn" id="myLink" href="#" onclick="verDatos('${element.nombre}','${element.producto}','${element.tipo}','${element.codigo}','${element.valor}')">Ver factura</a> <a class="btn btn-danger" id="eliminar" href="#" onclick="eliminar(${element.id})">Eliminar</a></td>
                               </tr>`;
            });
            htmlTabla = htmlTabla + ` </tbody>
                             </table>`;
            element.innerHTML = htmlTabla;
            divApp.appendChild(element);
        });
});

function verDatos(nombre, producto, tipo, codigo, valor) {
    let mensaje = '';
    const todos = get(nombre, producto, tipo, codigo, valor)
        .then(data => {
            mensaje = `
    Nombre del cliente: ${data[0].nombre} \n
    Producto adquirido: ${data[0].producto} \n
    Tipo de producto: ${data[0].tipo} \n
    Codigo de compra: ${data[0].codigo} \n
    Valor de la compra: ${data[0].valor} \n`;
            alert(mensaje)
        });
}




document.getElementById("btnAgregar").addEventListener("click", (e) => {
    seccion = document.getElementById("seccionformulario");
    seccion.classList.remove("d-none");
    e.preventDefault();
});
function limpiarFormulario() {
    document.getElementById("nombre").value = "";
    document.getElementById("producto").value = "";
    document.getElementById("tipo").value = "";
    document.getElementById("codigo").value = "";
    document.getElementById("valor").value = "";

}
document.getElementById("btnCancelar").addEventListener("click", (e) => {
    seccion = document.getElementById("seccionformulario");
    seccion.classList.add("d-none");
    limpiarFormulario()
    e.preventDefault();
});
document.getElementById("btnGuardar").addEventListener("click", (e) => {
    compras = {
        nombre: document.getElementById("nombre").value,
        producto: document.getElementById("producto").value,
        tipo: document.getElementById("tipo").value,
        codigo: document.getElementById("codigo").value,
        valor: document.getElementById("valor").value

    }
    guardar(compras)
        .then(response => {
            console.log(response)
            return response
        })
        .then(data => {
            console.log(data)
            alert("Registro creado con éxito")
           
        })
        .catch(function (err) {
            console.log("Se presento un error en la petición");
            console.error(err);
        });
    e.preventDefault();
});
