<?php
/**
 * Created by PhpStorm.
 * User: kirillvarlamov
 * Date: 2019-02-28
 * Time: 17:05
 */

namespace App\Controller;



use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController implements MessageComponentInterface
{
    protected $current_player;
    protected $clients;
    protected $users;

    public function __construct()
    {
        $this->clients = \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $connection) {
        $this->clients->attach($connection);
        $this->users[$connection->resourceId] = $connection;
    }

    public function  onClose(ConnectionInterface $connection) {
        $this->clients->deattach($connection);
        unset($this->users[$connection->resourceId]);
    }

    public function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        // TODO: Implement onMessage() method.
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    /**
     * @Route("/")
     */
    public function number()
    {
        $this->current_player = 0;
        $number = random_int(0, 100);

        return $this->render("luckyController.html.twig", ['current' => $this->current_player]);
    }

    /**
     * @Route("/test", name="btnTap")
     */
    public function btnTap() {
        if ($this->current_player == 0) {
            echo "0";
            $this->current_player = 1;
        } else {
            echo "1";
            $this->current_player = 0;
        }

        return $this->render("luckyController.html.twig", ['current' => $this->current_player]);
    }

}