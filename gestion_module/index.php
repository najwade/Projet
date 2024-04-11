<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>CRUD MODULE</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css"></link>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="bg-light p-2 m-2">
                        <h5 class="text-dark text-center">GESTION MODULE</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <h2><b></b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" id="addNewBtn"><i
                                    class="material-icons">&#xE147;</i><span>Ajouter Nouveau Module</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Module</th>
                            <th>Filiere</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="employee_data">
                    </tbody>
                </table>
                <p class="loading">Loading Data</p>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter Module</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                    <div class="form-group">
                        <label>Nom de Module</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Filiere</label>
                        <select class="form-control" id="filiere_list" required>

                        <select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-success" value="Ajouter" onclick="addEmployee()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier Module</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Nom de Module</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Filiere</label>
                        <select class="form-control" id="#filiere_list" required>
           
                        <select>
                        <input type="hidden" id="employee_id" class="form-control" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-info" onclick="editEmployee()" value="Enregistrer">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewEmployeeModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Voir Module</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Nom de Module</label>
                        <input type="text" id="name_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nom de Filiere</label>
                        <input type="email" id="email_input" class="form-control" readonly>
                    </div>        
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Fermer">
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Supprimer Module</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p> Êtes-vous sûr de vouloir supprimer ces enregistrements ?</p>
                    <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-danger" onclick="deleteEmployee()" value="Supprimer">
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        employeelist();
        loadFiliereOptions();
    });

     function employeelist(){
        $.ajax({
            type:"get",
            url:"../gestion_module/module-list.php",
            success: function(data){
                console.log(data)
                var response =JSON.parse(data);
                console.log(response);
                var tr = '';
                for(var i = 0; i < response.length; i++){
                    var id = response[i].id_module;
                    var nom_module = response[i].nom_module;
                    var nom_filiere = response[i].nom_filiere;
                    tr += '<tr>';
                    tr += '<td>'+id+'</td>';
                    tr += '<td>'+nom_module+'</td>';
                    tr += '<td>'+nom_filiere+'</td>';
                    tr += '<td><div class="d-flex">';
                    tr +=
                        '<a href="#viewEmployeeModal" class="m-1 view" data-toggle="modal" onclick=viewEmployee("' +
                        id + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                    tr +=
                        '<a href="#editEmployeeModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' +
                        id +
                        '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    tr +=
                        '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id +
                        '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                    tr += '</div></td>'
                    tr += '</tr>';
                }
                $('.loading').hide();
                $('#employee_data').html(tr);
            }
        })
     }

       function addEmployee(){

        var nom_module = $('#name_input').val();
        var id_filiere = $('#filiere_list').val();
        $.ajax({
            type:'post',
            data:{
                nom_module: nom_module,
                id_filiere: id_filiere
            },
            url:"../gestion_module/module-add.php",
            success : function(data){
                console.log(data);
                var response = JSON.parse(data);
                console.log(response);
                $('.modal-backdrop').remove();
                $('#addEmployeeModal').modal('hide');
                employeelist();
            }
        })
       }

       function deleteEmployee(){
        var id_module = $('#delete_id').val();
        $.ajax({
            type: 'get',
            url:"../gestion_module/module-delete.php",
            data:{
                id_module: id_module
            },
            success: function(data){
                var response = JSON.parse(data);
                console.log(response); 
                $('.modal-backdrop').remove();
                $('#deleteEmployeeModal').modal('hide');
                employeelist();

            }
        });
       }

       function editEmployee(){
        var nom_module = $('.edit_employee #name_input').val();
        var id_filiere = $('.edit_employee #filiere_list').val();      
        var id_module = $('.edit_employee #employee_id').val();
        $.ajax({
            type:'post',
            data:{
                nom_module:nom_module,
                id_filiere:id_filiere,
                id_module:id_module
            },
            url:"../gestion_module/module-edit.php",
            success: function(data){
                console.log(data);
                var response =JSON.parse(data);
                $('.modal-backdrop').remove();
                $('#editEmployeeModal').modal('hide');
                employeelist();
            }
        })
       }

       function viewEmployee(id){
        $.ajax({
                type:'get',
                data:{
                    id : id,
                },
                url:"../gestion_module/module-view.php",
                success:function(data){
                    var response =JSON.parse(data);
                    $('.view_employee #name_input').val(response.nom_module);
                    $('.view_employee #email_input').val(response.nom_filiere);

                    $('.edit_employee #name_input').val(response.nom_module);
                    $('.edit_employee #filiere_list').val(response.nom_filiere);
                    $('.edit_employee #employee_id').val(response.id);

                }
            })
       }

       function loadFiliereOptions() {
            $.ajax({
                type: 'get',
                url: "../gestion_module/filiere-options.php",
                success: function (data) {
                    console.log(data);
                    var response = JSON.parse(data);
                    var options = '';
                    for (var i = 0; i < response.length; i++) {
                        options += '<option value="' + response[i].id_filiere + '">' + response[i].nom_filiere + '</option>';
                    }
                    $('#filiere_list').html(options);
                    $('.edit_employee #filiere_list').html(options);              
                }
            });
        }








    </script>
   
      

</body>

</html>