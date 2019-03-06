<?php
/**
 * Created by PhpStorm.
 * User: kirillvarlamov
 * Date: 2019-03-03
 * Time: 20:43
 */

namespace App\Service;


use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class GameCore implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        echo sprintf('Connection %d make turn %s' . "\n"
            , $from->resourceId, $msg);

        foreach ($this->clients as $client) {
                $client->send($msg);
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

}