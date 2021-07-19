<?php 
    include_once('./src/partials/_header.php');
?>
    <h1 class="mt-3 text-center">personas</h1>
    <div class="row mt-3">
        <div class="col-lg-3 col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="reg-pdo">
                        <div class="form-group">
                            <p>PERSONAS</p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="cedula" placeholder="Cedula" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombrePedidos" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="direccionPedidos" placeholder="Dirección" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="telefonoPedidos" placeholder="Telefono" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="barriados">
                                <option value="1">Barrio--</option>
                            </select>   
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Registrar persona</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">N° cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Barrio</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="personas">
                        
                    </tbody>
                </table>
        </div>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar persona</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" id="edit-per">
                        <div class="form-group">
                            <input type="text" class="form-control" id="cedulaE" placeholder="Cedula" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombrePedidosE" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="direccionPedidosE" placeholder="Dirección" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="telefonoPedidosE" placeholder="Telefono" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="barriadosE">
                                <option value="1">Barrio--</option>
                            </select>   
                        </div>
                        <input type="hidden" id="idnes" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrador">Close</button>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                        
                    </form>
                </div>
                
                </div>
            </div>
        </div>
    </div>
    <?php  require_once('./src/partials/_srcs.php');?>

<script>
    function listado(){
        $('#personas').empty();
        $.ajax({
            type: "get",
            url: "src/php/selectPersonas.php",
            success: function (response) {
                var s = JSON.parse(response);
                if(s.length == 0){
                    $('#personas').html(`<tr >
                        <th colspan="6" class="text-center">No se encuentra ninguna persona registrada</th>
                    </tr>`);
                }else{
                    var temp = '';
                    for(let i = 0; i < s.length; i++){
                        temp +=`
                        <tr>
                            <th scope="col">${s[i]['cedula']}</th>
                            <th scope="col">${s[i]['nombre']}</th>
                            <th scope="col">${s[i]['telefono']}</th>
                            <th scope="col">${s[i]['direccion']}</th>
                            <th scope="col">${s[i]['barrio']}</th>
                            <th scope="col"><button type="button" class="btn btn-info" idPer="${s[i]['id']}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="edit">EDITAR</button><button class="btn btn-danger ml-1" idPer="${s[i]['id']}" id="cancel">CANCELAR</button></th>
                        </tr>
                        
                        `;
                    }
                    $('#personas').html(temp);
                }
            }
        });

        $('#barriados').empty();
        $.ajax({
            type: "get",
            url: "src/php/selectBarrio.php",
            success: function (response) {
                var f = JSON.parse(response);
                for(let i = 0; i < f.length; i++){
                    $('#barriados').append(`<option value="${f[i]['id']}">${f[i]['barrio']}</option>`);
                }
            }
        });
    }

    $(document).ready(function () {
        listado();

        $(document).on('click', '#edit', function (e) {
            e.preventDefault();
            var p = elemento(e);
            var id = $(p).attr('idPer');
            $.ajax({
                type: "POST",
                url: "src/php/selectPersonasID.php",
                data: {id},
                success: function (res) {
                    res = JSON.parse(res)
                    $('#barriadosE').empty();
                    $.ajax({
                        type: "get",
                        url: "src/php/selectBarrio.php",
                        success: function (response) {
                            var f = JSON.parse(response);
                            for(let i = 0; i < f.length; i++){
                                if(f[i]['id'] == res['barrio']){
                                    $('#barriadosE').append(`<option value="${f[i]['id']}" selected>${f[i]['barrio']}</option>`);
                                }else{
                                    $('#barriadosE').append(`<option value="${f[i]['id']}">${f[i]['barrio']}</option>`);
                                }
                                
                            }
                        }
                    });
                    $('#cedulaE').val(res['cedula']);
                    $('#nombrePedidosE').val(res['nombre']);
                    $('#direccionPedidosE').val(res['direccion']);
                    $('#telefonoPedidosE').val(res['telefono']);
                    $('#idnes').val(res['id']);
                }
            });
        });

        $(document).on('submit', '#edit-per', function (e) {
            e.preventDefault();
            var p = elemento(e);
            var cedula = $('#cedulaE').val();
            var nombre = $('#nombrePedidosE').val();
            var direccion = $('#direccionPedidosE').val();
            var telefono = $('#telefonoPedidosE').val();
            var id = $('#idnes').val();
            var barrio = $('#barriadosE').val();
            $.ajax({
                type: "POST",
                url: "src/php/updatePersona.php",
                data: {cedula, nombre, direccion, telefono, id, barrio},
                success: function (res) {
                    listado();
                    $('#cerrador').click();
                }
            });
        });

        $(document).on('submit', '#reg-pdo', function (e) {
            e.preventDefault();
            var p = elemento(e);
            var cedula = $('#cedula').val();
            var nombre = $('#nombrePedidos').val();
            var direccion = $('#direccionPedidos').val();
            var telefono = $('#telefonoPedidos').val();
            var barrio = $('#barriados').val();
            $.ajax({
                type: "POST",
                url: "src/php/insertarPersona.php",
                data: {cedula, nombre, direccion, telefono, barrio},
                success: function (res) {
                    $('#cedula').val('');
                    $('#nombrePedidos').val('');
                    $('#direccionPedidos').val('');
                    $('#telefonoPedidos').val('');
                    listado();
                }
            });
        });
        
        $(document).on('click', '#cancel', function (e) {
            e.preventDefault();
            var p = elemento(e);
            var id = $(p).attr('idPer');
            console.log(id)
            $.ajax({
                type: "POST",
                url: "src/php/deletePersona.php",
                data: {id},
                success: function (response) {
                    listado();
                }
            });
        });
    });
    function elemento(e){
            if (e.srcElement)
                tag = e.srcElement;
            else if (e.target)
                tag = e.target;
            
            return tag;
        }
</script>

<?php  require_once('./src/partials/_footer.php');?>