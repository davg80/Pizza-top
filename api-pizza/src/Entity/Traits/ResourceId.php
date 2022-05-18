<?php
	
namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

trait ResourceId
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	#[Groups(['products_collection:read', 'products_item:read'])]
	private ?int $id;
	
	public function getId(): ?int
	{
		return $this->id;
	}
}
