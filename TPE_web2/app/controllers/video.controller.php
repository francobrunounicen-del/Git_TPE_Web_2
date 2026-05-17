<?php
require_once __DIR__ . '/../models/video.model.php';
require_once __DIR__ . '/../views/video.view.php';
require_once __DIR__ . '/../views/error.view.php';

class VideoController {
    private $model;
    private $view;
    private $errorView;

    public function __construct() {
        $this->model = new VideoModel();
        $this->view = new VideoView();
        $this->errorView = new ErrorView();
    }

    public function mostrarVideo($id){
        if($id==null){
            $this->mostrarAllVideo();
        }
        else{
            $this->mostrarVideoById($id);
        }
    }

    public function mostrarAllVideo() {
        $videos = $this->model->getAll();
        $this->view->renderVideos($videos);
    }

    public function mostrarVideoById($id) {
        $video = $this->model->get($id);
        if ($video === null) {
            return $this->errorView->renderError("Video no encontrado");
        }
        $this->view->renderVideo($video);
    }

    public function showFormVideo(){
        $this->view->showFormVideo();
    }

    public function agregarVideo() {
        if (
            empty($_POST["titulo"]) ||
            empty($_POST["autor"]) ||
            empty($_POST["descripcion"]) ||
            empty($_POST["duracion"]) ||
            empty($_POST["fecha_publicacion"]) ||
            empty($_POST["url"]) ||
            empty($_POST["id_categoria"])
        ) {
            return $this->errorView->renderError("Faltan datos para agregar el video.");
        }
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $descripcion = $_POST["descripcion"];
        $duracion = $_POST["duracion"];
        $fecha_publicacion = $_POST["fecha_publicacion"];
        $url = $_POST["url"];
        $id_categoria = $_POST["id_categoria"];
        $id = $this->model->insert(
            $titulo,
            $autor,
            $descripcion,
            $duracion,
            $fecha_publicacion,
            $url,
            $id_categoria
        );
        if (!$id) {
            return $this->errorView->renderError("No se pudo agregar el video.");
        }
        header("Location: " . BASE_URL . "video/" . $id);
    }

    public function eliminarVideo($id) {
        $video = $this->model->get($id);
        if (!$video) {
            return $this->errorView->renderError("El video no existe.");
        }
        $this->model->delete($id);
        header("Location: " . BASE_URL . "video");
    }

    public function showEditForm($id){
        $video = $this->model->get($id);
        if(!$video){
            return $this->errorView->renderError("Video no encontrado");
        }
        $this->view->renderEditForm($video);
    }

    public function actualizarVideo($id){
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $descripcion = $_POST["descripcion"];
        $duracion = $_POST["duracion"];
        $fecha_publicacion = $_POST["fecha_publicacion"];
        $url = $_POST["url"];
        $id_categoria = $_POST["id_categoria"];
        $this->model->update(
            $id,
            $titulo,
            $autor,
            $descripcion,
            $duracion,
            $fecha_publicacion,
            $url,
            $id_categoria
        );
        header("Location: " . BASE_URL . "video/" . $id);
    }
}