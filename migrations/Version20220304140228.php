<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304140228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seats (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD seats_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14B103A3F8 FOREIGN KEY (seats_id) REFERENCES seats (id)');
        $this->addSql('CREATE INDEX IDX_95C71D14B103A3F8 ON cars (seats_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14B103A3F8');
        $this->addSql('DROP TABLE seats');
        $this->addSql('DROP INDEX IDX_95C71D14B103A3F8 ON cars');
        $this->addSql('ALTER TABLE cars DROP seats_id');
    }
}
