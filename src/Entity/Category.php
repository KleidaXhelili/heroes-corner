<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $mangas;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $comics;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $bd;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="categorie")
     */
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMangas(): ?string
    {
        return $this->mangas;
    }

    public function setMangas(string $mangas): self
    {
        $this->mangas = $mangas;

        return $this;
    }

    public function getComics(): ?string
    {
        return $this->comics;
    }

    public function setComics(string $comics): self
    {
        $this->comics = $comics;

        return $this;
    }

    public function getBd(): ?string
    {
        return $this->bd;
    }

    public function setBd(string $bd): self
    {
        $this->bd = $bd;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Product $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setCategorie($this);
        }

        return $this;
    }

    public function removeProduit(Product $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getCategorie() === $this) {
                $produit->setCategorie(null);
            }
        }

        return $this;
    }
}
