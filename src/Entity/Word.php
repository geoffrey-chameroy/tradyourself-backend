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
     * @ORM\ManyToMany(targetEntity="Theme", inversedBy="words")
     * 
     */
    private $themes;

    /**
     * Initialize the word with an empty collection of themes
     */
    public function __construct() {
        $this->themes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Undocumented function
     *
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    public function getFr(): ?string
    {
        return $this->fr;
    }

    /**
     * Undocumented function
     *
     * @param string $fr
     * @return self
     */
    public function setFr(string $fr): self
    {
        $this->fr = $fr;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    public function getEn(): ?string
    {
        return $this->en;
    }

    /**
     * Undocumented function
     *
     * @param string $en
     * @return self
     */
    public function setEn(string $en): self
    {
        $this->en = $en;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    public function getEs(): ?string
    {
        return $this->es;
    }

    /**
     * Undocumented function
     *
     * @param string $es
     * @return self
     */
    public function setEs(string $es): self
    {
        $this->es = $es;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    public function getPt(): ?string
    {
        return $this->pt;
    }

    /**
     * Undocumented function
     *
     * @param string|null $pt
     * @return self
     */
    public function setPt(?string $pt): self
    {
        $this->pt = $pt;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    public function getDe(): ?string
    {
        return $this->de;
    }

    /**
     * Undocumented function
     *
     * @param string $de
     * @return self
     */
    public function setDe(string $de): self
    {
        $this->de = $de;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    public function getIt(): ?string
    {
        return $this->it;
    }

    /**
     * Undocumented function
     *
     * @param string $it
     * @return self
     */
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
