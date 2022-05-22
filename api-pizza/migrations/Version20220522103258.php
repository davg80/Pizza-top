<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220522103258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredients (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_4B60114F5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_B3BA5A5A5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredients_products (product_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_C26954134584665A (product_id), INDEX IDX_C2695413933FE08C (ingredient_id), PRIMARY KEY(product_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredients_products ADD CONSTRAINT FK_C26954134584665A FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredients_products ADD CONSTRAINT FK_C2695413933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredients (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredients_products DROP FOREIGN KEY FK_C2695413933FE08C');
        $this->addSql('ALTER TABLE ingredients_products DROP FOREIGN KEY FK_C26954134584665A');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE ingredients_products');
    }
}
