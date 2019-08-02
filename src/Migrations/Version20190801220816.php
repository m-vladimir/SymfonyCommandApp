<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801220816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE author CHANGE age age INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book CHANGE year_of_publication year_of_publication INT DEFAULT NULL, CHANGE genre genre VARCHAR(255) DEFAULT NULL, CHANGE annotation annotation VARCHAR(512) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE author CHANGE age age INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book CHANGE year_of_publication year_of_publication INT DEFAULT NULL, CHANGE genre genre VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE annotation annotation VARCHAR(512) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
