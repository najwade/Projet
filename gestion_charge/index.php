<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>CRUD CHARGE</title>
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
                        <h5 class="text-dark text-center">GESTION CHARGE</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                           <h2><b></b></h2>
                        </div>
                        <div class="col-sm-6">
                        <a href="../gestion_charge/export.php" class="m-1 download" download><i class="fa fa-download" data-toggle="tooltip" title="Download"></i></a>
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" id="addNewBtn"><i
                                    class="material-icons">&#xE147;</i><span>Ajouter Nouveau Charge</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Professeur</th>
                            <th>Module</th>
                            <th>Type Charge</th>
                            <th>Nbr Groupes</th>
                            <th>Vhoraire</th>
                            <th>duree</th>
                            <th>facteur</th>
                            <th style="text-align: center;">Actions</th>
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
    <div id="addEmployeeModal" class="modal ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter Charge</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">       
                    <div class="form-group">
                        <label>Professseur</label>
                        <select class="form-control" id="professeur_list" required>

                        <select>
                    </div>
                    <div class="form-group">
                        <label>Module</label>
                        <select class="form-control" id="module_list" required>

                        <select>
                    </div>
                    <div class="form-group">
                        <label>Type Charge</label>
                        <input type="email" id="type_charge" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nbr Groupes</label>
                        <input type="email" id="nbr_groups" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Volume Horaire</label>
                        <input type="text" id="vhoraire" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Duree</label>
                        <input type="text" id="duree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Facteur</label>
                        <input type="text" id="facteur" class="form-control" required>
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
    <div id="editEmployeeModal" class="modal ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier Charge</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Professseur</label>
                        <select class="form-control" id="professeur_list" required>

                        <select>
                    </div>
                    <div class="form-group">
                        <label>Module</label>
                        <select class="form-control" id="module_list" required>

                        <select>
                    </div>
                    <div class="form-group">
                        <label>Type Charge</label>
                        <input type="email" id="type_charge" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nbr Groupes</label>
                        <input type="email" id="nbr_groups" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Volume Horaire</label>
                        <input type="text" id="vhoraire" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Duree</label>
                        <input type="text" id="duree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Facteur</label>
                        <input type="text" id="facteur" class="form-control" required>
                       
                    </div>
                    <input type="hidden" id="employee_id" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-info" onclick="editEmployee()" value="Enregister">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewEmployeeModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Voir Charge</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Professeur</label>
                        <input type="email" id="input_prof" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Module</label>
                        <input type="email" id="input_module" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Type Charge</label>
                        <input type="email" id="type_charge" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nbr Groupes</label>
                        <input type="email" id="nbrgroups" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Volume Horaire</label>
                        <input type="text" id="vhoraire" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Duree</label>
                        <input type="text" id="duree" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Facteur</label>
                        <input type="text" id="facteur" class="form-control" readonly>
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
                    <h4 class="modal-title">Supprimer Charge</h4>
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
        loadProfesseurOptions();
        loadModuleOptions();
    });

     function employeelist(){
        $.ajax({
            type:"get",
            url:"../gestion_charge/charge-list.php",
            success: function(data){
                var response =JSON.parse(data);
                console.log(response);
                var tr = '';
                for(var i = 0; i < response.length; i++){
                    var id = response[i].id_charge;
                    var nom = response[i].nom;
                    var prenom = response[i].prenom;
                    var nom_module = response[i].nom_module;
                    var type_charge = response[i].type_charge;
                    var nbrgroups = response[i].nbrgroups;
                    var volume_h = response[i].volume_h;
                    var duree = response[i].duree;
                    var facteur = response[i].facteur;
                    tr += '<tr>';
                    tr += '<td>'+id+'</td>';
                    tr += '<td>'+nom +' '+ prenom+'</td>';
                    tr += '<td>'+nom_module+'</td>';
                    tr += '<td>'+type_charge+'</td>';
                    tr += '<td>'+nbrgroups+'</td>';
                    tr += '<td>'+volume_h+'</td>';
                    tr += '<td>'+duree+'</td>';
                    tr += '<td>'+facteur+'</td>';
                    tr += '<td><div class="d-flex">';
                    tr += 
                    '<a href="../gestion_charge/export.php" class="m-1 download" download><i class="fa fa-download" data-toggle="tooltip" title="Download"></i></a>';
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
        var id_prof = $('#professeur_list').val();
        var id_module = $('#module_list').val();
        var type_charge = $('#type_charge').val();
        var nbrgroups = $('#nbr_groups').val();
        var volume_h = $('#vhoraire').val();
        var duree = $('#duree').val();
        var facteur = $('#facteur').val();
        $.ajax({
            type:'post',
            data:{
                id_prof: id_prof,
                id_module: id_module,
                type_charge: type_charge,
                nbrgroups: nbrgroups,
                volume_h: volume_h,
                duree: duree,
                facteur: facteur,
            },
            url:"../gestion_charge/charge-add.php",
            success : function(data){
                console.log(data);
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
            url:"../gestion_charge/charge-delete.php",
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
        var id_charge = $('.edit_employee #employee_id').val();
        var id_prof = $('.edit_employee #professeur_list').val();
        var id_module = $('.edit_employee #module_list').val();
        var type_charge = $('.edit_employee #type_charge').val();
        var volume_h = $('.edit_employee #vhoraire').val();
        var nbrgroups = $('.edit_employee #nbr_groups').val();
        var duree = $('.edit_employee #duree').val();
        var facteur = $('.edit_employee #facteur').val();
        $.ajax({
            type:'post',
            data:{
                id_prof:id_prof,
                id_module:id_module,
                type_charge:type_charge,
                volume_h:volume_h,
                nbrgroups:nbrgroups,
                duree:duree,
                facteur:facteur,
                id_charge:id_charge,
            },
            url:"../gestion_charge/charge-edit.php",
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
                url:"../gestion_charge/charge-view.php",
                success:function(data){
                    var response =JSON.parse(data);
                    $('.view_employee #input_prof').val(response.nom +' '+response.prenom);
                    $('.view_employee #input_module').val(response.nom_module);
                    $('.view_employee #type_charge').val(response.type_charge);
                    $('.view_employee #nbrgroups').val(response.nbrgroups);
                    $('.view_employee #vhoraire').val(response.volume_h);
                    $('.view_employee #duree').val(response.duree);
                    $('.view_employee #facteur').val(response.facteur);
                    
                    $('.edit_employee #type_charge').val(response.type_charge);
                    $('.edit_employee #nbrgroups').val(response.nbrgroups);
                    $('.edit_employee #vhoraire').val(response.volume_h);
                    $('.edit_employee #duree').val(response.duree);
                    $('.edit_employee #facteur').val(response.facteur);

                }
            })
       }

       function loadModuleOptions() {
            $.ajax({
                type: 'get',
                url: "../gestion_charge/module-options.php",
                success: function (data) {
                    console.log(data);
                    var response = JSON.parse(data);
                    var options = '';
                    for (var i = 0; i < response.length; i++) {
                        options += '<option value="' + response[i].id_module + '">' + response[i].nom_module + '</option>';
                    }
                    $('#module_list').html(options);
                    $('.edit_employee #module_list').html(options);
          
                }
            });
        }

        
       function loadProfesseurOptions() {
            $.ajax({
                type: 'get',
                url: "../gestion_charge/professeur-options.php",
                success: function (data) {
                    console.log(data);
                    var response = JSON.parse(data);
                    var options = '';
                    for (var i = 0; i < response.length; i++) {
                        options += '<option value="' + response[i].id_prof + '">' + response[i].nom +' '+ response[i].prenom + '</option>';
                    }
                    $('#professeur_list').html(options);
                    $('.edit_employee #professeur_list').html(options);
          
                }
            });
        }
    </script>
   
      

</body>

</html>