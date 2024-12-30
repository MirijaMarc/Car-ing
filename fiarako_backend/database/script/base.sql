CREATE DATABASE fiarako;

CREATE TABLE utilisateurs(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(255) NOT NULL,
    etat INTEGER NOT NULL CHECK(etat IN (0, 1))
);


CREATE TABLE marques (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    etat INTEGER NOT NULL CHECK(etat IN (0, 1))
);

CREATE TABLE modeles (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    etat INTEGER NOT NULL CHECK(etat IN (0, 1)),
    marque_id INTEGER NOT NULL,
    FOREIGN KEY (marque_id) REFERENCES marques(id)
);

CREATE TABLE carburants (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    etat INTEGER NOT NULL CHECK(etat IN (0, 1))
);

CREATE TABLE boites (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    etat INTEGER NOT NULL CHECK(etat IN (0, 1))
);

CREATE TABLE couleurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    etat INTEGER NOT NULL CHECK(etat IN (0, 1))
);

CREATE TABLE annonces (
    id SERIAL PRIMARY KEY,
    immatriculation VARCHAR(255) NOT NULL,
    annee INTEGER NOT NULL,
    kilometrage INTEGER NOT NULL,
    prix DECIMAL NOT NULL,
    statut INTEGER NOT NULL,
    climatisation INTEGER NOT NULL,
    etat INTEGER NOT NULL,
    modele_id INTEGER NOT NULL,
    carburant_id INTEGER NOT NULL,
    boite_id INTEGER NOT NULL,
    couleur_id INTEGER NOT NULL,
    utilisateur_id INTEGER NOT NULL,
    FOREIGN KEY (modele_id) REFERENCES modeles(id),
    FOREIGN KEY (carburant_id) REFERENCES carburants(id),
    FOREIGN KEY (boite_id) REFERENCES boites(id),
    FOREIGN KEY (couleur_id) REFERENCES couleurs(id),
    FOREIGN KKEY (utilisateur_id) REFERENCES utilisateurs(id)
);

CREATE TABLE images (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    etat INTEGER NOT NULL CHECK(etat IN (0, 1)),
    annonce_id INTEGER NOT NULL,
    FOREIGN KEY (annonce_id) REFERENCES annonces(id)
);

CREATE TABLE favoris (
    id SERIAL PRIMARY KEY,
    utilisateur_id INTEGER NOT NULL,
    annonce_id INTEGER NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (annonce_id) REFERENCES annonces(id)
);


CREATE TABLE offres (
    id SERIAL PRIMARY KEY,
    prix DECIMAL NOT NULL,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(255) NOT NULL,
    etat INTEGER NOT NULL,
    annonce_id INTEGER NOT NULL,
    FOREIGN KEY (annonce_id) REFERENCES annonces(id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
);


