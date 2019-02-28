<?php
/**
 * Created by PhpStorm.
 * User: kirillvarlamov
 * Date: 2019-02-28
 * Time: 17:05
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render("luckyController.html.twig", []);
    }
}