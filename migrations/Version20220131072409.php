<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220131072409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rasgo (id INT AUTO_INCREMENT NOT NULL, tipoaccion_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, INDEX IDX_67AC8374C74E4DDC (tipoaccion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rasgo ADD CONSTRAINT FK_67AC8374C74E4DDC FOREIGN KEY (tipoaccion_id) REFERENCES tipo_accion (id)');
        $this->addSql('ALTER TABLE personaje CHANGE autor_id autor_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rasgo');
        $this->addSql('ALTER TABLE personaje CHANGE autor_id autor_id INT NOT NULL');
    }
}
