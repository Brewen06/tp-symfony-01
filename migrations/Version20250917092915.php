<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250917092915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE tbl_players ADD categories_id INT DEFAULT NULL, ADD archer VARCHAR(50) NOT NULL, ADD chevalier VARCHAR(50) NOT NULL, ADD mage VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE tbl_players ADD CONSTRAINT FK_7D1D4BD2A21214B7 FOREIGN KEY (categories_id) REFERENCES tbl_categories (id)');
        $this->addSql('CREATE INDEX IDX_7D1D4BD2A21214B7 ON tbl_players (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_players DROP FOREIGN KEY FK_7D1D4BD2A21214B7');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE tbl_categories');
        $this->addSql('DROP INDEX IDX_7D1D4BD2A21214B7 ON tbl_players');
        $this->addSql('ALTER TABLE tbl_players DROP categories_id, DROP archer, DROP chevalier, DROP mage');
    }
}
