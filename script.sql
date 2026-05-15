CREATE DATABASE IF NOT EXISTS bibliotheque_clery;
USE bibliothèque_cléry;

CREATE TABLE utilisateur (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telephone VARCHAR(20),
    adresse TEXT,
    date_naissance DATE NOT NULL,
    bibliotheque_id INT,  -- id du sport
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('actif', 'inactif') DEFAULT 'actif'
);

CREATE TABLE auteur (
  id_auteur INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  prenom VARCHAR(100),
  date_naissance DATE
);

CREATE TABLE genre (
  id_genre INT AUTO_INCREMENT PRIMARY KEY,
  libelle VARCHAR(50) NOT NULL
);

CREATE TABLE livre (
    id_livre INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(200) NOT NULL,
    annee_publication INT,
    id_auteur INT,
    id_genre INT,
    disponible BOOLEAN DEFAULT TRUE,
  FOREIGN KEY (id_auteur) REFERENCES auteur(id_auteur)
    ON DELETE SET NULL ON UPDATE CASCADE,
  FOREIGN KEY (id_genre) REFERENCES genre(id_genre)
    ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE emprunt (
  id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
  id_utilisateur INT NOT NULL,
  id_livre INT NOT NULL,
  date_emprunt DATETIME DEFAULT CURRENT_TIMESTAMP,
  date_retour_prevue DATETIME NOT NULL,
  date_retour_effective DATETIME,
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_livre) REFERENCES livre(id_livre)
    ON DELETE CASCADE ON UPDATE CASCADE
);



INSERT INTO utilisateur (nom, prenom, email, telephone, adresse, date_naissance)
VALUES ('Dupont', 'Jean', 'jean@exemple.com', '0123456789', '29 avenue du parc aux biches', '1980-01-20');

INSERT INTO auteur (nom, prenom, date_naissance)
VALUES ('Hugo', 'Victor', '1802-02-26');

INSERT INTO genre (libelle)
VALUES ('Roman'); 

INSERT INTO livre (titre, annee_publication, id_auteur, id_genre)
VALUES ('Les Misérables', 1862, 1, 1);

INSERT INTO emprunt (id_utilisateur, id_livre, date_retour_prevue)
VALUES (1, 1, '2026-06-01');