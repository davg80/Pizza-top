<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\ResourceId;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: 'products')]
#[HasLifecycleCallbacks]
#[ApiResource(
	collectionOperations: [
		'get' => [
			'normalization_context' => ['groups' => 'products_collection:read']
		],
		'post' => [
			'normalization_context' => ['groups' => 'products_collection:write']
		]
	],
	itemOperations: [
		'get' => [
			'normalization_context' => ['groups' => 'products_item:read']
		],
		'put' => [
			'normalization_context' => ['groups' => 'products_item:write']
		],
		'delete'
	],
	attributes: [
	'pagination_enabled' => false
	]
)]
class Product
{
	use ResourceId;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['products_collection:read', 'products_collection:write', 'products_item:read'])]
    private ?string $name;

    #[ORM\ManyToMany(targetEntity: Ingredient::class)]
    #[ORM\JoinTable(name: 'ingredients_products')]
    #[Groups(['products_collection:read', 'products_collection:write', 'products_item:read'])]
    private Collection $ingredients;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredients->removeElement($ingredient);

        return $this;
    }
}
