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
	
	private $faker;
	public function load(ObjectManager $manager): void
	{
		// $product = new Product();
		// $manager->persist($product);
		$this->faker = Factory::create('fr_FR');
		for($p=1; $p<= 10; $p++){
			$product = new Product();
			$product->setName($this->faker->word());
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
