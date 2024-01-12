<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';
Use Models\User;
use DB;


Class LoginController {

  public static function logIn(){
            if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $db=DB::getDB();
            $allUsers=User::getAllUsers($db);
                
            foreach ($allUsers as $user){
                if ($user['mail']==$email && $user['password']==$password){
                    $_SESSION['firstName'] = $user['firstName'];
                    $_SESSION['lastName'] = $user['lastName'];
                    $_SESSION['email'] = $user['mail'];
                    $_SESSION['auth']= true;
                    $_SESSION['id']=$user['idUser'];
                    
                    header('Location: /index.php?url=dashboard');
                }
                else{
                    echo'Mauvaises Informations';
                }
            } 
        } 
        else{
            echo'Veuillez remplir les informations';
        }
        }

    public static function show(){

        include ('../views/auth/login.php');
        exit;
    }

}

