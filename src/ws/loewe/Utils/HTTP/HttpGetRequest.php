<?php

namespace ws\loewe\Utils\Http;

/**
 * This class encapsulates a HTTP GET request.
 */
class HttpGetRequest extends HttpRequest {
    /**
     * delimter that identifies, where the parameter string of a HTTP GET request starts
     *
     * @var string
     */
    private static $URL_PARAMETER_DELIMITER = "?";

    /**
     * This method acts as the constructor of the class
     *
     * @param string $rawRequest the raw HTTP GET request
     */
    public function __construct($rawRequest) {
        parent::__construct($rawRequest);
    }

    protected function getParamterString() {
        // get the position of the end of the HTTP header
        if(($urlParameterStart = strpos($this->rawRequest, self::$URL_PARAMETER_DELIMITER)) !== FALSE) {
            $start = $urlParameterStart + strlen(self::$URL_PARAMETER_DELIMITER);

            $end = strpos($this->rawRequest, ' ', $start);
            
            if($end === FALSE) {
                return substr($this->rawRequest, $start);
            }
            else {
                return substr($this->rawRequest, $start, $end - $start);
            }
        }

        else
            return null;
    }
}