<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240315100339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE promotions (id INT AUTO_INCREMENT NOT NULL, periode INT NOT NULL, prix DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_end DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotions_users (promotions_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_831C31A010007789 (promotions_id), INDEX IDX_831C31A067B3B43D (users_id), PRIMARY KEY(promotions_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE promotions_users ADD CONSTRAINT FK_831C31A010007789 FOREIGN KEY (promotions_id) REFERENCES promotions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotions_users ADD CONSTRAINT FK_831C31A067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotions_users DROP FOREIGN KEY FK_831C31A010007789');
        $this->addSql('ALTER TABLE promotions_users DROP FOREIGN KEY FK_831C31A067B3B43D');
        $this->addSql('DROP TABLE promotions');
        $this->addSql('DROP TABLE promotions_users');
    }
}
