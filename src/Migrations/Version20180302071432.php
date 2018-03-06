<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180302071432 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partida ADD time_casa_id INT DEFAULT NULL, ADD time_visitante_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partida ADD CONSTRAINT FK_A9C1580C14F5E2C4 FOREIGN KEY (time_casa_id) REFERENCES time (id)');
        $this->addSql('ALTER TABLE partida ADD CONSTRAINT FK_A9C1580C102C177 FOREIGN KEY (time_visitante_id) REFERENCES time (id)');
        $this->addSql('CREATE INDEX IDX_A9C1580C14F5E2C4 ON partida (time_casa_id)');
        $this->addSql('CREATE INDEX IDX_A9C1580C102C177 ON partida (time_visitante_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partida DROP FOREIGN KEY FK_A9C1580C14F5E2C4');
        $this->addSql('ALTER TABLE partida DROP FOREIGN KEY FK_A9C1580C102C177');
        $this->addSql('DROP INDEX IDX_A9C1580C14F5E2C4 ON partida');
        $this->addSql('DROP INDEX IDX_A9C1580C102C177 ON partida');
        $this->addSql('ALTER TABLE partida DROP time_casa_id, DROP time_visitante_id');
    }
}
