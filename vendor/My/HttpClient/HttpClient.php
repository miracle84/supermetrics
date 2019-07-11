<?php

namespace My\HttpClient;

/**
 * Class HttpClient
 * @package HttpClient
 *
 * Simple wrapper just for ability to check full flow
 * For prod better use some distributed library
 */
class HttpClient
{
    public function get(string $url, array $paramList = []): string
    {
        $glue = (false !== strpos($url, "?")) ? "&" : "?";
        $ch = curl_init($url . $glue . http_build_query($paramList));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function post(string $url, array $paramList = [])
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($paramList));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;

    }
}