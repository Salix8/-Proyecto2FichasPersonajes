<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220117092120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje ADD autor_id INT NOT NULL');
        $this->addSql('ALTER TABLE personaje ADD CONSTRAINT FK_53A4108814D45BBE FOREIGN KEY (autor_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_53A4108814D45BBE ON personaje (autor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje DROP FOREIGN KEY FK_53A4108814D45BBE');
        $this->addSql('DROP INDEX IDX_53A4108814D45BBE ON personaje');
        $this->addSql('ALTER TABLE personaje DROP autor_id');
    }
}
