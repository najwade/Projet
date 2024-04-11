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
                        <h5 class="text-dark text-center">GESTION SEMESTER</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <h2><b></b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addModal" class="btn btn-success" data-toggle="modal" id="addNewBtn"><i
                                    class="material-icons">&#xE147;</i><span>Ajouter Nouveau Semester</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>semester</th>
                            <th>filiere</th>
                            <th>session</th>
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
                    <h4 class="modal-title">Ajouter Semestre</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body addSemester">
                    <div class="form-group">
                        <label>Nom semester</label>
                        <input type="text" id="nom_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="filiere_input">Filière</label>
                        <select id="filiere_input" class="form-control" required>
       
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="session_input">Session</label>
                        <select id="session_input" class="form-control" required>
       
                        </select>
                    </div>   
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-success" value="Ajouter" onclick="addSemester()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier Semester</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_semester">
                    <div class="form-group">
                        <label>semester</label>
                        <input type="text" id="edit_nom_input" class="form-control" required>
                        <input type="hidden" id="id_semestre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="filiere_input">Filière</label>
                        <select id="edit_filiere_input" class="form-control" required>
       
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="session_input">Session</label>
                        <select id="edit_session_input" class="form-control" required>
       
                        </select>
                    </div>  
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-info" onclick="editSemester()" value="enregistre">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Voir Semester</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_semester">
                    <div class="form-group">
                        <label>semester</label>
                        <input type="text" id="nom_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>filiere</label>
                        <input type="text" id="filiere_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>session</label>
                        <input type="text" id="session_input" class="form-control" readonly>
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
                    <h4 class="modal-title">Supprimer Semester</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ces enregistrements ?</p>
                    <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" class="btn btn-danger" onclick="deleteSemester()" value="supprimer">
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        listSemester();
    });

     function listSemester(){
        $.ajax({
            type:"get",
            url:"../Gestion_semestre/semester-liste.php",
            success: function(data){
                var response =JSON.parse(data);
                console.log(response);
                var tr = '';
                for(var i = 0; i < response.length; i++){
                    var id_semestre = response[i].id_semestre ;
                    var nom_semestre= response[i].nom_semestre;
                    var nom_filiere= response[i].nom_filiere;
                    var nom_session = response[i].nom_session;
                    tr += '<tr>';
                    tr += '<td>'+id_semestre+'</td>';
                    tr += '<td>'+nom_semestre+'</td>';
                    tr += '<td>'+nom_filiere+'</td>';
                    tr += '<td>'+nom_session+'</td>';
                    tr += '<td><div class="d-flex">';
                    tr +=
                        '<a href="#viewModal" class="m-1 view" data-toggle="modal" onclick=viewSemester("' +
                        id_semestre + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                    tr +=
                        '<a href="#editModal" class="m-1 edit" data-toggle="modal" onclick=viewSemester("' +
                        id_semestre +
                        '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    tr +=
                        '<a href="#deleteModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id_semestre +
                        '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                    tr += '</div></td>'
                    tr += '</tr>';
                }
                $('.loading').hide();
                $('#data').html(tr);
            }
        })
     }

       function addSemester(){
        var nom_semestre = $('#nom_input').val();
        var nom_filiere= $('#filiere_input').val();
        var nom_session = $('#session_input').val();
        
        $.ajax({
            type:'post',
            data:{
                nom_semestre:nom_semestre,
                nom_filiere: nom_filiere,
                nom_session: nom_session,
            },
            url:"../Gestion_semestre/ajouter-semester.php",
            success : function(data){
                var response = JSON.parse(data);
                console.log(response);
                $('#addModal').modal('hide');
                $('.modal-backdrop').remove();
                listSemester();
            }
        })
       }

       function deleteSemester(){
        var id_semestre = $('#delete_id').val();
        $.ajax({
            type: 'get',
            url:"../Gestion_semestre/supprimer-semester.php",
            data:{
                id_semestre  : 	id_semestre  
            },
            success: function(data){
                var response = JSON.parse(data);
                console.log(response); 
                $('#deleteModal').modal('hide');
                $('.modal-backdrop').remove();
                listSemester();

            }
        });
       }

    function editSemester() {
    var id_semestre = $('#id_semestre').val();
    var nom_semestre = $('#edit_nom_input').val();
    var nom_filiere = $('#edit_filiere_input').val();
    var nom_session = $('#edit_session_input').val();

    $.ajax({
        type: 'post',
        data: {
            id_semestre: id_semestre,
            nom_semestre: nom_semestre,
            nom_filiere: nom_filiere,
            nom_session: nom_session,
        },
        url: "../Gestion_semestre/modifier-semester.php",
        success: function (data) {
            var response = JSON.parse(data);
            console.log(data);
            $('#editModal').modal('hide');
            $('.modal-backdrop').remove();
            listSemester();
        },
        error: function (error) {
            console.error("Erreur lors de la requête AJAX :", error);
        }
    });
}




       function viewSemester(id_semestre){
            $.ajax({
                type:'get',
                data:{
                    id_semestre:id_semestre,
                },
                url:"../Gestion_semestre/view-semester.php",
                success:function(data){
                    var response =JSON.parse(data);
                    $('.view_semester #nom_input').val(response.nom_semestre);
                    $('.view_semester #filiere_input').val(response.nom_filiere);
                    $('.view_semester #session_input').val(response.nom_session);
                    
                   

                    $('.edit_semester #edit_nom_input').val(response.nom_semestre);
                    $('.edit_semester #edit_filiere_input').val(response.nom_filiere);
                    $('.edit_semester #edit_session_input').val(response.nom_session);
                    
                    
                }
            })
       }
//liste déroulant(pour add)


$(document).ready(function () {
    loadOptionsadd();
});

function loadOptionsadd() {
    $.ajax({
        type: "get",
        url: "../Gestion_semestre/list-options.php",
        success: function (data) {
            var response = JSON.parse(data);

            if (response.error) {
                console.error(response.error);
                return;
            }

            // Remplacez les ID des listes déroulantes par les vôtres.
            $('#filiere_input').html(response.filiereOptions);
            $('#session_input').html(response.sessionOptions);
        },
        error: function (error) {
            console.error("Erreur de chargement des options", error);
        }
    });
}

//liste déroulant(pour edit)


$(document).ready(function () {
    loadOptions();
});

function loadOptions() {
    //utiliser une méthode jquery permet de réaliser des requete ajax
    $.ajax({
        type: "get",
        url: "../Gestion_semestre/list-options.php",
        //une fonction a exécuter si la requete ajax réussit
        success: function (data) {
            var response = JSON.parse(data);

            if (response.error) {
                console.error(response.error);
                return;
            }

            
            $('#edit_filiere_input').html(response.filiereOptions);
            $('#edit_session_input').html(response.sessionOptions);
        },
        error: function (error) {
            console.error("Erreur de chargement des options", error);
        }
    });
}

    </script>
   
      

</body>

</html>