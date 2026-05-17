<?php
//require_once __DIR__ . '/mock_data.php';

class CategoriaModel {
    private $db;

    public function __construct (){
        $this->db = new PDO ('mysql:host=localhost;dbname=catalogo_bbva;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare ('SELECT * FROM categoria') ;
        $query->execute ();
        $categoria = $query->fetchAll(PDO::FETCH_OBJ) ;
        return $categoria;
    }

    public function getVideosByCategoria($id) {
        $query = $this->db->prepare("SELECT v.*, c.nombre
                                    FROM Video v
                                    JOIN Categoria c
                                    ON v.id_categoria = c.id_categoria
                                    WHERE c.id_categoria = ?
                                     ");
        $query->execute ([$id]);
        $videos = $query->fetchAll(PDO::FETCH_OBJ) ;
        return $videos;
    }

   public function insert($nombre){
        $query = $this->db->prepare("
            INSERT INTO Categoria (nombre)
            VALUES (?)
        ");
        $query->execute([$nombre]);
        return $this->db->lastInsertId();
    }

    public function delete ($id){
        $query = $this->db->prepare ('DELETE FROM Categoria WHERE id_categoria = ?') ;
        $query->execute ([$id]);
        return $query->rowCount();
    }

    public function get($id){
        $query = $this->db->prepare("
            SELECT *
            FROM Categoria
            WHERE id_categoria = ?
        ");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function update($id, $nombre){
        $query = $this->db->prepare("UPDATE Categoria
                                    SET nombre = ?
                                    WHERE id_categoria = ?
                                 ");
            $query->execute([
            $nombre,
            $id
        ]);
        return $query->rowCount();
    }
}