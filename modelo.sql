-- Created by Redgate Data Modeler (https://datamodeler.redgate-platform.com)
-- Last modification date: 2026-04-19 16:25:10.199

-- tables
-- Table: Categoria
CREATE TABLE Categoria (
    id_categoria int  NOT NULL,
    nombre varchar(100)  NOT NULL,
    CONSTRAINT Categoria_pk PRIMARY KEY (id_categoria)
);

-- Table: Video
CREATE TABLE Video (
    id_video int  NOT NULL,
    titulo varchar(100)  NOT NULL,
    autor varchar(100)  NOT NULL,
    descripcion varchar(100)  NOT NULL,
    duracion int  NOT NULL,
    fecha_publicacion date  NOT NULL,
    URL varchar(100)  NOT NULL,
    id_categoria int  NOT NULL,
    CONSTRAINT Video_pk PRIMARY KEY (id_video)
);

-- foreign keys
-- Reference: Video_Categoria (table: Video)
ALTER TABLE Video ADD CONSTRAINT Video_Categoria FOREIGN KEY Video_Categoria (id_categoria)
    REFERENCES Categoria (id_categoria);

-- End of file.

