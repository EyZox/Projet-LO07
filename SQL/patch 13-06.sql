ALTER TABLE  `trajet` CHANGE  `conducteur`  `conducteur` INT( 11 ) NOT NULL;

	
CREATE TRIGGER `update_individu_note_ajout` AFTER INSERT ON  `avis` 
FOR EACH
ROW UPDATE individu SET note = ( SELECT AVG( note ) 
FROM avis
WHERE evalue = individu.id ) 
WHERE individu.id = NEW.evalue;