<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605202209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, token VARCHAR(180) NOT NULL, roles CLOB NOT NULL, name VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E93D434371 ON users (token);');
        $this->addSql('CREATE TABLE products (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, tax INTEGER NOT NULL, price NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');

        $this->addSql('INSERT INTO users (email, token, roles, name) VALUES ("admin@test.test", "admintoken",\'["ROLE_ADMIN"]\',"Admin User")');

        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES (1, "name product 1", "description test 1", 4, 10.2)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES (2, "name product 2", "description test 2", 10, 12.3)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES (3, "name product 3", "description test 3", 21, 14.4)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE products');
    }
}
