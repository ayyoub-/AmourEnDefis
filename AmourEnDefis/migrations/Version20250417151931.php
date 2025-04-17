<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250417151931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE couple (id INT AUTO_INCREMENT NOT NULL, homme_id INT DEFAULT NULL, femme_id INT DEFAULT NULL, date_creation DATETIME NOT NULL, INDEX IDX_D840B5495BE2EC00 (homme_id), INDEX IDX_D840B549EA18A17C (femme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE couple ADD CONSTRAINT FK_D840B5495BE2EC00 FOREIGN KEY (homme_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE couple ADD CONSTRAINT FK_D840B549EA18A17C FOREIGN KEY (femme_id) REFERENCES user (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE couple DROP FOREIGN KEY FK_D840B5495BE2EC00
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE couple DROP FOREIGN KEY FK_D840B549EA18A17C
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE couple
        SQL);
    }
}
