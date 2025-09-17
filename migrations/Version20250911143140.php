<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250911143140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `tbl_groups` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tbl_players ADD groups VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE tbl_players ADD CONSTRAINT FK_7D1D4BD25FB14BA7 FOREIGN KEY (level_id) REFERENCES tbl_levels (id)');
        $this->addSql('CREATE INDEX IDX_7D1D4BD25FB14BA7 ON tbl_players (level_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `tbl_groups`');
        $this->addSql('ALTER TABLE tbl_players DROP FOREIGN KEY FK_7D1D4BD25FB14BA7');
        $this->addSql('DROP INDEX IDX_7D1D4BD25FB14BA7 ON tbl_players');
        $this->addSql('ALTER TABLE tbl_players DROP groups');
    }
}
