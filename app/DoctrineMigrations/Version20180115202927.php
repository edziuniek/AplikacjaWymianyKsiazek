<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180115202927 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE editions (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, points INT NOT NULL, file_url VARCHAR(255) NOT NULL, INDEX IDX_96AE53E6F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edition_accesses (user_id INT NOT NULL, edition_id INT NOT NULL, INDEX IDX_AC23C6B7A76ED395 (user_id), INDEX IDX_AC23C6B774281A5E (edition_id), PRIMARY KEY(user_id, edition_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE editions ADD CONSTRAINT FK_96AE53E6F675F31B FOREIGN KEY (author_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE edition_accesses ADD CONSTRAINT FK_AC23C6B7A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE edition_accesses ADD CONSTRAINT FK_AC23C6B774281A5E FOREIGN KEY (edition_id) REFERENCES editions (id)');
        $this->addSql('ALTER TABLE users CHANGE points points INT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE edition_accesses DROP FOREIGN KEY FK_AC23C6B774281A5E');
        $this->addSql('DROP TABLE editions');
        $this->addSql('DROP TABLE edition_accesses');
        $this->addSql('ALTER TABLE users CHANGE points points INT DEFAULT 0 NOT NULL');
    }
}
