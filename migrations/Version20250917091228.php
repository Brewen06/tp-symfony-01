<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250917091228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_players ADD CONSTRAINT FK_7D1D4BD26CB52B88 FOREIGN KEY (catégories_id) REFERENCES tbl_categories (id)');
        $this->addSql('ALTER TABLE tbl_players ADD CONSTRAINT FK_7D1D4BD2A21214B7 FOREIGN KEY (categories_id) REFERENCES tbl_categories (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_players DROP FOREIGN KEY FK_7D1D4BD26CB52B88');
        $this->addSql('ALTER TABLE tbl_players DROP FOREIGN KEY FK_7D1D4BD2A21214B7');
    }
}
