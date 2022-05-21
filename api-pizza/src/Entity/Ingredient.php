<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\ResourceId;
use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[ORM\Table(name: 'ingredients')]
#[HasLifecycleCallbacks]
#[ApiResource(	collectionOperations: [
		'get',
		'post' => [
			'normalization_context' => ['groups' => 'ingredients_collection:write']
		]
	],
	itemOperations: [
		'get' ,
		'put',
		'delete'
	],
	attributes: [
		'pagination_enabled' => false
	]
)]
class Ingredient
{
	
	use ResourceId;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['products_collection:read','products_collection:write', 'products_item:read'])]
    private ?string $name;

    #[ORM\Column(type: 'float')]
    #[Groups(['products_collection:read', 'products_collection:write', 'products_item:read'])]
    private ?float $price;
	
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
