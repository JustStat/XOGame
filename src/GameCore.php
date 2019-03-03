<?php
/**
 * Created by PhpStorm.
 * User: kirillvarlamov
 * Date: 2019-03-03
 * Time: 20:43
 */

namespace App;


use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class GameCore implements MessageComponentInterface
{
    public function onOpen(ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
    }

    public function onClose(ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // TODO: Implement onMessage() method.
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

}