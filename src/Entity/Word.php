<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Theme;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\WordRepository")
 */
class Word
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $en;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $es;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $de;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $it;

    /**
     * Many Words have Many Themes.
     * @ManyToMany(targetEntity="Theme", inversedBy="words")
     * 
     */
    private $themes;

    public function __construct() {
        $this->themes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFr(): ?string
    {
        return $this->fr;
    }

    public function setFr(string $fr): self
    {
        $this->fr = $fr;

        return $this;
    }

    public function getEn(): ?string
    {
        return $this->en;
    }

    public function setEn(string $en): self
    {
        $this->en = $en;

        return $this;
    }

    public function getEs(): ?string
    {
        return $this->es;
    }

    public function setEs(string $es): self
    {
        $this->es = $es;

        return $this;
    }

    public function getPt(): ?string
    {
        return $this->pt;
    }

    public function setPt(?string $pt): self
    {
        $this->pt = $pt;

        return $this;
    }

    public function getDe(): ?string
    {
        return $this->de;
    }

    public function setDe(string $de): self
    {
        $this->de = $de;

        return $this;
    }

    public function getIt(): ?string
    {
        return $this->it;
    }

    public function setIt(string $it): self
    {
        $this->it = $it;

        return $this;
    }

    /**
     * Add a theme to this word
     *
     * @param Theme $theme
     * @return void
     */
    public function addTheme(Theme $theme){
        $this->themes->add($theme);
    }
}
