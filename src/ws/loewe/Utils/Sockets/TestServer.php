<?php

namespace ws\loewe\Utils\Sockets;

use \ws\loewe\Utils\Logging\Logger;

/**
 * This class is an implementation of the abstract Server (@see ws\loewe\Utils\Sockets\Server) solely for testing purposes.
 */
class TestServer extends Server
{
    /**
     * This method acts as the constructor of the class.
     *
     * @param string $address the address to which the server socket is bound to
     * @param int $port the port to which the server socket is bound to
     * @param int $timeout the timeout of the socket-select call
     */
    public function __construct($address, $port, $timeout)
    {
        parent::__construct($address, $port, $timeout);
    }

    /**
     * This method allows testing of this server.
     *
     * @param ServerSocket $clientSocket
     */
    protected function processClient(ServerSocket $clientSocket)
    {
        $message = trim($clientSocket->read(1024));
        Logger::log(Logger::INFO, 'client said: '.$message);

        $result = '';
        if($message === 'time')
        {
            $result = '<html><body><span style="background-color:blue; font:red">'.time().'</span></body></html>';
            Logger::log(Logger::INFO, $result);
            //sleep(rand(1, 5));
        }
        else if($message === 'tame')
        {
            $result = date('Ymd');
            //sleep(rand(1, 5));
        }
        else if($message === 'terminate')
        {
            Logger::log(Logger::INFO, 'disconnecting ...');
            $this->disconnectClient($clientSocket);
        }
        else
            $result = 'wooot?';

        if($result)
        {
            Logger::log(Logger::INFO, 'replying ...');
            $clientSocket->write($result);
        }
    }
}