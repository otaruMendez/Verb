<?php


interface ResponseInterface
{
    public function setStatusCode($statusCode, $statusText = null);
    public function getStatusCode();
    public function addHeader($name, $value);
    public function setHeader($name, $value);
    public function getHeaders();
    public function setContent($content);
    public function getContent();
    public function redirect($url);
}