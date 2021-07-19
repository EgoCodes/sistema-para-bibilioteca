<?php 
    include_once('./src/partials/_header.php');
?>
    <h1 class="mt-4 text-center">PRESTAMOS</h1>
    <div class="row mt-3">
        <div class="col-lg-3 col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="reg-pdo">
                        <div class="form-group">
                            <p>REGISTRAR PRESTAMO</p>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="personitas">
                            </select>   
                        </div>
                        <div class="form-group" >
                            <select class="form-control" id="libritos">
                            </select>
                        </div>
                        <div class="form-group" >
                            <select class="form-control" id="cant-pdts">
                                <option value="1">1 día</option>
                                <option value="2">2 días</option>
                                <option value="3">3 días</option>
                                <option value="4">4 días</option>
                                <option value="5">5 días</option>
                                <option value="6">6 días</option>
                                <option value="7">7 días</option>
                                <option value="8">8 días</option>
                                <option value="9">9 días</option>
                                <option value="10">10 días</option>
                                <option value="11">11 días</option>
                                <option value="12">12 días</option>
                                <option value="13">13 días</option>
                                <option value="14">14 días</option>
                                <option value="15">15 días</option>
                                <option value="16">16días</option>
                                <option value="17">17 días</option>
                                <option value="18">18 días</option>
                                <option value="19">19 días</option>
                                <option value="20">20 días</option>
                                <option value="21">21 días</option>
                                <option value="22">22 días</option>
                                <option value="23">23 días</option>
                                <option value="24">24 días</option>
                                <option value="25">25 días</option>
                                <option value="26">26 días</option>
                                <option value="27">27 días</option>
                                <option value="28">28 días</option>
                                <option value="29">29 días</option>
                                <option value="30">30 días</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Registrar nuevo pedido</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Persona</th>
                        <th scope="col">Libro</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Tiempo entrega</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="prestamos">
                    
                </tbody>
                <input type="hidden" value="" id="con">
            </table>
            
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar prestamo</h5>
        </div>
        <div class="modal-body">
            <form method="POST" id="editarForm">
                <div class="form-group" >
                    <input type="hidden" id="idnes" value="">
                    <select class="form-control" id="estadoE">
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrar">Close</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
                
            </form>
        </div>
        
        </div>
    </div>
    </div>
    <?php  require_once('./src/partials/_srcs.php');?>

<script>
    function listarPrestamos(){
        $('#prestamos').empty();
        $.ajax({
            type: "GET",
            url: "src/php/selectEntregas.php",
            success: function (response) {
                var s = JSON.parse(response);
                if(s.length == 0){
                    $('#prestamos').html(`<tr >
                    <th colspan="8" class="text-center">No se encuentra ningun prestamo registrado</th>
                    </tr>`);
                }else{
                    $('#con').attr('value', s.length);
                    var temp = '';
                    for(let i = 0; i < s.length; i++){
                        temp +=`
                        <tr>
                            <th scope="col">${s[i]['cedula']}</th>
                            <th scope="col">${s[i]['nombre']}</th>
                            <th scope="col">${s[i]['libro']}</th>
                            <th scope="col">${s[i]['cant']}</th>
                            <th scope="col">${s[i]['estado']}</th>
                            <th scope="col" >${s[i]['fin']}</th>
                            <th scope="col"><button type="button" class="btn btn-info ml-1 pl-2 pr-2" idP="${s[i]['id']}" id="editar" data-bs-toggle="modal" data-bs-target="#staticBackdrop">EDITAR</button><button class="btn btn-danger ml-1 pl-2 pr-2" idP="${s[i]['id']}" id="cancelar">CANCELAR</button></th>
                        </tr>
                        
                        `;
                    }
                    $('#prestamos').html(temp);
                }
            }
        });
        $('#personitas').empty();
        $.ajax({
            type: "get",
            url: "src/php/selectPersona.php",
            success: function (response) {
                var f = JSON.parse(response);
                for(let i = 0; i < f.length; i++){
                    $('#personitas').append(`<option value="${f[i]['id']}">${f[i]['nombre']}</option>`);
                }
            }
        });
        $('#libritos').empty();
        $.ajax({
            type: "get",
            url: "src/php/selectLibro.php",
            success: function (response) {
                var f = JSON.parse(response);
                for(let i = 0; i < f.length; i++){
                    $('#libritos').append(`<option value="${f[i]['id']}">${f[i]['nombre']}</option>`);
                }
            }
        });
    }


    $(document).ready(function () {
        
        listarPrestamos();

        $(document).on('submit', '#reg-pdo', function (e) {
            e.preventDefault();
            let persona = $('#personitas').val();
            let libro = $('#libritos').val();
            let fecha = $('#cant-pdts').val();
            $.ajax({
                type: "POST",
                url: "src/php/insertarPrestamo.php",
                data: {persona, libro,  fecha},
                success: function (response) {
                    listarPrestamos();
                }
            });
        });

        $(document).on('click', '#editar', function (e) {
            e.preventDefault();
            let p = elemento(e);
            let id = $(p).attr('idP');
            $('#idnes').val(id);
            $.ajax({
                type: "post",
                url: "src/php/selectPrestamoID.php",
                data: {id},
                success: function (rs) {
                    rs = JSON.parse(rs)
                    $.ajax({
                        type: "get",
                        url: "src/php/selectEstado.php",
                        success: function (res) {
                            let s = JSON.parse(res)
                            var t = '';
                            for(let i = 0; i < s.length; i++){
                                if(s[i]['id'] == rs['std']){
                                    t +=`
                                    <option value="${s[i]['id']}" selected>${s[i]['estado']}</option>
                                    `;    
                                }else{
                                    t +=`
                                    <option value="${s[i]['id']}">${s[i]['estado']}</option>
                                    `;
                                }
                            }
                            $('#estadoE').html(t);
                        }
                    });
                }
            });
        });

        $(document).on('submit', '#editarForm', function (e) {
            e.preventDefault();
            let estado = $('#estadoE').val();
            let id = $('#idnes').val();
            console.log(id, estado)
            $.ajax({
                type: "POST",
                url: "src/php/updatePrestamo.php",
                data: {estado, id},
                success: function (response) {
                    listarPrestamos();
                    $('#cerrar').click();

                }
            });
        });

        $(document).on('click', '#cancelar', function (e) {
            e.preventDefault();
            let p = elemento(e);
            let id = $(p).attr('idP');
            $.ajax({
                type: "POST",
                url: "src/php/deletePrestamo.php",
                data: {id},
                success: function (response) {
                    listarPrestamos();
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