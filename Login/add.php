<?php
session_start();
include_once('../BD/connection.php');
// Inclure les fichiers PHPMailer
require '../phpmailer/src/PHPMailer.php'; // Vous avez besoin uniquement de PHPMailer.php et SMTP.php
require '../phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$errors = []; // Initialisez un tableau pour stocker les erreurs

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $confirm_password = $_POST['confirm_password'];
    
    // Ajout de la colonne `role` avec la valeur par défaut "user"
    $role = "user";

    // Vérification de l'unicité de l'email
    $check_email_query = "SELECT * FROM `users` WHERE `email`='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);
    if(mysqli_num_rows($check_email_result) > 0) {
        $errors['email_exists'] = "Email existe déjà.";
    }

    // Validation du champ de confirmation de mot de passe
    if(empty($confirm_password)) {
        $errors['confirm_password'] = "Le champ Confirmation du mot de passe est requis.";
    } elseif ($pass !== md5($confirm_password)) {
        $errors['confirm_password'] = "Les mots de passe ne correspondent pas.";
    }

    if(empty($errors)) {
        // Modification de la requête SQL pour inclure la colonne `role`
        $sql = "INSERT INTO `users`(`nom`, `prenom`, `email`, `password`, `role`) VALUES ('$name','$prenom','$email','$pass','$role')";
        
        $result = mysqli_query($conn, $sql);
        if($result){
            // Pas besoin de réimporter Exception.php ici
            
            $mail = new PHPMailer(true);
            
            $mail->isSMTP();
            $mail->Host ='smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username ='najwahimri12@gmail.com';
            $mail->Password = 'ogpy lskc wbma wqgu';
            $mail ->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                
            $mail->setFrom('najwahimri12@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Confirmation de votre inscription";
            $mail->Body = "Cliquez sur le lien suivant pour confirmer votre inscription : http://localhost/Projet/index.php" ;
            
            if($mail->send()){
                echo "<script>alert('Email de confirmation envoyé avec succès');</script>";
            } else {
                echo "<script>alert('Erreur lors de l'envoi de l'email de confirmation');</script>";
            }
            
            header('Location: register.php');
            exit;
        } else {
            $errors['registration_failed'] = "Échec de l'enregistrement.";
            $_SESSION['errors'] = $errors; // Stockez les erreurs dans une variable de session
            header('location:register.php'); // Redirection vers la page d'inscription
            exit;
        }
    }

    // Redirigez vers la page d'inscription en cas d'erreur ou de succès
    header('location:register.php');
    exit;
}
?>
