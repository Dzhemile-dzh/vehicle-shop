<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241027192747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_followed_cars (user_id INT NOT NULL, car_id INT NOT NULL, INDEX IDX_E55B9FC9A76ED395 (user_id), INDEX IDX_E55B9FC9C3C6F69F (car_id), PRIMARY KEY(user_id, car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_followed_cars ADD CONSTRAINT FK_E55B9FC9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_followed_cars ADD CONSTRAINT FK_E55B9FC9C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_followed_cars DROP FOREIGN KEY FK_E55B9FC9A76ED395');
        $this->addSql('ALTER TABLE user_followed_cars DROP FOREIGN KEY FK_E55B9FC9C3C6F69F');
        $this->addSql('DROP TABLE user_followed_cars');
    }
}
