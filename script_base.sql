CREATE DATABASE crud_filmes;
use crud_filmes;

CREATE TABLE generos ( 
  id int AUTO_INCREMENT NOT NULL, 
  gen varchar(70) NOT NULL,
  CONSTRAINT pk_generos PRIMARY KEY (id) 
);

/* INSERTs generos */
INSERT INTO generos (gen) VALUES ('Comédia');
INSERT INTO generos (gen) VALUES ('Ação');
INSERT INTO generos (gen) VALUES ('Suspense');
INSERT INTO generos (gen) VALUES ('Romance');
INSERT INTO generos (gen) VALUES ('Drama');
INSERT INTO generos (gen) VALUES ('Ficção');
INSERT INTO generos (gen) VALUES ('Musical');


CREATE TABLE paises ( 
  id int AUTO_INCREMENT NOT NULL, 
  pais varchar(70) NOT NULL,
  CONSTRAINT pk_pais PRIMARY KEY (id) 
);

/* INSERTs Paises */
INSERT INTO paises (pais) VALUES ('Brasil');
INSERT INTO paises (pais) VALUES ('USA');
INSERT INTO paises (pais) VALUES ('Japão');
INSERT INTO paises (pais) VALUES ('Índia');
INSERT INTO paises (pais) VALUES ('Inglaterra');
INSERT INTO paises (pais) VALUES ('China');
INSERT INTO paises (pais) VALUES ('Coréia-do-Sul');

CREATE TABLE filmes (
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL, 
  anoLancamento int NOT NULL,
  diretor varchar(100) NOT NULL,
  id_genero int NOT NULL, 
  id_pais int NOT NULL,
  CONSTRAINT pk_filmes PRIMARY KEY (id)
);
ALTER TABLE filmes ADD CONSTRAINT fk_genero FOREIGN KEY (id_genero) REFERENCES generos (id);
ALTER TABLE filmes ADD CONSTRAINT fk_pais FOREIGN KEY (id_pais) REFERENCES paises (id);

INSERT INTO `filmes` (`id`, `nome`, `anoLancamento`, `diretor`, `id_genero`, `id_pais`) VALUES
(2, 'O Iluminado', 1980, 'Stanley Kubrick', 3, 2),
(4, 'Parasita', 2019, 'Bong Joon-ho', 3, 7),
(5, 'Hellboy', 2019, 'Guillermo Del Toro', 2, 5),
(6, 'Tropa de Elite', 2007, 'José Padilha', 2, 1),
(7, 'Noiva e Preconceito', 2004, 'Gurinder Chadha', 4, 4);