<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220618081423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gite ADD animaux TINYINT(1) NOT NULL, ADD tarif_animaux DOUBLE PRECISION, ADD tarif_haute_saison DOUBLE PRECISION NOT NULL, ADD tarif_basse_saison DOUBLE PRECISION NOT NULL, ADD ville VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gite DROP animaux, DROP tarif_animaux, DROP tarif_haute_saison, DROP tarif_basse_saison, DROP ville');
    }
}
