<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>PHP Ajax CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="../css/style.css"></link>
</head>

 <body id="main-content" class="container allContent-section py-4">
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="bg-light p-2 m-2">
                        <h5 class="text-dark text-center">GESTION PROFESSEUR</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b></b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addModal" class="btn btn-success" id="addNewProfBtn"  data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i><span>Ajouter Nouveau Professeur</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Prenom</th>
                            <th>Cin</th>
                            <th>Adresse</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                    </tbody>
                </table>
                <p class="loading">Loading Data</p>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addModal" class="modal" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter Professeur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body addProf">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" id="nom_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" id="prenom_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Cin</label>
                        <input type="text" id="cin_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" required>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-success" value="Ajouter" onclick="addProf()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier Professeur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_prof">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" id="nom_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" id="prenom_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Cin</label>
                        <input type="text" id="cin_input" class="form-control" required>
                        <input type="hidden" id="id_prof" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-info" onclick="editProf()" value="enregistre">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Voir Professeur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_prof">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" id="nom_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" id="prenom_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Cin</label>
                        <input type="text" id="cin_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
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
    <div id="deleteModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Supprimer Professeur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ces enregistrements ?</p>
                    <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-danger" onclick="deleteProf()" value="supprimer">
                </div>
            </div>
        </div>
    </div>
    <script>
$(document).ready(function () {
    listProf();
});




     function listProf(){
        $.ajax({
            type:"get",
            url:"../Gestion_prof/prof-liste.php",
            success: function(data){
                var response =JSON.parse(data);
                console.log(response);
                var tr = '';
                for(var i = 0; i < response.length; i++){
                    var id_prof = response[i].id_prof;
                    var nom = response[i].nom;
                    var prenom = response[i].prenom;
                    var cin = response[i].cin;
                    var addresse = response[i].addresse;
                    var email = response[i].email;
                    tr += '<tr>';
                    tr += '<td>'+id_prof+'</td>';
                    tr += '<td>'+nom+'</td>';
                    tr += '<td>'+prenom+'</td>';
                    tr += '<td>'+cin+'</td>';
                    tr += '<td>'+addresse+'</td>';
                    tr += '<td>'+email+'</td>';
                    tr += '<td><div class="d-flex">';
                    tr +=
                        '<a href="#viewModal" class="m-1 view" data-toggle="modal" onclick=viewProf("' +
                        id_prof + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                    tr +=
                        '<a href="#editModal" class="m-1 edit" data-toggle="modal" onclick=viewProf("' +
                        id_prof +
                        '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    tr +=
                        '<a href="#deleteModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id_prof +
                        '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                    tr += '</div></td>'
                    tr += '</tr>';
                }
                $('.loading').hide();
                $('#data').html(tr);
            }
        })
     }

    
     function addProf() {
    var nom = $('#nom_input').val();
    var prenom = $('#prenom_input').val();
    var cin = $('#cin_input').val();
    var addresse = $('#address_input').val();
    var email = $('#email_input').val();
   
   

        $.ajax({
            type: 'post',
            data: {
                nom: nom,
                prenom: prenom,
                cin: cin,
                addresse: addresse,
                email: email,
            },
            
  
            url: "../Gestion_prof/ajouter-prof.php",
            success: function(data) {
                var response = JSON.parse(data);
                console.log(response);
                $('.modal-backdrop').remove(); // Remove the backdrop
                $('#addModal').modal('hide');
                listProf();
                
            }
        });
    
    }

       function deleteProf(){
        var id_prof = $('#delete_id').val();
        $.ajax({
            type: 'get',
            url:"../Gestion_prof/supprimer-prof.php",
            data:{
                id_prof : id_prof 
            },
            success: function(data){
                var response = JSON.parse(data);
                console.log(response); 
                $('.modal-backdrop').remove(); // Remove the backdrop
                $('#deleteModal').modal('hide');
                listProf();

            }
        });
       }

       function editProf(){
        var nom = $('.edit_prof #nom_input').val();
        var prenom = $('.edit_prof #prenom_input').val();
        var cin = $('.edit_prof #cin_input').val();
        var addresse = $('.edit_prof #address_input').val();
        var email = $('.edit_prof #email_input').val();
        var id_prof = $('.edit_prof #id_prof').val();
        $.ajax({
            type:'post',
            data:{
                nom:nom,
                prenom:prenom,
                cin:cin,
                addresse:addresse,
                email:email,
                id_prof:id_prof,
            },
            url:"../Gestion_prof/modifier-prof.php",
            success: function(data){
                var response =JSON.parse(data);
                $('#editModal').modal('hide');
                $('.modal-backdrop').remove(); // Remove the backdrop
                listProf();

                
            }
        })
       }

       function viewProf(id_prof){
            $.ajax({
                type:'get',
                data:{
                    id_prof:id_prof,
                },
                url:"../Gestion_prof/view-prof.php",
                success:function(data){
                    var response =JSON.parse(data);
                    $('.view_prof #nom_input').val(response.nom);
                    $('.view_prof #prenom_input').val(response.prenom);
                    $('.view_prof #cin_input').val(response.cin);
                    $('.view_prof #address_input').val(response.addresse);
                    $('.view_prof #email_input').val(response.email);
                   

                    $('.edit_prof #nom_input').val(response.nom);
                    $('.edit_prof #prenom_input').val(response.prenom);
                    $('.edit_prof #cin_input').val(response.cin);
                    $('.edit_prof #address_input').val(response.addresse);
                    $('.edit_prof #email_input').val(response.email);
                    $('.edit_prof #id_prof').val(response.id_prof);

                }
            })
       }

    </script>
   
      

</body>
</html>