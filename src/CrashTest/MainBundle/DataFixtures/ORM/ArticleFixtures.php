<?php

namespace CrashTest\MainBundle\DataFixtures\ORM;

use CrashTest\MainBundle\Entity\Article;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ArticleFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $dataToGenerate = (int)$this->container->getParameter('nb');

        for ($i = 0; $i < $dataToGenerate; $i++) {
            print(sprintf("\t%s / %s\n", $i+1, $dataToGenerate));
            $article = new Article();
            $article->setArticleTitle($faker->words(3, true));
            $article->setArticleContent($faker->words(150, true));
            $article->setArticleAuthor($faker->name);
            $manager->persist($article);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}