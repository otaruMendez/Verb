<?php


class Request implements RequestInterface
{
    protected $getParameters;
    protected $postParameters;
    protected $server;
    protected $files;
    protected $cookies;
    protected $inputStream;

    public function __construct(
        array $get,
        array $post,
        array $cookies,
        array $files,
        array $server,
        $inputStream = ''
    ) {
        $this->getParameters = $get;
        $this->postParameters = $post;
        $this->cookies = $cookies;
        $this->files = $files;
        $this->server = $server;
        $this->inputStream = $inputStream;
    }

    public static function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getParameter($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->postParameters)) {
            return $this->postParameters[$key];
        }
        if (array_key_exists($key, $this->getParameters)) {
            return $this->getParameters[$key];
        }
        return $defaultValue;
    }

    public function getQueryParameter($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->getParameters)) {
            return $this->getParameters[$key];
        }
        return $defaultValue;
    }

    public function getBodyParameter($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->postParameters)) {
            return $this->postParameters[$key];
        }
        return $defaultValue;
    }

    public function getFile($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->postParameters)) {
            return $this->postParameters[$key];
        }
        return $defaultValue;
    }

    public function getCookie($key, $defaultValue)
    {
        if (array_key_exists($key, $this->cookies)) {
            return $this->cookies[$key];
        }
        return $defaultValue;
    }

    public function getParameters()
    {
        return array_merge($this->getParameters, $this->postParameters);
    }

    public function getQueryParameters()
    {
        return $this->getParameters;
    }

    public function getBodyParameters()
    {
        return $this->postParameters;
    }

    public function getRawBody()
    {
        return $this->inputStream;
    }

    public function getCookies()
    {
        return $this->cookies;
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function Uri()
    {
    }

    public function getUri()
    {
        return $this->getServerVariable('REQUEST_URI');
    }

    public function getPath()
    {
        return strtok($this->getServerVariable('REQUEST_URI'), '?');
    }

    public function getMethod()
    {
        return $this->getServerVariable('REQUEST_METHOD');
    }

    public function getHttpAccept()
    {
        return $this->getServerVariable('HTTP_ACCEPT');
    }

    public function getUserAgent()
    {
        return $this->getServerVariable('HTTP_USER_AGENT');
    }

    public function getIpAddress()
    {
        return $this->getServerVariable('REMOTE_ADDR');
    }

    public function isSecure()
    {
        return (array_key_exists('HTTPS', $this->server)
            && $this->server['HTTPS'] !== 'off'
        );
    }

    public function getQueryString()
    {
        return $this->getServerVariable('QUERY_STRING');
    }

    private function getServerVariable($key)
    {
        if (!array_key_exists($key, $this->server)) {
            throw new MissingRequestMetaVariableException($key);
        }
        return $this->server[$key];
    }
}