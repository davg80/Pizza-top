<?php
	
namespace App\DataFixtures;

use App\Entity\Ingredient;
use App\Entity\Traits\ResourceId;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class IngredientsFixtures extends Fixture
{
	use ResourceId;
	
	private $faker;
	public function load(ObjectManager $manager): void
	{
		// $product = new Product();
		// $manager->persist($product);
		$this->addIngredients($manager);
		$manager->flush();
	}
	
	public function addIngredients(EntityManager $entityManager) {
		$this->faker = Factory::create('fr_FR');
		for($i=1; $i<= 10; $i++){
			$ingredient = new Ingredient();
			$ingredient->setName($this->faker->word())
				->setPrice($this->faker->randomFloat(2, 0.5, 10));
			$entityManager->persist($ingredient);
		}
	}
	
}