ALTER TABLE  `message` ADD  `titre` VARCHAR( 255 ) NULL DEFAULT NULL AFTER  `destinataire`
ALTER TABLE `trajet` DROP `depart`
ALTER TABLE  `trajet` CHANGE  `depart`  `depart` DATETIME NOT NULL
ALTER TABLE  `trajet` CHANGE  `conducteur`  `conducteur` INT( 11 ) NOT NULL