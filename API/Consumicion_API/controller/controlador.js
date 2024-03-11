
import { getDatos } from "../model/modelo.js";
const campo = document.getElementById("campo");
const valor = document.getElementById("valor");
const formulario = document.getElementById("formulario");

/**
 * el metodo se encarga de pintar los datos recividos en el tbody de la tabla 
 * @param datos recive un arreglo de libros
 * @return void no devuelve nada , solo rellena los datos
 * 
 */
const rellenarTabla = (datos) => {
    const tbody = document.getElementById('libro');
    tbody.innerHTML = "";
    datos.libros.forEach((libro) => {
        const fila = document.createElement('tr');
        fila.className = 'border border-primary'
        fila.setAttribute('scope', 'row')
        for (const key in libro) {
            const celda = document.createElement('td');
            celda.className = 'border border-primary'
            celda.textContent = libro[key];
            fila.appendChild(celda);
        }
        tbody.appendChild(fila);
    });
};

/**
 * evento que hace una llamada al metodo get datos con los parametros de la busqueda
 * luego realiza el vaciado de datos a travez del metodo de rellenar datos 
 * y por ultimo vacia el campo de valor
 */
formulario.addEventListener("submit", async (event) => {
    event.preventDefault();
    const libros = await getDatos(campo.value,valor.value);
    rellenarTabla(libros);
    valor.value=''
});
