<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>CRUD Filiere</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <h5 class="text-dark text-center">GESTION FILIERE</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <h2><b></b></h2>  
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" id="addNewBtn"><i
                                    class="material-icons">&#xE147;</i><span>Ajouter Nouveau Filiere</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
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
                    <h4 class="modal-title">Ajouter Filiere</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                    <div class="form-group">
                        <label>Nom de Filiere</label>
                        <input type="text" id="name_input" class="form-control" required>
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
                    <h4 class="modal-title">Modifier Filiere</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Nom de Filiere</label>
                        <input type="text" id="name_input" class="form-control" required>
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
                    <h4 class="modal-title">Voir Filiere</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Nom de Filiere</label>
                        <input type="text" id="name_input" class="form-control" readonly>
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
                    <h4 class="modal-title">Supprimer Filiere</h4>
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
    });

     function employeelist(){
        $.ajax({
            type:"get",
            url:"../gestion_filiere/filiere-list.php",
            success: function(data){
                console.log(data);
                var response =JSON.parse(data);
                console.log(response);
                var tr = '';
                for(var i = 0; i < response.length; i++){
                    var id = response[i].id_filiere;
                    var nom_filiere = response[i].nom_filiere;
                    tr += '<tr>';
                    tr += '<td>'+id+'</td>';
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
        var nom_filiere = $('#name_input').val();
        $.ajax({
            type:'post',
            data:{
                nom_filiere: nom_filiere
            },
            url:"../gestion_filiere/filiere-add.php",
            success : function(data){
                var response = JSON.parse(data);
                console.log(response);
                $('#addEmployeeModal').modal('hide');
                $('.modal-backdrop').remove();
                employeelist();
            }
        })
       }

       function deleteEmployee(){
        var id = $('#delete_id').val();
        $.ajax({
            type: 'get',
            url:"../gestion_filiere/filiere-delete.php",
            data:{
                id: id
            },
            success: function(data){
                var response = JSON.parse(data);
                console.log(response); 
                $('#deleteEmployeeModal').modal('hide');
                $('.modal-backdrop').remove();
                employeelist();

            }
        });
       }

       function editEmployee(){
        var nom_filiere = $('.edit_employee #name_input').val();
        var id_filiere = $('.edit_employee #employee_id').val();
        $.ajax({
            type:'post',
            data:{
                nom_filiere:nom_filiere,
                id_filiere:id_filiere
            },
            url:"../gestion_filiere/filiere-edit.php",
            success: function(data){
                console.log(data);
                var response =JSON.parse(data);
                $('#editEmployeeModal').modal('hide');
                $('.modal-backdrop').remove();
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
                url:"../gestion_filiere/filiere-view.php",
                success:function(data){
                    console.log(data);
                    var response =JSON.parse(data);
                    $('.view_employee #name_input').val(response.nom_filiere);

                    $('.edit_employee #name_input').val(response.nom_filiere);
                    $('.edit_employee #employee_id').val(response.id_filiere);

                }
            })
       }
    </script>
   
      

</body>

</html>