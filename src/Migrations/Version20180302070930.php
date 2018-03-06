<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180302070930 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partida ADD campeonato_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partida ADD CONSTRAINT FK_A9C1580C93BAAE11 FOREIGN KEY (campeonato_id) REFERENCES campeonato (id)');
        $this->addSql('CREATE INDEX IDX_A9C1580C93BAAE11 ON partida (campeonato_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partida DROP FOREIGN KEY FK_A9C1580C93BAAE11');
        $this->addSql('DROP INDEX IDX_A9C1580C93BAAE11 ON partida');
        $this->addSql('ALTER TABLE partida DROP campeonato_id');
    }
}
