CREATE TABLE individu
(
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(25) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    datenaiss DATE NOT NULL,
    solde INT DEFAULT 0,
    PRIMARY KEY(id)
);

CREATE TABLE vehicule
(
    id INT NOT NULL AUTO_INCREMENT,
    plaque VARCHAR(255) UNIQUE NOT NULL,
    marque VARCHAR(255) NOT NULL,
    modele VARCHAR(255) NOT NULL,
    couleur INT NOT NULL,
    mise_en_serv DATE NOT NULL,
    conducteur INT UNIQUE NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (conducteur) 
        REFERENCES individu(id)
        ON DELETE CASCADE
);

CREATE TABLE trajet
(
    id INT NOT NULL AUTO_INCREMENT,
    arrive DATE NOT NULL,
    depart DATE NOT NULL,
    ville_a VARCHAR(255) NOT NULL,
    ville_d VARCHAR(255) NOT NULL,
    place INT NOT NULL,
    conducteur INT,
    PRIMARY KEY(id),
    FOREIGN KEY (conducteur)
        REFERENCES vehicule(conducteur)
);

CREATE TABLE reservation
(
    trajet INT NOT NULL,
    passager INT NOT NULL,
    PRIMARY KEY(trajet, passager),
    FOREIGN KEY (trajet)
        REFERENCES trajet(id),
    FOREIGN KEY (passager)
        REFERENCES individu(id)
);

CREATE TABLE message
(
    id INT UNIQUE NOT NULL AUTO_INCREMENT,
    expediteur INT,
    destinataire INT,
    content TEXT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (expediteur)
        REFERENCES individu(id),
    FOREIGN KEY (destinataire)
        REFERENCES individu(id)
);

CREATE TABLE admin
(
    login VARCHAR(255) UNIQUE NOT NULL,
    pass VARCHAR(255) UNIQUE NOT NULL,
    PRIMARY KEY(login)
);
