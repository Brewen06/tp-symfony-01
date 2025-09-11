<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250911102934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_group DROP FOREIGN KEY FK_D2B23F8399E6F5DF');
        $this->addSql('DROP TABLE player_group');
        $this->addSql('DROP TABLE tbl_group');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_group (player_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_D2B23F8399E6F5DF (player_id), INDEX IDX_D2B23F83FE54D947 (group_id), PRIMARY KEY(player_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tbl_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE player_group ADD CONSTRAINT FK_D2B23F8399E6F5DF FOREIGN KEY (player_id) REFERENCES tbl_players (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE `group`');
    }
}
