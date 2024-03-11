/**
 * Función asincrónica que realiza una solicitud GET a una API utilizando Axios.
 *
 * @param {string} campo - El campo utilizado como parámetro en la consulta.
 * @param {string} valor - El valor correspondiente al campo en la consulta.
 * @returns {Promise} - Una Promise que se resuelve con los datos de la respuesta de la API.
 * @throws {Error} - Se lanza un error en caso de problemas durante la solicitud.
 */
export const getDatos = async (campo, valor) => {
    try {
      // Construir la URL de la API con los parámetros proporcionados
      const url = `http://localhost/DWES/API/DWES-main/EntregaRecu/API/API/lecturaXml/?${campo}=${valor}`;
  
      // Realizar una solicitud GET a la API utilizando Axios
      const response = await axios.get(url);
  
      // Devolver los datos de la respuesta de la API
      return response.data;
    } catch (error) {
      // Manejar errores imprimiendo el error en la consola
      console.error(error);
    }
  };
  