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
        $this->addSql('CREATE TABLE products (id VARCHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, tax INTEGER NOT NULL, price NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');

        $this->addSql('INSERT INTO users (email, token, roles, name) VALUES ("admin@test.test", "admintoken",\'["ROLE_ADMIN"]\',"Admin User")');

        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("bd3d7659-7b99-4793-a321-5ba4a29344d2", "name product 1", "description test 1", 4, 10.2)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("ff134e40-3184-445a-92da-563b352b00f8", "name product 2", "description test 2", 10, 12.3)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("2a252a13-1297-44a7-93ab-3b3bd1d0bb94", "name product 3", "description test 3", 21, 14.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("2a252a13-1297-44a7-93ab-3b3bd1d0bb95", "name product 4", "description test 4", 10, 14.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("2a252a13-1297-44a7-93ab-3b3bd1d0bb96", "name product 5", "description test 5", 4, 15.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("2a252a13-1297-44a7-93ab-3b3bd1d0bb97", "name product 6", "description test 6", 21, 16.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("2a252a13-1297-44a7-93ab-3b3bd1d0bb98", "name product 7", "description test 7", 10, 17.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("2a252a13-1297-44a7-93ab-3b3bd1d0bb99", "name product 8", "description test 8", 21, 18.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("bd3d7659-7b99-4793-a321-5ba4a29344d3", "name product 9", "description test 9", 4, 19.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("bd3d7659-7b99-4793-a321-5ba4a29344d4", "name product 10", "description test 10", 21, 20.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("bd3d7659-7b99-4793-a321-5ba4a29344d5", "name product 11", "description test 11", 4, 21.4)');
        $this->addSql('INSERT INTO products (id, name, description, tax, price) VALUES ("bd3d7659-7b99-4793-a321-5ba4a29344d6", "name product 12", "description test 12", 10, 22.4)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE products');
    }
}
