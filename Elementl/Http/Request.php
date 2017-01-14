<?php
namespace Elementl\Http;

use Elementl\Helper\Dictionary;

class Request
{
    /**
     * @var Dictionary
     */
    protected $server;

    /**
     * @var Dictionary
     */
    protected $get;

    /**
     * @var Dictionary
     */
    protected $post;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $uri;

    /**
     * Request constructor.
     * @param array $server
     * @param array $get
     * @param array $post
     * @param string $method
     * @param string $uri
     */
    public function __construct(array $server, array $get, array $post, $method, $uri)
    {
        $this->server = new Dictionary($server);
        $this->get = new Dictionary($get);
        $this->post = new Dictionary($post);
        $this->method = $method;
        $this->uri = $uri;
    }

    /**
     * @return static
     */
    public static function fromGlobals()
    {
        return new static(
            $_SERVER,
            $_GET,
            $_POST,
            $_SERVER['REQUEST_METHOD'],
            explode('?', $_SERVER['REQUEST_URI'])[0]
        );
    }

    /**
     * @return Dictionary
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param Dictionary $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return Dictionary
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @param Dictionary $get
     */
    public function setGet($get)
    {
        $this->get = $get;
    }

    /**
     * @return Dictionary
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param Dictionary $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

}