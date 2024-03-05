<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304103337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys ADD category_id INT NOT NULL, ADD typeproperty_id INT NOT NULL, ADD civilite VARCHAR(50) NOT NULL, ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD telephone VARCHAR(50) NOT NULL, ADD email VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C412469DE2 FOREIGN KEY (category_id) REFERENCES categorys (id)');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C42ADA35B1 FOREIGN KEY (typeproperty_id) REFERENCES type_property (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7AEEC2C4E7927C74 ON propertys (email)');
        $this->addSql('CREATE INDEX IDX_7AEEC2C412469DE2 ON propertys (category_id)');
        $this->addSql('CREATE INDEX IDX_7AEEC2C42ADA35B1 ON propertys (typeproperty_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C412469DE2');
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C42ADA35B1');
        $this->addSql('DROP INDEX UNIQ_7AEEC2C4E7927C74 ON propertys');
        $this->addSql('DROP INDEX IDX_7AEEC2C412469DE2 ON propertys');
        $this->addSql('DROP INDEX IDX_7AEEC2C42ADA35B1 ON propertys');
        $this->addSql('ALTER TABLE propertys DROP category_id, DROP typeproperty_id, DROP civilite, DROP nom, DROP prenom, DROP telephone, DROP email');
    }
}
