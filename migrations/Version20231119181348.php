<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231119181348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donation ADD project_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE donation ADD CONSTRAINT FK_31E581A0E70990B3 FOREIGN KEY (project_name_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_31E581A0E70990B3 ON donation (project_name_id)');
        $this->addSql('ALTER TABLE project ADD available BOOLEAN NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE project DROP available');
        $this->addSql('ALTER TABLE donation DROP CONSTRAINT FK_31E581A0E70990B3');
        $this->addSql('DROP INDEX IDX_31E581A0E70990B3');
        $this->addSql('ALTER TABLE donation DROP project_name_id');
    }
}
