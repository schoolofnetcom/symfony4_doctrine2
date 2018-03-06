<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180302064838 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE campeonato_time (campeonato_id INT NOT NULL, time_id INT NOT NULL, INDEX IDX_644EB09693BAAE11 (campeonato_id), INDEX IDX_644EB0965EEADD3B (time_id), PRIMARY KEY(campeonato_id, time_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campeonato_time ADD CONSTRAINT FK_644EB09693BAAE11 FOREIGN KEY (campeonato_id) REFERENCES campeonato (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE campeonato_time ADD CONSTRAINT FK_644EB0965EEADD3B FOREIGN KEY (time_id) REFERENCES time (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE campeonato_time');
    }
}
