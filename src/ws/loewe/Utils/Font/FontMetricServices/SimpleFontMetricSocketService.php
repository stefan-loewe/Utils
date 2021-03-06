<?php

namespace ws\loewe\Utils\Font\FontMetricServices;

use \ws\loewe\Utils\Font\FontManager;
use \ws\loewe\Utils\Graphics2D\Shapes\Styles\TextStyle;
use \ws\loewe\Utils\URL\Url;
use \ws\loewe\Utils\Http\HttpRequestFactory;
use \ws\loewe\Utils\Font\FontMetric;

/**
 * This socket-based font metric service operates upon using PHPs stream_socket_*-functions.
 */
class SimpleFontMetricSocketService extends FontMetricSocketService
{
    /**
     * This method acts as the constructor of the class
     *
     * @param Url $url the URL of the socket to communicate with
     */
    public function __construct(Url $url)
    {
        parent::__construct($url);
    }

    /**
     * This method start a blocking socket server, waits for and consumes exactly one request to extract and add a font definition, and stops therafter.
     *
     * This method expects the request to be a valid \ws\loewe\Utils\Http\HttpRequest which contains a valid font definition.
     *
     * @param TextStyle $textStyle the text style for which the font definition is needed
     * @param FontManager $fontManager the font manager to which the font definition is added to
     */
    public function startSocketServer(TextStyle $textStyle, FontManager $fontManager)
    {
        $errno  = null;
        $errstr = null;

        if(($server = stream_socket_server($this->url->getHost().':'.$this->url->getPort(), $errno, $errstr)) !== FALSE)
        {
            while($client = stream_socket_accept($server))
            {
                $request = HttpRequestFactory::createRequest(fread($client, 2048));

                $keyValuePairs = $request->getKeyValuePairs();

                $fontManager->addFontMetric(new FontMetric($textStyle, explode(',', $keyValuePairs['fontDefinitions'])));

                fclose($client);

                break;
            }

            fclose($server);
        }
    }
}