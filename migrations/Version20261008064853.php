<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261008064853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appel (id_appel INT AUTO_INCREMENT NOT NULL, date_appel DATE NOT NULL, horodatage_validation DATETIME DEFAULT NULL, verrouille TINYINT DEFAULT 0 NOT NULL, id_creneau INT NOT NULL, INDEX idx_appel_date (date_appel), UNIQUE INDEX uq_appel_creneau_date (id_creneau, date_appel), INDEX IDX_130D3BD27FB222F (id_creneau), PRIMARY KEY (id_appel)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE classe (id_classe INT AUTO_INCREMENT NOT NULL, nom_classe VARCHAR(20) NOT NULL, niveau VARCHAR(20) NOT NULL, UNIQUE INDEX uq_classe_nom (nom_classe), PRIMARY KEY (id_classe)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE consultation (id_consultation INT AUTO_INCREMENT NOT NULL, date_heure_consultation DATETIME NOT NULL, autorisee TINYINT DEFAULT 1 NOT NULL, id_utilisateur INT NOT NULL, id_eleve INT NOT NULL, INDEX idx_consultation_eleve (id_eleve), INDEX IDX_964685A650EAE44 (id_utilisateur), PRIMARY KEY (id_consultation)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE creneau (id_creneau INT AUTO_INCREMENT NOT NULL, jour_semaine SMALLINT NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, id_classe INT NOT NULL, id_utilisateur_enseignant INT NOT NULL, INDEX IDX_F9668B5FA9B00A7B (id_classe), INDEX IDX_F9668B5FB3CE5A20 (id_utilisateur_enseignant), PRIMARY KEY (id_creneau)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE eleve (id_eleve INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, date_naissance DATE DEFAULT NULL, id_classe INT NOT NULL, INDEX IDX_ECA105F7A9B00A7B (id_classe), PRIMARY KEY (id_eleve)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE presence (id_presence INT AUTO_INCREMENT NOT NULL, statut VARCHAR(10) NOT NULL, duree_retard SMALLINT DEFAULT NULL, justifie TINYINT DEFAULT NULL, motif VARCHAR(255) DEFAULT NULL, date_qualification DATETIME DEFAULT NULL, id_appel INT NOT NULL, id_eleve INT NOT NULL, id_utilisateur_qualifiant INT DEFAULT NULL, INDEX idx_presence_statut (statut), UNIQUE INDEX uq_presence_appel_eleve (id_appel, id_eleve), INDEX IDX_6977C7A5EFB5928D (id_appel), INDEX IDX_6977C7A522444C7 (id_eleve), INDEX IDX_6977C7A5B8AFC592 (id_utilisateur_qualifiant), PRIMARY KEY (id_presence)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE utilisateur (id_utilisateur INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, mdp_hash VARCHAR(255) NOT NULL, role VARCHAR(20) NOT NULL, UNIQUE INDEX uq_utilisateur_email (email), PRIMARY KEY (id_utilisateur)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE appel ADD CONSTRAINT FK_130D3BD27FB222F FOREIGN KEY (id_creneau) REFERENCES creneau (id_creneau) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A650EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A622444C7 FOREIGN KEY (id_eleve) REFERENCES eleve (id_eleve) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE creneau ADD CONSTRAINT FK_F9668B5FA9B00A7B FOREIGN KEY (id_classe) REFERENCES classe (id_classe) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE creneau ADD CONSTRAINT FK_F9668B5FB3CE5A20 FOREIGN KEY (id_utilisateur_enseignant) REFERENCES utilisateur (id_utilisateur) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7A9B00A7B FOREIGN KEY (id_classe) REFERENCES classe (id_classe) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A5EFB5928D FOREIGN KEY (id_appel) REFERENCES appel (id_appel) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A522444C7 FOREIGN KEY (id_eleve) REFERENCES eleve (id_eleve) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A5B8AFC592 FOREIGN KEY (id_utilisateur_qualifiant) REFERENCES utilisateur (id_utilisateur) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appel DROP FOREIGN KEY FK_130D3BD27FB222F');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A650EAE44');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A622444C7');
        $this->addSql('ALTER TABLE creneau DROP FOREIGN KEY FK_F9668B5FA9B00A7B');
        $this->addSql('ALTER TABLE creneau DROP FOREIGN KEY FK_F9668B5FB3CE5A20');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7A9B00A7B');
        $this->addSql('ALTER TABLE presence DROP FOREIGN KEY FK_6977C7A5EFB5928D');
        $this->addSql('ALTER TABLE presence DROP FOREIGN KEY FK_6977C7A522444C7');
        $this->addSql('ALTER TABLE presence DROP FOREIGN KEY FK_6977C7A5B8AFC592');
        $this->addSql('DROP TABLE appel');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE creneau');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE presence');
        $this->addSql('DROP TABLE utilisateur');
    }
}
