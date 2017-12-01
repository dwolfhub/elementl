<?php
namespace Elementl\Http;

use Elementl\Exception\ServerException;
use Elementl\Helper\Dictionary;
use Elementl\Storage\Session\Dictionary as SessionDictionary;

class Request
{
    /**
     * @var Dictionary
     */
    protected $get;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var Dictionary
     */
    protected $post;

    /**
     * @var Dictionary
     */
    protected $server;

    /**
     * @var Dictionary
     */
    protected $session;

    /**
     * @var string
     */
    protected $uri;

    /**
     * Request constructor.
     * @param array $server
     * @param array $session
     * @param array $get
     * @param array $post
     * @param string $method
     * @param string $uri
     */
    public function __construct(array $server, array $session, array $get, array $post, $method, $uri)
    {
        $this->get = new Dictionary($get);
        $this->method = $method;
        $this->post = new Dictionary($post);
        $this->server = new Dictionary($server);
        $this->session = new SessionDictionary($session);
        $this->uri = $uri;
    }

    /**
     * @return static
     * @throws ServerException
     */
    public static function fromGlobals()
    {
        session_start();

        if (empty($_SERVER['REQUEST_METHOD'])) {
            throw new ServerException('Cannot handle request. Server REQUEST_METHOD is empty.');
        }
        if (empty($_SERVER['REQUEST_URI'])) {
            throw new ServerException('Cannot handle request. Server REQUEST_URI is empty.');
        }

        return new static(
            $_SERVER,
            $_SESSION,
            $_GET,
            $_POST,
            (string) $_SERVER['REQUEST_METHOD'],
            explode('?', (string) $_SERVER['REQUEST_URI'])[0]
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

    /**
     * @return Dictionary
     */
    public function getSession(): Dictionary
    {
        return $this->session;
    }

    /**
     * @param Dictionary $session
     */
    public function setSession(Dictionary $session)
    {
        $this->session = $session;
    }
}