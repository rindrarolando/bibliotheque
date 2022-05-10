USE bibliotheque;

CREATE TABLE categorie(
    id_categorie INT NOT NULL PRIMARY KEY,
    nom_categorie VARCHAR(40)
);

CREATE TABLE livre (
  id_livre BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_categorie INT,
  intitule_livre VARCHAR(255) NOT NULL,
  auteur_livre VARCHAR(255),
  nb_page INT(3),
  photo VARCHAR(255),
  FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE membre (
    id_membre BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prenom_membre VARCHAR(255),
    nom_membre VARCHAR(255),
    email VARCHAR(255),
    birthday_membre DATE,
    date_inscription DATE,
    statut_membre BOOLEAN 
)ENGINE=InnoDB;

CREATE TABLE emprunt (
    id_emprunt BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_membre BIGINT UNSIGNED NOT NULL,
    id_livre BIGINT UNSIGNED NOT NULL,
    date_emprunt DATE,
    statut BOOLEAN,
    date_remise DATE DEFAULT NULL,
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre),
    FOREIGN KEY (id_livre) REFERENCES livre(id_livre)
)ENGINE=InnoDB;