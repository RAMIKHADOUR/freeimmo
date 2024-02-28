<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228122144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorys (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propertys (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nreference VARCHAR(255) NOT NULL, surface DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, chambres INT NOT NULL, salle_bains INT NOT NULL, etages INT NOT NULL, numero_etage INT NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(50) NOT NULL, code_postale VARCHAR(50) NOT NULL, region VARCHAR(100) NOT NULL, internet TINYINT(1) DEFAULT NULL, balcon TINYINT(1) DEFAULT NULL, garage TINYINT(1) DEFAULT NULL, salle_sport TINYINT(1) DEFAULT NULL, piscine TINYINT(1) DEFAULT NULL, camera_surveillance TINYINT(1) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7AEEC2C4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_property (id INT AUTO_INCREMENT NOT NULL, type_property VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, telephone_portable VARCHAR(50) NOT NULL, telephone_fixe VARCHAR(50) DEFAULT NULL, site_web VARCHAR(255) DEFAULT NULL, adresse VARCHAR(100) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, code_postale VARCHAR(50) DEFAULT NULL, entreprise VARCHAR(100) DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C4A76ED395');
        $this->addSql('DROP TABLE categorys');
        $this->addSql('DROP TABLE propertys');
        $this->addSql('DROP TABLE type_property');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
