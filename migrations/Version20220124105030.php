<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124105030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, contraseña VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personaje ADD autor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personaje ADD CONSTRAINT FK_53A4108814D45BBE FOREIGN KEY (autor_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_53A4108814D45BBE ON personaje (autor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje DROP FOREIGN KEY FK_53A4108814D45BBE');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP INDEX IDX_53A4108814D45BBE ON personaje');
        $this->addSql('ALTER TABLE personaje DROP autor_id');
    }
}
