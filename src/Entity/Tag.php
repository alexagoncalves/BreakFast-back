<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
<<<<<<< HEAD

=======
>>>>>>> api-bakery-tag

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
<<<<<<< HEAD
     * @Groups({"api_products_list"})
     * 
     *
=======
     * @Groups({"get_tag_list", "get_tag_by_id"})
>>>>>>> api-bakery-tag
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
<<<<<<< HEAD
     * @Groups({"api_products_list"})
     * 
=======
     * @Groups({"get_tag_list", "get_tag_by_id"})
>>>>>>> api-bakery-tag
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="tag")
     * @Groups({"get_tag_list", "get_tag_by_id"})
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addTag($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeTag($this);
        }

        return $this;
    }
}
