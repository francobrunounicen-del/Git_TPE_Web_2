<?php
class VideoView {
    public function renderVideos($videos) {
        require_once __DIR__ . '/../../app/templates/layout/header.php';
        ?>        
        <main class="container">
        <h5>Catálogo de Videos</h5>
        <section>
            <?php if(isset($_SESSION["id"])) { ?>
                <a href="form_video">Agregar Video</a>
            <?php } ?>
        </section>
        <section class="videos">
            <?php foreach ($videos as $video) { ?>
                <div class="card">
                    <div class="card-body">
                        <h5><?= $video->titulo ?></h5>
                        <p>Autor: <?= $video->autor ?></p>
                        <p>Categoría: <?= $video->nombre ?></p>
                        <a href="video/<?= $video->id_video ?>">
                            Ver detalle
                        </a>
                        <?php if(isset($_SESSION["id"])) { ?>
                            <a href="<?= BASE_URL ?>eliminar_video/<?= $video->id_video ?>">
                                Eliminar
                             </a>
                            <a href="<?= BASE_URL ?>editar_video/<?= $video->id_video ?>">
                                Actualizar
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </section>
        </main>
        <?php
        require_once __DIR__ . '/../../app/templates/layout/footer.php';
    }

    public function renderVideo($video) {
        require_once __DIR__ . '/../../app/templates/layout/header.php';
        ?>
        <main class="container">
            <h1><?= $video->titulo ?></h1>
            <p>Autor: <?= $video->autor ?></p>
            <p>Categoría: <?= $video->nombre ?></p>
            <p>Descripción: <?= $video->descripcion ?></p>
            <p>Duración: <?= $video->duracion ?> minutos</p>
            <p>Fecha de publicación: <?= $video->fecha_publicacion ?></p>
            <p>
                <a href="<?= $video->url ?>">
                    Ver en YouTube
                </a>
            </p>
        </main>
        <?php
        require_once __DIR__ . '/../../app/templates/layout/footer.php';
    }

    public function showFormVideo(){
        require_once __DIR__ . '/../../app/templates/layout/header.php';
        require_once __DIR__ . '/../../app/templates/form_video.phtml';
        require_once __DIR__ . '/../../app/templates/layout/footer.php';
    }

    public function renderEditForm($video){
        require_once __DIR__ . '/../../app/templates/layout/header.php';
        require_once __DIR__ . '/../../app/templates/form_edit_video.phtml';
        require_once __DIR__ . '/../../app/templates/layout/footer.php';
    }
}