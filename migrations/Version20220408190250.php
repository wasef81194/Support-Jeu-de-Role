<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220408190250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recompence (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_5459D28F5E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vertus (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_34E1B2EC5E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recompence ADD CONSTRAINT FK_5459D28F5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE vertus ADD CONSTRAINT FK_34E1B2EC5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amitie (id INT AUTO_INCREMENT NOT NULL, ami1_id INT DEFAULT NULL, ami2_id INT DEFAULT NULL, INDEX IDX_8FF9F39C41721271 (ami1_id), INDEX IDX_8FF9F39C53C7BD9F (ami2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE amitie ADD CONSTRAINT FK_8FF9F39C53C7BD9F FOREIGN KEY (ami2_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE amitie ADD CONSTRAINT FK_8FF9F39C41721271 FOREIGN KEY (ami1_id) REFERENCES user (id)');

    }
}
