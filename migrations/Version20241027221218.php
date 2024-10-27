<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241027221218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_followed_trailer (user_id INT NOT NULL, trailer_id INT NOT NULL, INDEX IDX_B3CC5FFBA76ED395 (user_id), INDEX IDX_B3CC5FFBB6C04CFD (trailer_id), PRIMARY KEY(user_id, trailer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_followed_trailer ADD CONSTRAINT FK_B3CC5FFBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_followed_trailer ADD CONSTRAINT FK_B3CC5FFBB6C04CFD FOREIGN KEY (trailer_id) REFERENCES trailer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_followed_trailer DROP FOREIGN KEY FK_B3CC5FFBA76ED395');
        $this->addSql('ALTER TABLE user_followed_trailer DROP FOREIGN KEY FK_B3CC5FFBB6C04CFD');
        $this->addSql('DROP TABLE user_followed_trailer');
    }
}
