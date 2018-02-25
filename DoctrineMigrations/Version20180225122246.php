<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180225122246 extends AbstractMigration
{
	public function up(Schema $schema): void {
		// this up() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

		$this->addSql('CREATE TABLE test_entity (id UUID NOT NULL, data TEXT NOT NULL, PRIMARY KEY(id))');
	}

	public function down(Schema $schema): void {
		$this->throwIrreversibleMigrationException('Down migrations are hell!');
	}
}
