<?php namespace DouaParale\Parale;
/**
 * Super-simple, minimum abstraction 2Parale API v1 wrapper
 *
 * Uses curl by default and falls back to file_get_contents and HTTP stream.
 * This probably has more comments than code.
 *
 * @author Costin "necenzurat" Moise <necenzurat@gmail.com>
 * @version 0.1.0
 */

class Parale {
    private $username;
    private $password;
    private $api_endpoint = "https://api.2parale.ro";
    private $verify_ssl = false;
    private $api_version = "0.1";

    /**
     * Create a new instance
     * @param string $username Your username
     * @param string $password Your password
     */
    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Call method, just call me maybe
     * @param  string $method The API method to call, e.g. 'campaigns/listforaffiliate'
     * @param  array  $args   An array of arguments to pass to the method e.g. page=2 Will be json-encoded for you.
     * @return array          Associative array of json decoded API response.
     */
    public function call($method, $args = array()) {
        return $this->makeRequest($method, $args);
    }

    /**
     * @param string $method
     */
    private function makeRequest($method, $args = array()) {

        $url = $this->api_endpoint . '/' . $method . '.json';

        if (function_exists('curl_init') && function_exists('curl_setopt')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERPWD, $this->username . ":" . $this->password);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_USERAGENT, "2Parale-" . $this->api_version);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verify_ssl);
            if (!empty($args)) {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($args));
            }
            $result = curl_exec($ch);
            curl_close($ch);
        } else {
            $json_data = json_encode($args);
            $result = file_get_contents($url, null, stream_context_create(array(
                'http' => array(
                    'protocol_version' => 1.1,
                    'user_agent' => "2Parale-" . $this->api_version,
                    'method' => 'POST',
                    'header' => "Authorization: Basic " . base64_encode($this->username . ':' . $this->password) . "\r\n" .
                    "Content-type: application/json\r\n" .
                    "Connection: close\r\n" .
                    "Content-length: " . strlen($json_data) . "\r\n",
                    'content' => $json_data,
                ),
            )));
        }
        return $result ? json_decode($result, true) : false;
    }

}
