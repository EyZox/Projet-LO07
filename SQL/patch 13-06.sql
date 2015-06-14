ALTER TABLE  `message` ADD  `titre` VARCHAR( 255 ) NULL DEFAULT NULL AFTER  `destinataire`;
ALTER TABLE `trajet` DROP `depart`;
ALTER TABLE  `trajet` CHANGE  `depart`  `depart` DATETIME NOT NULL;
ALTER TABLE  `trajet` CHANGE  `conducteur`  `conducteur` INT( 11 ) NOT NULL;
ALTER TABLE  `trajet` ADD  `prix` INT NOT NULL DEFAULT  '0' AFTER  `place`;
ALTER TABLE  `trajet` ADD  `effectue` BOOLEAN NOT NULL DEFAULT FALSE AFTER  `prix`;
ALTER TABLE  `individu` ADD  `note` INT NULL DEFAULT NULL AFTER  `solde`;

CREATE TABLE avis
(
    trajet INT NOT NULL,
    evaluateur INT NOT NULL,
    evalue INT NOT NULL,
    note INT NOT NULL,
    avis TEXT,
    PRIMARY KEY(trajet, evaluateur, evalue),
    FOREIGN KEY (trajet) 
        REFERENCES trajet(id)
        ON DELETE CASCADE,
    FOREIGN KEY (evaluateur) 
        REFERENCES individu(id)
        ON DELETE CASCADE,
    FOREIGN KEY (evalue) 
        REFERENCES individu(id)
        ON DELETE CASCADE
);
	
CREATE TRIGGER `update_individu_note_ajout` AFTER INSERT ON  `avis` 
FOR EACH
ROW UPDATE individu SET note = ( SELECT AVG( note ) 
FROM avis
WHERE evalue = individu.id ) 
WHERE individu.id = NEW.evalue;