<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Word;
use App\Entity\Theme;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class WordsList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $author;

    /**
     * The default name
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

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
     * @ManyToMany(targetEntity="Word", mappedBy="themes")
     */
    private $words;

    public function __construct() {
        $this->words = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFr(): ?string
    {
        return $this->nameFr;
    }

    public function setNameFr(?string $nameFr): self
    {
        $this->nameFr = $nameFr;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->nameEn;
    }

    public function setNameEn(?string $nameEn): self
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    public function getNameEs(): ?string
    {
        return $this->nameEs;
    }

    public function setNameEs(?string $nameEs): self
    {
        $this->nameEs = $nameEs;

        return $this;
    }

    public function getNamePt(): ?string
    {
        return $this->namePt;
    }

    public function setNameEs(?string $namePt): self
    {
        $this->namePt = $namePt;

        return $this;
    }

    public function getNameDe(): ?string
    {
        return $this->nameDe;
    }

    public function setNameDe(?string $nameDe): self
    {
        $this->nameDe = $nameDe;

        return $this;
    }

    public function getNameIt(): ?string
    {
        return $this->nameIt;
    }

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
