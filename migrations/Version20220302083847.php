<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302083847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE energy_option (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE energy_option_cars (energy_option_id INT NOT NULL, cars_id INT NOT NULL, INDEX IDX_37F9622D24F532C (energy_option_id), INDEX IDX_37F9622D8702F506 (cars_id), PRIMARY KEY(energy_option_id, cars_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE energy_option_cars ADD CONSTRAINT FK_37F9622D24F532C FOREIGN KEY (energy_option_id) REFERENCES energy_option (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE energy_option_cars ADD CONSTRAINT FK_37F9622D8702F506 FOREIGN KEY (cars_id) REFERENCES cars (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE energy_option_cars DROP FOREIGN KEY FK_37F9622D24F532C');
        $this->addSql('DROP TABLE energy_option');
        $this->addSql('DROP TABLE energy_option_cars');
    }
}
