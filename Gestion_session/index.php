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

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="bg-light p-2 m-2">
                        <h5 class="text-dark text-center">GESTION SESSION</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b></b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addModal" class="btn btn-success" data-toggle="modal" id="addNewBtn"><i
                                class="material-icons">&#xE147;</i><span>Ajouter Nouveau Session</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>annee</th>
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
    <div id="addModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter Session</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body addSession">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" id="nom_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Annee</label>
                        <input type="text" id="annee_input" class="form-control" required>
                    </div>
         
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-success" value="Ajouter" onclick="addSession()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editModal" class="modal ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier Session</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_session">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" id="nom_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Annee</label>
                        <input type="text" id="annee_input" class="form-control" required>
                        <input type="hidden" id="id_session" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-info" onclick="editSession()" value="enregistre">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Voir Session</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_session">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" id="nom_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Annee</label>
                        <input type="text" id="annee_input" class="form-control" readonly>
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
                    <h4 class="modal-title">Supprimer Session</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ces enregistrements ?</p>
                    <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-danger" onclick="deleteSession()" value="supprimer">
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        listSession();
    });

     function listSession(){
        $.ajax({
            type:"get",
            url:"../Gestion_session/session-liste.php",
            success: function(data){
                var response =JSON.parse(data);
                console.log(response);
                var tr = '';
                for(var i = 0; i < response.length; i++){
                    var id_session = response[i].id_session ;
                    var nom_session = response[i].nom_session;
                    var annee_univ = response[i].annee_univ
                    tr += '<tr>';
                    tr += '<td>'+id_session+'</td>';
                    tr += '<td>'+nom_session+'</td>';
                    tr += '<td>'+annee_univ+'</td>';
                    tr += '<td><div class="d-flex">';
                    tr +=
                        '<a href="#viewModal" class="m-1 view" data-toggle="modal" onclick=viewSession("' +
                        id_session  + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                    tr +=
                        '<a href="#editModal" class="m-1 edit" data-toggle="modal" onclick=viewSession("' +
                        id_session  +
                        '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    tr +=
                        '<a href="#deleteModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id_session  +
                        '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                    tr += '</div></td>'
                    tr += '</tr>';
                }
                $('.loading').hide();
                $('#data').html(tr);
            }
        })
     }

       function addSession(){
        var nom_session = $('#nom_input').val();
        var annee_univ = $('#annee_input').val(); 
        $.ajax({
            type:'post',
            data:{
                nom_session: nom_session,
                annee_univ: annee_univ,
                
            },
            url:"../Gestion_session/ajouter-session.php",
            success : function(data){
                var response = JSON.parse(data);
                console.log(response);
                $('#addModal').modal('hide');
                $('.modal-backdrop').remove();
                listSession();
            }
        })
       }

       function deleteSession(){
        var id_session= $('#delete_id').val();
        $.ajax({
            type: 'get',
            url:"../Gestion_session/supprimer-session.php",
            data:{
                id_session  : id_session  
            },
            success: function(data){
                var response = JSON.parse(data);
                console.log(response); 
                $('#deleteModal').modal('hide');
                $('.modal-backdrop').remove();
                listSession();

            }
        });
       }

       function editSession(){
        var nom_session = $('.edit_session #nom_input').val();
        var annee_univ = $('.edit_session #annee_input').val();
        var id_session  = $('.edit_session #id_session ').val();
        $.ajax({
            type:'post',
            data:{
                nom_session:nom_session,
                annee_univ:annee_univ,
                id_session :id_session ,
            },
            url:"../Gestion_session/modifier-session.php",
            success: function(data){
                var response =JSON.parse(data);
                $('#editModal').modal('hide');
                $('.modal-backdrop').remove();
                listSession();
            }
        })
       }

       function viewSession(id_session){
            $.ajax({
                type:'get',
                data:{
                    id_session :id_session,
                },
                url:"../Gestion_session/view-session.php",
                success:function(data){
                    var response =JSON.parse(data);
                    $('.view_session #nom_input').val(response.nom_session);
                    $('.view_session #annee_input').val(response.annee_univ);
                   

                    $('.edit_session #nom_input').val(response.nom_session);
                    $('.edit_session #annee_input').val(response.annee_univ);
                    $('.edit_session #id_session').val(response.id_session);

                }
            })
       }
    </script>
   
      

</body>

</html>