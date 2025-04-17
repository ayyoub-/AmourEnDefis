<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250417153427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE categorie_defi (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE couple_defi (id INT AUTO_INCREMENT NOT NULL, couple_id INT NOT NULL, defi_id INT NOT NULL, note_finale DOUBLE PRECISION NOT NULL, date_participation DATETIME NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, INDEX IDX_C7C49502F66468CA (couple_id), INDEX IDX_C7C4950273F00F27 (defi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE defis (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_9701665BBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE couple_defi ADD CONSTRAINT FK_C7C49502F66468CA FOREIGN KEY (couple_id) REFERENCES couple (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE couple_defi ADD CONSTRAINT FK_C7C4950273F00F27 FOREIGN KEY (defi_id) REFERENCES defis (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE defis ADD CONSTRAINT FK_9701665BBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_defi (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE couple_defi DROP FOREIGN KEY FK_C7C49502F66468CA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE couple_defi DROP FOREIGN KEY FK_C7C4950273F00F27
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE defis DROP FOREIGN KEY FK_9701665BBCF5E72D
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE categorie_defi
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE couple_defi
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE defis
        SQL);
    }
}
