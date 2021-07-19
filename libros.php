<?php 
    require_once('./src/partials/_header.php');
?>
    <div class="row mt-5">
        <div class="col-lg-4 col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="reg-editorial">
                        <div class="form-group">
                            <h2>EDITORIAL</h2>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="editorialNombre" placeholder="Nombre editorial" required>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="reg-autores">
                        <div class="form-group">
                            <h2>AUTORES</h2>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="autoresNombre" placeholder="Nombre autor" required>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="reg-lib">
                        <div class="form-group">
                            <h2>libro</h2>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="libro" placeholder="Nombre del libro" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="autorL">
                                <option value="1">autor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="editorialL">
                                <option value="1">editorial</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="edicionL">
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="cantidadL">
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Edición</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="libros">
                
            </tbody>
        </table>
    </div>

    <!-- Button trigger modal -->
    

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">EDITAR PRODUCTO</h5>
        </div>
        <div class="modal-body">
            <form method="POST" id="edit-lib">
                <div class="form-group">
                    <input type="text" class="form-control" id="libroE" placeholder="Nombre del libro" required>
                </div>
                <div class="form-group">
                    <select class="form-control" id="autorE">
                    
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="editorialE">
                    
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="edicionE">
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="cantidadE">
                        
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


    <?php  require_once('./src/partials/_srcs.php');?>

    <script>
        function listados(){
            $('#libros').empty();
            $('#autorL').empty();
            $('#editorialL').empty();
            $('#edicionL').empty();
            $('#cantidadL').empty();
            $.ajax({
                type: "GET",
                url: "src/php/selectLibros.php",
                success: function (response) {
                    var s = JSON.parse(response);
                    if(s.length == 0){
                        $('#libros').html(`<tr >
                            <th colspan="6" class="text-center">No se encuentra ningun libro registrado</th>
                        </tr>`);
                    }else{
                        var temp = '';
                        for(let i = 0; i < s.length; i++){
                            temp +=`
                            <tr>
                                <th scope="col">${s[i]['nombre']}</th>
                                <th scope="col">${s[i]['editorial']}</th>
                                <th scope="col">${s[i]['autor']}</th>
                                <th scope="col">${s[i]['edicion']}</th>
                                <th scope="col">${s[i]['cantidad']}</th>
                                <th scope="col"><button type="button" class="btn btn-info ml-1 pl-2 pr-2" idLib="${s[i]['id']}" id="editar" data-bs-toggle="modal" data-bs-target="#staticBackdrop">EDITAR</button><button class="btn btn-danger ml-1 pl-2 pr-2" idLib="${s[i]['id']}" id="cancel">CANCELAR</button></th>
                            </tr>
                            
                            `;
                        }
                        $('#libros').html(temp);
                    }
                }
            });
            $.ajax({
                type: "GET",
                url: "src/php/selectCantidad.php",
                success: function (response) {
                    var s = JSON.parse(response);
                    var t = '';
                    for(let i = 1; i < s.length; i++){
                        t +=`
                        <option value="${s[i]['id']}">${s[i]['cantidad']}</option>
                        `;
                    }
                    $('#cantidadL').html(t);
                }
            });
            $.ajax({
                type: "GET",
                url: "src/php/selectEdicion.php",
                success: function (response) {
                    var temp = '';
                    var s = JSON.parse(response);
                    for(let i = 0; i < s.length; i++){
                        temp +=`
                            <option value="${s[i]['id']}">${s[i]['edicion']}</option>
                        `;
                    }
                    $('#edicionL').html(temp);
                    
                }
            });
            $.ajax({
                type: "GET",
                url: "src/php/selectEditorial.php",
                success: function (response) {
                    var temp='';
                    var s = JSON.parse(response);
                        for(let i = 0; i < s.length; i++){
                            temp +=`
                                <option value="${s[i]['id']}">${s[i]['editorial']}</option>
                            `;
                        }
                        $('#editorialL').html(temp);
                }
            });
            $.ajax({
                type: "GET",
                url: "src/php/selectAutor.php",
                success: function (response) {
                    var temp='';
                    var s = JSON.parse(response);
                        for(let i = 0; i < s.length; i++){
                            temp +=`
                                <option value="${s[i]['id']}">${s[i]['autor']}</option>
                            `;
                        }
                        $('#autorL').html(temp);
                }
            });
        }

        $(document).ready(function () {
            listados();

            $(document).on('submit', '#reg-editorial', function (e) {
                e.preventDefault();
                var nombre = $('#editorialNombre').val();
                $.ajax({
                    type: "POST",
                    url: "src/php/insertarEditorial.php",
                    data: {nombre},
                    success: function(res){
                        $('#editorialNombre').val('');
                        listados();
                    }
                });
            });

            $(document).on('submit', '#reg-autores', function (e) {
                e.preventDefault();
                var nombre = $('#autoresNombre').val();
                $.ajax({
                    type: "POST",
                    url: "src/php/insertarAutor.php",
                    data: {nombre},
                    success: function(res){
                        $('#autoresNombre').val('');
                        listados();
                    }
                });
            });

            $(document).on('submit', '#reg-lib', function (e) {
                e.preventDefault();
                var nombre = $('#libro').val();
                var autor = $('#autorL').val();
                var editorial = $('#editorialL').val();
                var edicion = $('#edicionL').val();
                var cantidad = $('#cantidadL').val();
                $.ajax({
                    type: "POST",
                    url: "src/php/insertarLibro.php",
                    data: {nombre, autor, editorial, edicion, cantidad},
                    success: function(res){
                        $('#libro').val('');
                        listados();
                    }
                });
            });

            $(document).on('submit', '#reg-editorial', function (e) {
                e.preventDefault();
                var nombre = $('#editorial').val();
                console.log(nombre)
                
                $.ajax({
                    type: "POST",
                    url: "src/php/insertEditorial.php",
                    data: {nombre},
                    success: function (response) {
                        $('#editorial').val('');
                        listados();
                    }
                });
            });

            $(document).on('submit', '#reg-autores', function (e) {
                e.preventDefault();
                var nombre = $('#autores').val();
                console.log(nombre)
                
                $.ajax({
                    type: "POST",
                    url: "src/php/insertAutor.php",
                    data: {nombre},
                    success: function (response) {
                        $('#autores').val('');
                        listados();
                    }
                });
            });

            $(document).on('submit', '#reg-lib', function (e) {
                e.preventDefault();
                var p = elemento(e);
                var nombre = $('#libro').val();
                var autor = $('#autorL').val();
                var editorial = $('#editorialL').val();
                var edicion = $('#edicionL').val();
                var cantidad = $('#cantidadL').val();
                console.log(nombre)
                $.ajax({
                    type: "POST",
                    url: "src/php/insertLibro.php",
                    data: {nombre, autor, editorial, edicion, cantidad},
                    success: function (response) {
                        listados();
                    }
                });
            });

            $(document).on('click', '#editar', function (e) {
                e.preventDefault();
                $('#autorE').empty();
                $('#editorialE').empty();
                $('#edicionE').empty();
                $('#cantidadE').empty();
                var p = elemento(e);
                let id = $(p).attr('idLib');
                $.ajax({
                    type: "POST",
                    url: "src/php/selectLibroID.php",
                    data: {id},
                    success: function (res) {
                        res = JSON.parse(res);
                        console.log(res['cantidad'])
                        $('#libroE').val(res['nombre']);
                        $('#idnes').attr('value', res['id']);
                        $.ajax({
                            type: "GET",
                            url: "src/php/selectCantidad.php",
                            success: function (response) {
                                var s = JSON.parse(response);
                                var t = '';
                                for(let i = 0; i < s.length; i++){
                                    if(s[i]['id'] == res['cantidad']){
                                        t +=`
                                        <option value="${s[i]['id']}" selected>${s[i]['cantidad']}</option>
                                        `;    
                                    }else{
                                        t +=`
                                        <option value="${s[i]['id']}">${s[i]['cantidad']}</option>
                                        `;
                                    }
                                    
                                }
                                $('#cantidadE').html(t);
                            }
                        });
                        $.ajax({
                            type: "GET",
                            url: "src/php/selectEdicion.php",
                            success: function (response) {
                                var temp = '';
                                var s = JSON.parse(response);
                                for(let i = 0; i < s.length; i++){
                                    if(s[i]['id'] == res['edicion']){
                                        temp +=`
                                        <option value="${s[i]['id']}" selected>${s[i]['edicion']}</option>
                                        `;    
                                    }else{
                                        temp +=`
                                            <option value="${s[i]['id']}">${s[i]['edicion']}</option>
                                        `;
                                    }
                                    
                                }
                                $('#edicionE').html(temp);
                                
                            }
                        });
                        $.ajax({
                            type: "GET",
                            url: "src/php/selectEditorial.php",
                            success: function (response) {
                                var temp='';
                                var s = JSON.parse(response);
                                    for(let i = 0; i < s.length; i++){
                                        if(s[i]['id'] == res['editorial']){
                                            temp +=`
                                            <option value="${s[i]['id']}" selected>${s[i]['editorial']}</option>
                                            `;    
                                        }else{
                                            temp +=`
                                                <option value="${s[i]['id']}">${s[i]['editorial']}</option>
                                            `;
                                        }
                                        
                                    }
                                    $('#editorialE').html(temp);
                            }
                        });
                        $.ajax({
                            type: "GET",
                            url: "src/php/selectAutor.php",
                            success: function (response) {
                                var temp='';
                                var s = JSON.parse(response);
                                    for(let i = 0; i < s.length; i++){
                                        if(s[i]['id'] == res['autor']){
                                            temp +=`
                                            <option value="${s[i]['id']}" selected>${s[i]['autor']}</option>
                                            `;    
                                        }else{
                                            temp +=`
                                                <option value="${s[i]['id']}">${s[i]['autor']}</option>
                                            `;
                                        }
                                    }
                                    $('#autorE').html(temp);
                            }
                        });
                    }
                });
            });

            $(document).on('click', '#cancel', function (e) {
                e.preventDefault();
                var p = elemento(e);
                let id = $(p).attr('idLib');
                $.ajax({
                    type: "POST",
                    url: "src/php/deleteLibro.php",
                    data: {id},
                    success: function (response) {
                        listados();
                    }
                });
            });

            $(document).on('submit', '#edit-lib', function (e) {
                e.preventDefault();
                var p = elemento(e);
                var id = $('#idnes').val();
                var nombre = $('#libroE').val();
                var autor = $('#autorE').val();
                var editorial = $('#editorialE').val();
                var edicion = $('#edicionE').val();
                var cantidad = $('#cantidadE').val();
                $.ajax({
                    type: "POST",
                    url: "src/php/updateLibro.php",
                    data: {id,nombre, autor, editorial, edicion, cantidad},
                    success: function (response) {
                        listados();
                        $('#cerrador').click();
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
