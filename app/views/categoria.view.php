<?php
class CategoriaView {
    
    public function renderCategorias($categorias) {
        require_once __DIR__ . '/../../app/templates/layout/header.php';
        ?>
        <main class="container mt-5">
            <section class="categoria">
                <h1>Categoría</h1>`
                <section>
                    <?php if(isset($_SESSION["id"])) { ?>
                    <a href="form_categoria">Agregar Categoria</a>
                    <?php } ?>
                </section>
                <section class="categoria">
                    <ul>
                        <?php foreach($categorias as $categoria) { ?>
                        <li>
                            <a href="categoria/<?= $categoria->id_categoria ?>">
                                <?= $categoria->nombre ?>
                            </a>
                            <?php if(isset($_SESSION["id"])) { ?>
                                <a href="<?= BASE_URL ?>eliminar_categoria/<?= $categoria->id_categoria ?>">
                                    Eliminar
                                </a>
                                <a href="<?= BASE_URL ?>editar_categoria/<?= $categoria->id_categoria ?>">
                                    Actualizar
                                </a>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                </section>
                </div>
            </section>
        </main>
        <?php
        require_once __DIR__ . '/../../app/templates/layout/footer.php';
    }

    public function renderVideosPorCategoria($videos){
        require_once __DIR__ . '/../../app/templates/layout/header.php';
        ?>
        <main class="container mt-5">
            <section class="categoria">
                <h1>Categoría</h1>
                <section class="categoria">
                    <?php foreach ($videos as $video) { ?>
                    <div class="card">
                        <div class="card-body">
                            <h5><?= $video->titulo ?></h5>
                            <p>Autor: <?= $video->autor ?></p>
                            <p>Categoría: <?= $video->nombre ?></p>
                            <a href="video/<?= $video->id_video ?>">
                                Ver detalle
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </section>
                </div>
            </section>
        </main>
        <?php
        require_once __DIR__ . '/../../app/templates/layout/footer.php';
    }

    public function showFormCategoria(){
        require_once __DIR__ . '/../../app/templates/layout/header.php';
        require_once __DIR__ . '/../../app/templates/form_categoria.phtml';
        require_once __DIR__ . '/../../app/templates/layout/footer.php';
    }

    public function renderEditFormCategoria($categoria){
        require_once __DIR__ . '/../../app/templates/layout/header.php';
        require_once __DIR__ . '/../../app/templates/form_edit_categoria.phtml';
        require_once __DIR__ . '/../../app/templates/layout/footer.php';
    }
}