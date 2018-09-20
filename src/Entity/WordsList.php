<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Word;
use App\Entity\Theme;
use App\Entity\User;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 */
class WordsList
{
    /**
     * @ORM\Column(type="integer",type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;
    
    /**
     * Indique si la liste est privée ou publique (visible de tous)
     * 0 : privée
     * 1 : publique
     * 
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $visibilite;

    /**
     * Une liste officielle est une liste crée par tradyourself
     *
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $official;

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
     * @ORM\ManyToMany(targetEntity="Word", mappedBy="themes")
     */
    private $words;

    /**
     * Many WordsLists have Many Themes.
     * @ORM\ManyToMany(targetEntity="Theme", inversedBy="wordslists")
     * 
     */
    private $themes;

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

    public function setNamePt(?string $namePt): self
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

    /**
     * Set the author of the wordslist
     *
     * @param User $user
     * @return void
     */
    public function setAuthor(User $user) : WordsList 
    {
        $this->author = $user;
        return $this;
    }

    /**
     * Return the author of the wordslist
     *
     * @return User|null
     */
    public function getAuthor() : ?User
    {
        return $this->author;
    }
}
