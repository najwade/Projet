<div>
    <!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="../css/style.css"></link>
       <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>
</head>
<body >
    
        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
           
            include_once "../BD/connection.php";
        ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:blak;">Professeur</h4>
                    <h5 style="color:black;">
                    <?php
                        $sql="SELECT * from professeur";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:black;">Module</h4>
                    <h5 style="color:black;">
                    <?php
                       
                       $sql="SELECT * from module";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:black;">Semester</h4>
                    <h5 style="color:black;">
                    <?php
                       
                       $sql="SELECT * from semestre";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:black;">charge</h4>
                    <h5 style="color:black;">
                    <?php
                       
                       $sql="SELECT * from charge";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
        </div>
        
    </div>
       
            
        <?php
            if (isset($_GET['prof']) && $_GET['prof'] == "success") {
                echo '<script> alert("prof Successfully Added")</script>';
            }else if (isset($_GET['prof']) && $_GET['prof'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
          
            if (isset($_GET['Module']) && $_GET['Module'] == "success") {
                echo '<script> alert("Size Successfully Added")</script>';
            }else if (isset($_GET['Module']) && $_GET['Module'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['Filier']) && $_GET['Filier'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['Filier']) && $_GET['Filier'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['semester']) && $_GET['semester'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['semester']) && $_GET['semester'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }

            if (isset($_GET['session']) && $_GET['session'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['session']) && $_GET['session'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            
            if (isset($_GET['charge']) && $_GET['charge'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['charge']) && $_GET['charge'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
        ?>

        
    <script type="text/javascript" src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>
</div>