<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Word;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class Theme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $nameFr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameEn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameEs;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $namePt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameDe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameIt;

    /**
     * Many Themes have Many Words.
     * @ORM\ManyToMany(targetEntity="Word", mappedBy="themes")
     */
    private $words;

    /**
     * Many Themes have Many WordsLists.
     * @ORM\ManyToMany(targetEntity="WordsList", mappedBy="themes")
     */
    private $words;

    public function __construct() {
        $this->words = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Return the id of the theme
     *
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the french name
     *
     * @return string|null
     */
    public function getNameFr(): ?string
    {
        return $this->nameFr;
    }

    /**
     *  Set the french name
     *
     * @param string|null $nameFr
     * @return self
     */
    public function setNameFr(?string $nameFr): self
    {
        $this->nameFr = $nameFr;

        return $this;
    }

    /**
     * Get the english name
     *
     * @return string|null
     */
    public function getNameEn(): ?string
    {
        return $this->nameEn;
    }

    /**
     * Set the english name
     *
     * @param string|null $nameEn
     * @return self
     */
    public function setNameEn(?string $nameEn): self
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get the spanish name
     *
     * @return string|null
     */
    public function getNameEs(): ?string
    {
        return $this->nameEs;
    }

    /**
     * Set the spanish name
     *
     * @param string|null $nameEs
     * @return self
     */
    public function setNameEs(?string $nameEs): self
    {
        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * Get the french name
     *
     * @return string|null
     */
    public function getNamePt(): ?string
    {
        return $this->namePt;
    }

    /**
     * Set the portuguese name
     *
     * @param string|null $namePt
     * @return self
     */
    public function setNamePt(?string $namePt): self
    {
        $this->namePt = $namePt;

        return $this;
    }

    /**
     * Get the german name
     *
     * @return string|null
     */
    public function getNameDe(): ?string
    {
        return $this->nameDe;
    }

    /**
     * Set the german name
     *
     * @param string|null $nameDe
     * @return self
     */
    public function setNameDe(?string $nameDe): self
    {
        $this->nameDe = $nameDe;

        return $this;
    }

    /**
     * Get the italian name
     *
     * @return string|null
     */
    public function getNameIt(): ?string
    {
        return $this->nameIt;
    }

    /**
     *  Set the Italian name
     *
     * @param string|null $nameIt
     * @return self
     */
    public function setNameIt(?string $nameIt): self
    {
        $this->nameIt = $nameIt;

        return $this;
    }

    /**
     * Add a word to the list of words
     * 
     * @param Word $word
     */
    public function addWord(Word $word){
        $word->addTheme($this);
        $this->words->add($word);
    }
}
