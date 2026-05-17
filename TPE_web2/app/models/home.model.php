<?php

class HomeModel {
    private $db;

    public function __construct (){
        $this->db = new PDO ('mysql:host=localhost;dbname=catalogo_bbva;charset=utf8', 'root', '');
    }
}