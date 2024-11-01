<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241027215222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_followed_motorscycle (user_id INT NOT NULL, motorcycle_id INT NOT NULL, INDEX IDX_12EF30D8A76ED395 (user_id), INDEX IDX_12EF30D8CCE1540F (motorcycle_id), PRIMARY KEY(user_id, motorcycle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_followed_motorscycle ADD CONSTRAINT FK_12EF30D8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_followed_motorscycle ADD CONSTRAINT FK_12EF30D8CCE1540F FOREIGN KEY (motorcycle_id) REFERENCES motorcycle (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_followed_motorscycle DROP FOREIGN KEY FK_12EF30D8A76ED395');
        $this->addSql('ALTER TABLE user_followed_motorscycle DROP FOREIGN KEY FK_12EF30D8CCE1540F');
        $this->addSql('DROP TABLE user_followed_motorscycle');
    }
}
