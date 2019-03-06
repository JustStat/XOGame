<?php
/**
 * Created by PhpStorm.
 * User: kirillvarlamov
 * Date: 2019-02-28
 * Time: 17:05
 */

namespace App\Controller;

use App\Service\GameCore;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    protected $current_player;
    protected $clients;
    protected $users;

    /**
     * @Route(path="/", name="homepage")
     */
    public function number()
    {

        return $this->render("luckyController.html.twig", []);
    }
}