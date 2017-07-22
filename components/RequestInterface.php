<?php


interface RequestInterface
{
    /**
     * @param $key
     * @param null $defaultValue
     * @return mixed
     */
    public function getParameter($key, $defaultValue = null);
    public function getQueryParameter($key, $defaultValue = null);
    public function getBodyParameter($key, $defaultValue = null);
    public function getFile($key, $defaultValue = null);
    public function getCookie($key, $defaultValue);
    public function getParameters();
    public function getQueryParameters();
    public function getBodyParameters();
    public function getRawBody();
    public function getCookies();
    public function getFiles();
    public function Uri();
    public function getUri();
    public function getPath();
    public function getMethod();
    public function getHttpAccept();
    public function getUserAgent();
    public function getIpAddress();
    public function isSecure();
    public function getQueryString();
}