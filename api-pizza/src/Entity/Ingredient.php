<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\ResourceId;
use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

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
	],
	order: [
		'name' => "ASC"
	]
)]
class Ingredient
{
	
	use ResourceId;

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    #[Groups(['ingredients_collection:write','products_item:read', 'products_item:write'])]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $name;

    #[ORM\Column(type: 'float')]
    #[Groups(['ingredients_collection:write','products_item:read', 'products_item:write'])]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
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
