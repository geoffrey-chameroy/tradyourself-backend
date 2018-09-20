<?php
namespace App\DataFixtures;

use App\Entity\Word;
use App\Entity\Theme;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixture extends Fixture
{
    /**
     * Create datas in the database
     *
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager)
    {   
        $user = new User();
        $user->setUsername('Tradyourself');
        $user->setPassword('root');
        $user->setEmail('aaaa@aaa.aa');
        $manager->persist($user);

        //Themes & Words
        $themeCirque = $this->createTheme($manager,'Cirque', [
            'clown' => 'clown',
            'juggler' => 'jongleur',
            'tamer' => 'dompteur',
            'trainer' => 'dresseur',
            'magician' => 'magicien',
            'contortionist' => 'contorsionniste',
            'acrobat' => 'acrobate',
            'tightrope walker' => 'funambule',
            'trapeze artist' => 'trapéziste',
            'menagerie' => 'ménagerie',
        ]);

        $themeAnimaux = $this->createTheme($manager,'Animaux', [
            'bee' => 'abeille',
            'cat' => 'chat',
            'dog' => 'chien',
            'butterfly' => 'papillon',
            'fly' => 'mouche',
        ]);

        //Words in many themes
        $wordLion = new Word();
        $wordLion->setEn('lion');
        $wordLion->setFr('lion');
        $manager->persist($wordLion);
        $themeCirque->addWord($wordLion);
        $themeAnimaux->addWord($wordLion);

        $wordMonkey = new Word();
        $wordMonkey->setEn('monkey');
        $wordMonkey->setFr('singe');
        $manager->persist($wordMonkey);
        $themeCirque->addWord($wordMonkey);
        $themeAnimaux->addWord($wordMonkey);

        //Persist themes
        $manager->persist($themeCirque);
        $manager->persist($themeAnimaux);
        $manager->flush();
    }

    /**
     * Create a theme with words
     *
     * @param ObjectManager $manager
     * @param string $name
     * @param array $wordList
     * @return Theme
     */
    private function createTheme(ObjectManager $manager,string $name, array $wordList){
        $theme =  new Theme();
        $theme->setNameFr($name);
        foreach($wordList as $wordEn => $wordFr){
            $word = new Word();
            $word->setEn($wordEn);
            $word->setFr($wordFr);
            $manager->persist($word);
            $theme->addWord($word);
        }
        return $theme;
    }

}