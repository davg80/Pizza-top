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
		$this->addIngredients($manager);
		$manager->flush();
	}
	
	public function addIngredients(EntityManager $entityManager) {
		$ingredients = ['Tomate', 'Champignon','Lardon','Feta','Mozzarella','Bacon','Oignon','Origan', 'Olives', 'Hariza'];
		$this->faker = Factory::create('fr_FR');
		for($i=0; $i< 10; $i++){
			$ingredient = new Ingredient();
			$ingredient->setName($ingredients[$i])
				->setPrice($this->faker->randomFloat(2, 0.2, 1.5));
			$entityManager->persist($ingredient);
		}
	}
	
}