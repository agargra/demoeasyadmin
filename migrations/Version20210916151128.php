<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916151128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, contacto VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrato (id INT AUTO_INCREMENT NOT NULL, cliente_id INT NOT NULL, dispositivo_id INT NOT NULL, codigo VARCHAR(255) NOT NULL, fecha DATE NOT NULL, periodicidad SMALLINT DEFAULT NULL, millar NUMERIC(10, 2) DEFAULT NULL, INDEX IDX_66696523DE734E51 (cliente_id), INDEX IDX_66696523FD37F77B (dispositivo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dispositivo (id INT AUTO_INCREMENT NOT NULL, marca_id INT DEFAULT NULL, num_serie VARCHAR(255) DEFAULT NULL, modelo VARCHAR(255) NOT NULL, INDEX IDX_A05F26EE81EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marca (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE revision (id INT AUTO_INCREMENT NOT NULL, contrato_id INT NOT NULL, fecha DATETIME NOT NULL, albaran VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, copias INT DEFAULT NULL, toner_entregado VARCHAR(255) DEFAULT NULL, piezas_sustituidas VARCHAR(255) DEFAULT NULL, INDEX IDX_6D6315CC70AE7BF1 (contrato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrato ADD CONSTRAINT FK_66696523DE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE contrato ADD CONSTRAINT FK_66696523FD37F77B FOREIGN KEY (dispositivo_id) REFERENCES dispositivo (id)');
        $this->addSql('ALTER TABLE dispositivo ADD CONSTRAINT FK_A05F26EE81EF0041 FOREIGN KEY (marca_id) REFERENCES marca (id)');
        $this->addSql('ALTER TABLE revision ADD CONSTRAINT FK_6D6315CC70AE7BF1 FOREIGN KEY (contrato_id) REFERENCES contrato (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrato DROP FOREIGN KEY FK_66696523DE734E51');
        $this->addSql('ALTER TABLE revision DROP FOREIGN KEY FK_6D6315CC70AE7BF1');
        $this->addSql('ALTER TABLE contrato DROP FOREIGN KEY FK_66696523FD37F77B');
        $this->addSql('ALTER TABLE dispositivo DROP FOREIGN KEY FK_A05F26EE81EF0041');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE contrato');
        $this->addSql('DROP TABLE dispositivo');
        $this->addSql('DROP TABLE marca');
        $this->addSql('DROP TABLE revision');
    }
}
