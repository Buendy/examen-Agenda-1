<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 30/12/18
 * Time: 17:38
 */

namespace Mini\Controller;
Use Mini\Core\Controller;
Use Mini\Core\Validacion;
Use Mini\Model\User;
Use Mini\Libs\Dbpdo;



class UserController extends Controller
{

    public function login()
    {
        $errores = [];
        if(!isset($_SESSION['userConSesionIniciada']['id'])){
            if(!$_POST){
                echo $this->view->render("/user/login");
            }else{

                if(Validacion::checkField() != null){
                    Validacion::formateaDatos($_POST['initname']);
                    $errores['inituser']=Validacion::checkField();
                };

                if(Validacion::checkPass() != null){
                    Validacion::formateaDatos($_POST['pass']);
                    $errores['pass']=Validacion::checkPass();

                };


                if(!$errores){
                    if(Validacion::checkRep('users', 'email', $_POST['initname'], 'password', $_POST['pass']) != null){
                        $errores['inituser']= Validacion::checkRep('users', 'email', $_POST['initname'], 'password', $_POST['pass']);
                    };
                }



                if ($errores) {
                    echo $this->view->render("/user/login", ["errores" => $errores]);
                } else {

                    $query = new User();
                    $user = $query->allFields('users', 'email', $_POST['initname']);
                    $_SESSION['userConSesionIniciada']['id'] = $user['id'];
                    $_SESSION['userConSesionIniciada']['email'] = $user['email'];
                    echo $this->view->render("/partials/login-succes");

                }

            }

        }else{

            echo $this->view->render("/error/error-login");
        }
    }

    public function logout()
    {
        session_destroy();
        echo $this->view->render("/partials/logout");
    }


    public function create()
    {
        if(isset($_SESSION['userConSesionIniciada']['id'])){
            echo $this->view->render("/error/error-init");
        }else {

            $errores = [];
            if(!$_POST){
              echo $this->view->render("/user/create");
            }else {
                $repeat = new Dbpdo();
                $validaciones = new Validacion();


                if (empty($_POST['first_name'])) {
                    $errores['first_name'] = 'No he recibido el nombre';
                } else {
                    Validacion::formateaDatos($_POST['first_name']);
                    $value = $validaciones->validaNombre($_POST['first_name']);
                    if ($value) {
                        $errores['first_name'] = $value;
                    }
                }

                if (empty($_POST['last_name'])) {
                    $errores['last_name'] = 'No he recibido los apellidos';
                } else {
                    Validacion::formateaDatos($_POST['last_name']);
                    $value = $validaciones->validaApellidos($_POST['last_name']);
                    if ($value) {
                        $errores['last_name'] = $value;
                    }
                }


                if (empty($_POST['email'])) {
                    $errores['email'] = 'No he recibido el email';
                } else {
                    Validacion::formateaDatos($_POST['email']);
                    $value = $validaciones->validaEmail($_POST['email']);
                    if ($value) {
                        $errores['email'] = $value;
                    }
                    if ($check = $repeat->checkRepeat('users', 'email', $_POST['email'])) {
                        $errores['email'] = 'Ese email ya existe';
                    }
                }

                if(empty($_POST['pass1']) || empty($_POST['pass2'])){
                    $errores['pass'] = 'No he recibido ambas claves<br>';
                } else {
                    Validacion::formateaDatos('pass1');
                    Validacion::formateaDatos('pass2');
                    $value = $validaciones->validaPass($_POST['pass1'], $_POST['pass2']);
                    if($value){
                        $errores['pass'] = $value;
                    }

                }

                if($errores){
                    echo $this->view->render("/user/create", ['errores' => $errores]);
                }else{
                    d($_POST);
                    $insert = new User();
                    $insert->insert(['first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'], 'email' => $_POST['email'], 'password' => md5($_POST['pass1'])]);
                    echo $this->view->render("/user/user-success");
                }

            }



        }

    }



}