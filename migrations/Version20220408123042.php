<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220408123042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE amitie_user');
        $this->addSql('ALTER TABLE amitie ADD ami1_id INT DEFAULT NULL, ADD ami2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE amitie ADD CONSTRAINT FK_8FF9F39C41721271 FOREIGN KEY (ami1_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE amitie ADD CONSTRAINT FK_8FF9F39C53C7BD9F FOREIGN KEY (ami2_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8FF9F39C41721271 ON amitie (ami1_id)');
        $this->addSql('CREATE INDEX IDX_8FF9F39C53C7BD9F ON amitie (ami2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amitie_user (amitie_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_569D19D169B87CED (amitie_id), INDEX IDX_569D19D1A76ED395 (user_id), PRIMARY KEY(amitie_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE amitie_user ADD CONSTRAINT FK_569D19D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE amitie_user ADD CONSTRAINT FK_569D19D169B87CED FOREIGN KEY (amitie_id) REFERENCES amitie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE amitie DROP FOREIGN KEY FK_8FF9F39C41721271');
        $this->addSql('ALTER TABLE amitie DROP FOREIGN KEY FK_8FF9F39C53C7BD9F');
        $this->addSql('DROP INDEX IDX_8FF9F39C41721271 ON amitie');
        $this->addSql('DROP INDEX IDX_8FF9F39C53C7BD9F ON amitie');
        $this->addSql('ALTER TABLE amitie DROP ami1_id, DROP ami2_id');
    }
}
