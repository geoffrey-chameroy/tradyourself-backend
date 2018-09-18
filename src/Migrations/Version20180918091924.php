<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180918091924 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE word (id INT AUTO_INCREMENT NOT NULL, fr VARCHAR(255) NOT NULL, en VARCHAR(255) NOT NULL, es VARCHAR(255) DEFAULT NULL, pt VARCHAR(255) DEFAULT NULL, de VARCHAR(255) DEFAULT NULL, it VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE word_theme (word_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_49C6ECCEE357438D (word_id), INDEX IDX_49C6ECCE59027487 (theme_id), PRIMARY KEY(word_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE word_theme ADD CONSTRAINT FK_49C6ECCEE357438D FOREIGN KEY (word_id) REFERENCES word (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE word_theme ADD CONSTRAINT FK_49C6ECCE59027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE word_theme DROP FOREIGN KEY FK_49C6ECCE59027487');
        $this->addSql('ALTER TABLE word_theme DROP FOREIGN KEY FK_49C6ECCEE357438D');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE word');
        $this->addSql('DROP TABLE word_theme');
    }
}
