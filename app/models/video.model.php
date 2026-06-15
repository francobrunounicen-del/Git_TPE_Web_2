<?php
class VideoModel {
    private $db;
    public function __construct (){
        $this->db = new PDO ('mysql:host=localhost;dbname=catalogo_bbva;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare('SELECT v.*, c.nombre
                                    FROM video v
                                    JOIN categoria c
                                    ON v.id_categoria = c.id_categoria
                                    ');
        $query->execute ();
        $video = $query->fetchAll (PDO::FETCH_OBJ) ;
        return $video;
    }

    public function get($id) {
        $query = $this->db->prepare('SELECT v.*, c.nombre
                                    FROM video v
                                    JOIN categoria c
                                    ON v.id_categoria = c.id_categoria
                                    WHERE v.id_video = ?
                                    ');
        $query->execute ([$id]);
        $video = $query->fetch (PDO::FETCH_OBJ) ;
        return $video;
    }

    public function insert(
                            $titulo,
                            $autor,
                            $descripcion,
                            $duracion,
                            $fecha_publicacion,
                            $url,
                            $id_categoria){
        $query = $this->db->prepare("INSERT INTO video
                                    (titulo, autor, descripcion, duracion, fecha_publicacion, url, id_categoria)
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->execute([
                        $titulo,
                        $autor,
                        $descripcion,
                        $duracion,
                        $fecha_publicacion,
                        $url,
                        $id_categoria]);
        return $this->db->lastInsertId();
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM video WHERE id_video = ?");
        $query->execute([$id]);
        return $query->rowCount();
    }

    public function update(
        $id,
        $titulo,
        $autor,
        $descripcion,
        $duracion,
        $fecha_publicacion,
        $url,
        $id_categoria){
        $query = $this->db->prepare("UPDATE video
                                    SET titulo = ?, autor = ?, descripcion = ?, duracion = ?,
                                    fecha_publicacion = ?, url = ?, id_categoria = ?
                                    WHERE id_video = ?
        ");
        $query->execute([
            $titulo,
            $autor,
            $descripcion,
            $duracion,
            $fecha_publicacion,
            $url,
            $id_categoria,
            $id
        ]);
    }

    public function getCantidadVideos($id_categoria){
        $query = $this->db->prepare(" SELECT COUNT(*) FROM video WHERE id_categoria = ?");
        $query->execute([$id_categoria]);
        return $query->fetchColumn();
    }

}

