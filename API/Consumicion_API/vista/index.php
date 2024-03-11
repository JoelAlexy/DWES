<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con Bootstrap</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form id="formulario" class="d-flex justify-content-evenly justify-items-center align-self-center mb-4 mt-4">
            <div class="mb-3 d-flex align-self-center">
                <label class="form-label ">Selecciona un campo por el cual filtrar</label>
                <select id="campo" class="form-select form-select-lg mb-3">
                    <option value=""></option>
                    <option value="id">ID</option>
                    <option value="autor">AUTOR</option>
                    <option value="genero">GENERO</option>
                    <option value="pagina">PAGINA</option>
                </select>
            </div>
            <div class="mb-3 d-flex   align-self-center">
                <label for="valor" class="form-label">Valor</label>
                <input type="text" class="form-control" name="valor" id="valor">
            </div>
            <button class="btn btn-secondary" id="buscar" type="submit">Buscar</button>

        </form>
        <div id="conetenedorTabla d-flex felx-row justify-content-center align-items-center" >
            <!-- Agrega la clase table de Bootstrap y estilos de borde -->
            <table class="table-success border border-primary">
                <thead class="table-success border border-primary">
                    <tr>
                        <th scope="col" class="border border-primary" >ID</th>
                        <th scope="col" class="border border-primary">AUTOR</th>
                        <th scope="col" class="border border-primary">TITULO</th>
                        <th scope="col" class="border border-primary">GENERO</th>
                        <th scope="col" class="border border-primary">PRECIO</th>
                        <th scope="col" class="border border-primary">AÑO DE PUBLICACIÓN</th>
                        <th scope="col" class="border border-primary">DESCRIPCIÓN</th>
                    </tr>
                </thead>
                <tbody id="libro" class="table-group-divider border border-primary">

                </tbody>
            </table>
        </div>
    </div>

    <!-- Agrega el script de Bootstrap -->
    <script src="../controller/controlador.js" type="module"></script>
</body>

</html>