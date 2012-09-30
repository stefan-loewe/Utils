<?php

namespace ws\loewe\Utils\Sockets;

use \ws\loewe\Utils\Logging\Logger;
use \ws\loewe\Utils\Http\HttpRequestFactory;
use \ws\loewe\Utils\Http\HttpRequest;

/**
 * This class acts as pattern for implementing a simple callback server.
 *
 * This class acts as pattern for implementing a simple callback server, i.e. callback can be registered, which then get the received requests as input. The callbacks are executed in the order as defined by the type of collection used for storing the callbacks. It is the responsibility of the callbacks to do something meaningful.
 */
abstract class CallbackServer extends Server
{
    /**
     * collection of closures that are registered with the CallbackServer
     *
     * @var mixed
     */
    protected $callbacks = null;

    /**
     * This method acts as the constructor of the class
     *
     * @param string $address the address to which the socket is bound
     * @param int $port the port to which the socket is bound
     * @param int $timeout the amount of seconds before a timeout occurs
     */
    public function __construct($address, $port, $timeout)
    {
        parent::__construct($address, $port, $timeout);
    }

    /**
     * @inheritdoc
     *
     * It reads upto 2048 bytes, packs it into a respective HTTPRequest object, and executes the registered callbacks - as long no callback returns false. If a callback does return false, no more callbacks will be called, and the server's main loop stops.
     */
    protected function processClient(ServerSocket $clientSocket)
    {
        $message = trim($clientSocket->read(2048));

        Logger::log(Logger::DEBUG, 'client said: '.$message);

        $this->executeCallback($clientSocket, HttpRequestFactory::createRequest($message));

        $this->disconnectClient($clientSocket);
    }

    /**
     * This method actually executes the callbacks.
     *
     * @param ServerSocket the server socket of the connected client
     * @param HttpRequest $request the request to process
     */
    protected function executeCallback(ServerSocket $clientSocket, HttpRequest $request)
    {
        foreach($this->callbacks as $currentCallback)
        {
            if(($this->isRunning = $currentCallback->__invoke($request)))
                break;
        }
    }
}