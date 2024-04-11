<!-- Sidebar -->

<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="../image/login.png" width="91" height="93" alt="Swiss Collection"> 
</div>

<hr style="border:1px solid; background-color:#c3ccdc; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./admin.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="../matriceee/" ><i class="fa fa-table"></i> Charge horaire</a>
    <a href="#prof"  onclick="showProf()" ><i class="fa fa-users"></i> Professeur</a>
    <a href="#Module"   onclick="showModule()" ><i class="fa fa-th-large"></i> Module</a>
    <a href="#Filier"   onclick="showFilier()" ><i class="fa fa-th"></i> Filiere</a>
    <a href="#semester"   onclick="showSemester()" ><i class="fa fa-th-list"></i> Semestre</a>    
    <a href="#session"   onclick="showSession()" ><i class="fa fa-th"></i> Session</a>
    <a href="#charge" onclick="showCharge()"><i class="fa fa-list"></i> Charge</a>
    
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>

<!-- Ajoutez cette fonction dans votre fichier contenant le code JavaScript -->
<script>
function showProf() {
    $.ajax({
        url: "../Gestion_prof/index.php",  // Le chemin correct vers le fichier index1.php
        method:"post",
        success: function(data) {
            // Affichez le contenu dans la console ou où vous souhaitez l'afficher
            console.log(data);

            // Si vous voulez afficher le contenu dans un élément spécifique, par exemple, avec une classe 'allContent-section'
            $('.allContent-section').html(data);
        },
        error: function(xhr, status, error) {
            // Gérez les erreurs ici
            console.error("Erreur lors de la récupération des données :", status, error);
        }
    });
}

function showModule() {
    $.ajax({
        url: "../gestion_module/index.php",  // Le chemin correct vers le fichier index1.php
        method:"post",
        success: function(data) {
            // Affichez le contenu dans la console ou où vous souhaitez l'afficher
            console.log(data);

            // Si vous voulez afficher le contenu dans un élément spécifique, par exemple, avec une classe 'allContent-section'
            $('.allContent-section').html(data);
        },
        error: function(xhr, status, error) {
            // Gérez les erreurs ici
            console.error("Erreur lors de la récupération des données :", status, error);
        }
    });
}

function showFilier() {
    $.ajax({
        url: "../gestion_filiere/index.php",  // Le chemin correct vers le fichier index1.php
        method:"post",
        success: function(data) {
            // Affichez le contenu dans la console ou où vous souhaitez l'afficher
            console.log(data);

            // Si vous voulez afficher le contenu dans un élément spécifique, par exemple, avec une classe 'allContent-section'
            $('.allContent-section').html(data);
        },
        error: function(xhr, status, error) {
            // Gérez les erreurs ici
            console.error("Erreur lors de la récupération des données :", status, error);
        }
    });
}

function showSemester() {
    $.ajax({
        url: "../Gestion_semestre/index.php",  // Le chemin correct vers le fichier index1.php
        method:"post",
        success: function(data) {
            // Affichez le contenu dans la console ou où vous souhaitez l'afficher
            console.log(data);

            // Si vous voulez afficher le contenu dans un élément spécifique, par exemple, avec une classe 'allContent-section'
            $('.allContent-section').html(data);
        },
        error: function(xhr, status, error) {
            // Gérez les erreurs ici
            console.error("Erreur lors de la récupération des données :", status, error);
        }
    });
}

function showSession() {
    $.ajax({
        url: "../Gestion_session/index.php",  // Le chemin correct vers le fichier index1.php
        method:"post",
        success: function(data) {
            // Affichez le contenu dans la console ou où vous souhaitez l'afficher
            console.log(data);

            // Si vous voulez afficher le contenu dans un élément spécifique, par exemple, avec une classe 'allContent-section'
            $('.allContent-section').html(data);
        },
        error: function(xhr, status, error) {
            // Gérez les erreurs ici
            console.error("Erreur lors de la récupération des données :", status, error);
        }
    });
}

function showCharge() {
    $.ajax({
        url: "../gestion_charge/index.php",  // Le chemin correct vers le fichier index1.php
        method:"post",
        success: function(data) {
            // Affichez le contenu dans la console ou où vous souhaitez l'afficher
            console.log(data);

            // Si vous voulez afficher le contenu dans un élément spécifique, par exemple, avec une classe 'allContent-section'
            $('.allContent-section').html(data);
        },
        error: function(xhr, status, error) {
            // Gérez les erreurs ici
            console.error("Erreur lors de la récupération des données :", status, error);
        }
    });
}

</script>

