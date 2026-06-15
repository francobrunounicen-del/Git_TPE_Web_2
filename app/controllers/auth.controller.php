<?php
require_once __DIR__ . '/../models/users.model.php';
require_once __DIR__ . '/../views/auth.view.php';
require_once __DIR__ . '/../views/error.view.php';

class AuthController {
    private $model;
    private $view;
    private $errorView;
    
    public function __construct() {
        $this->model = new UsersModel();
        $this->view = new AuthView();
        $this->errorView = new ErrorView();
    }
    
    public function showForm($req){
        $this->view->showForm();
    }

    

    public function login($req){
        //var_dump(password_verify("admin", $hash));
        if(empty($_POST["email"]) || empty($_POST["password"]))
            return $this->view->showForm();

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $this->model->getByEmail($email);
        //var_dump($user);
        //var_dump(password_verify("admin", $user->password));
        //die();

        if(!$user) {
            return $this->errorView->renderError("Usuario o contraseña incorrecta");
        }

        if(!password_verify($password, $user->password)) {
            return $this->errorView->renderError("Usuario o contraseña incorrecta");
        }

        $_SESSION["id"] = $user->id;
        $_SESSION["email"] = $user->email;

        header("Location: ". BASE_URL);
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL );
    }
}