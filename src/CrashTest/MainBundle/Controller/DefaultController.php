<?php

namespace CrashTest\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $faker = \Faker\Factory::create('fr_FR');
        var_dump($faker->name);
        var_dump($faker->firstName);
        var_dump($faker->lastName);
        var_dump($faker->address);
        var_dump($faker->streetAddress);
        var_dump($faker->streetName);
        var_dump($faker->postcode);
        var_dump($faker->country);
        var_dump($faker->city);
        var_dump($faker->phoneNumber);
        var_dump($faker->iban('BE'));
        var_dump($faker->boolean);
        var_dump($faker->randomLetter);
        return $this->render('CrashTestMainBundle:Default:index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listArticleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('CrashTestMainBundle:Article')->findAll();

        return $this->render('CrashTestMainBundle:Default:list.html.twig', array(
            'articles' => $articles
        ));
    }
}
