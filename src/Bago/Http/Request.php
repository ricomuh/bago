<?php

namespace Bago\Http;

class Request
{

    protected $url;
    protected $method;


    protected $get = [];
    protected $post = [];

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function url()
    {
        return $this->url;
    }

    public function method()
    {
        return $this->method;
    }

    public function get($key = null)
    {
        if ($key) {
            return $this->get[$key] ?? null;
        }

        return $this->get;
    }

    public function has($key)
    {
        return isset($this->get[$key]);
    }

    public function post($key = null)
    {
        if ($key) {
            return $this->post[$key] ?? null;
        }

        return $this->post;
    }
}
