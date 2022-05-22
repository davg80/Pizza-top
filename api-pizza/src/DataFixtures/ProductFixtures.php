<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use App\Entity\Product;
use App\Entity\Traits\ResourceId;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class ProductFixtures extends Fixture
{
	use ResourceId;
	
	//private $faker;
	public function load(ObjectManager $manager): void
	{
		//$this->faker = Factory::create('fr_FR');
		$pizzas = ['La perso', '4 Fromages','BPM','Pepperoni','Queen','Montagnarde','Suprême','Raclette', 'Chèvre Miel', 'Chicken Barbecue'];
		for($p=0; $p< 10; $p++){
			$product = new Product();
			$product->setName($pizzas[$p]);
			$ingredients = $manager->getRepository(Ingredient::class)->findAll();
			shuffle($ingredients);
			foreach (array_slice($ingredients, 0 , 5) as $ingredient) {
				$product->getIngredients()->add($ingredient);
			}
			$manager->persist($product);
		}
		$manager->flush();
	}
	
}
