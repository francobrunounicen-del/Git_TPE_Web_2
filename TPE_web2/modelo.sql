-- Created by Redgate Data Modeler (https://datamodeler.redgate-platform.com)
-- Last modification date: 2026-04-19 16:25:10.199

-- tables
-- Table: Categoria
CREATE TABLE Categoria (
    id_categoria int  NOT NULL,
    nombre varchar(100)  NOT NULL,
    CONSTRAINT Categoria_pk PRIMARY KEY (id_categoria)
);

INSERT INTO Categoria (id_categoria, nombre) VALUES
(1, 'Educacion'),
(2, 'Psicologia'),
(3, 'Motivacion'),
(4, 'Neurociencia'),
(5, 'Bienestar');

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

INSERT INTO Video(id_video, titulo, autor, descripcion, duracion, fecha_publicacion, URL, id_categoria)
VALUES
(1, 'Aprender a aprender', 'Mario Alonso Puig', 'Claves para mejorar el aprendizaje', 28, '2024-01-10', 'https://youtube.com/watch?v=bbva001', 1),
(2, 'La importancia de la inteligencia emocional', 'Daniel Goleman', 'Gestionar emociones en la vida diaria', 32, '2024-01-15', 'https://youtube.com/watch?v=bbva002', 2),
(3, 'Como motivarte cada dia', 'Victor Kuppers', 'Ideas para mantener la motivacion', 24, '2024-01-20', 'https://youtube.com/watch?v=bbva003', 3),
(4, 'El cerebro y la memoria', 'Facundo Manes', 'Como funciona la memoria humana', 30, '2024-01-25', 'https://youtube.com/watch?v=bbva004', 4),
(5, 'Habitos para una vida mejor', 'Marian Rojas Estape', 'Rutinas saludables para bienestar', 27, '2024-02-01', 'https://youtube.com/watch?v=bbva005', 5),
(6, 'Educar con creatividad', 'Ken Robinson', 'La creatividad en la educacion', 35, '2024-02-05', 'https://youtube.com/watch?v=bbva006', 1),
(7, 'Ansiedad y estres', 'Elsa Punset', 'Herramientas para reducir ansiedad', 26, '2024-02-10', 'https://youtube.com/watch?v=bbva007', 2),
(8, 'El poder de la actitud', 'Victor Kuppers', 'Como la actitud cambia resultados', 22, '2024-02-14', 'https://youtube.com/watch?v=bbva008', 3),
(9, 'Neuroplasticidad', 'Facundo Manes', 'Capacidad del cerebro para cambiar', 29, '2024-02-18', 'https://youtube.com/watch?v=bbva009', 4),
(10, 'Dormir mejor', 'Marian Rojas Estape', 'Consejos para mejorar el descanso', 25, '2024-02-22', 'https://youtube.com/watch?v=bbva010', 5),
(11, 'El futuro del aprendizaje', 'Cesar Bona', 'Nuevos desafios educativos', 31, '2024-03-01', 'https://youtube.com/watch?v=bbva011', 1),
(12, 'Gestionar tus emociones', 'Daniel Goleman', 'Autocontrol emocional efectivo', 28, '2024-03-05', 'https://youtube.com/watch?v=bbva012', 2),
(13, 'Superacion personal', 'Alex Rovira', 'Crecer frente a la adversidad', 24, '2024-03-10', 'https://youtube.com/watch?v=bbva013', 3),
(14, 'El cerebro adolescente', 'Facundo Manes', 'Cambios neurologicos en juventud', 30, '2024-03-14', 'https://youtube.com/watch?v=bbva014', 4),
(15, 'La felicidad posible', 'Tal Ben-Shahar', 'Habitos para una vida feliz', 33, '2024-03-20', 'https://youtube.com/watch?v=bbva015', 5),
(16, 'Como enseñar mejor', 'Cesar Bona', 'Estrategias modernas de enseñanza', 27, '2024-03-25', 'https://youtube.com/watch?v=bbva016', 1),
(17, 'Manejo del miedo', 'Elsa Punset', 'Entender y gestionar el miedo', 23, '2024-04-01', 'https://youtube.com/watch?v=bbva017', 2),
(18, 'La fuerza del entusiasmo', 'Victor Kuppers', 'Entusiasmo para avanzar', 21, '2024-04-05', 'https://youtube.com/watch?v=bbva018', 3),
(19, 'Atencion y concentracion', 'Facundo Manes', 'Mejorar foco mental', 26, '2024-04-10', 'https://youtube.com/watch?v=bbva019', 4),
(20, 'Vivir con equilibrio', 'Marian Rojas Estape', 'Balance entre cuerpo y mente', 29, '2024-04-15', 'https://youtube.com/watch?v=bbva020', 5);
-- foreign keys
-- Reference: Video_Categoria (table: Video)
ALTER TABLE Video ADD CONSTRAINT Video_Categoria FOREIGN KEY Video_Categoria (id_categoria)
    REFERENCES Categoria (id_categoria);

-- End of file.

