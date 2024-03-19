<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306205402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys CHANGE chambres chambres INT DEFAULT NULL, CHANGE salle_bains salle_bains INT DEFAULT NULL, CHANGE etages etages INT DEFAULT NULL, CHANGE numero_etage numero_etage INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys CHANGE chambres chambres INT NOT NULL, CHANGE salle_bains salle_bains INT NOT NULL, CHANGE etages etages INT NOT NULL, CHANGE numero_etage numero_etage INT NOT NULL');
    }
}
