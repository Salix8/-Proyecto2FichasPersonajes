<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220116234949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personaje (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, raza VARCHAR(255) NOT NULL, clase VARCHAR(255) NOT NULL, nivel INT NOT NULL, fuerza INT NOT NULL, destreza INT NOT NULL, constitucion INT NOT NULL, inteligencia INT NOT NULL, sabiduria INT NOT NULL, carisma INT NOT NULL, descripcion VARCHAR(255) NOT NULL, equipamiento VARCHAR(255) NOT NULL, autor VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE personaje');
    }
}
