 <?php
require_once __DIR__ . '/../models/categoria.model.php';
require_once __DIR__ . '/../models/video.model.php';
require_once __DIR__ . '/../views/categoria.view.php';
require_once __DIR__ . '/../views/error.view.php';

class CategoriaController {
    private $model;
    private $modelVideo;
    private $view;
    private $errorView;

    public function __construct() {
        $this->model = new CategoriaModel();
        $this->modelVideo= new VideoModel();
        $this->view = new CategoriaView();
        $this->errorView = new ErrorView();
    }

    public function mostrarCategoria($id){
        if($id==null){
            $this->mostrarAllCategoria();
        }
        else{
            $this->mostrarCategoriaById($id);
        }
    }
    
    public function mostrarAllCategoria() {
        $categorias = $this->model->getAll();
        $this->view->renderCategorias($categorias);
    }
    
    public function mostrarCategoriaById($id = null) {
        $videos = $this->model->getVideosByCategoria($id);
        if (!$videos) {
            return $this->errorView->renderError("No hay videos en esa categoría");
        }
        $this->view->renderVideosPorCategoria($videos);
    }

    public function showFormCategoria(){
        $this->view->showFormCategoria();
    }
    
    public function agregarCategoria() {
        if (empty($_POST["nombre"])) {
            return $this->errorView->renderError("Falta el nombre de la categoría.");
        }
        $nombre = $_POST["nombre"];
        $id = $this->model->insert($nombre);
        if (!$id) {
            return $this->errorView->renderError("No se pudo agregar la categoría.");
        }
        header("Location: " . BASE_URL . "categoria");
    }

    public function eliminarCategoria($id){
        $categoria = $this->model->get($id);
        if(!$categoria){
            return $this->errorView->renderError("La categoría no existe.");
        }
        $cantidad = $this->modelVideo->getCantidadVideos($id);
        if($cantidad > 0){
            return $this->errorView->renderError("La categoría posee videos asociados.");
        }
        $this->model->delete($id);
        header("Location: " . BASE_URL . "categoria");
    }

    public function showEditFormCategoria($id){
        $categoria = $this->model->get($id);
        if(!$categoria){
            return $this->errorView->renderError("Categoria no encontrado");
        }
        $this->view->renderEditFormCategoria($categoria);
    }

    public function actualizarCategoria($id){
        if (empty($_POST["nombre"])) {
            return $this->errorView->renderError("Falta el nombre de la categoría.");
        }
        $nombre = $_POST["nombre"];
        $filas = $this->model->update($id, $nombre);
        if ($filas == 0) {
            return $this->errorView->renderError("No se pudo actualizar la categoría.");
        }
        header("Location: " . BASE_URL . "categoria");
    }
}