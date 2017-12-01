<?php

namespace Elementl\Install\RequestHandler;

use Elementl\Api\RequestHandlerInterface;
use Elementl\ContentType\Entity;
use Elementl\ContentType\Field\Text;
use Elementl\Helper\Dictionary;
use Elementl\Http\Request;
use Elementl\Http\Response;
use Elementl\Storage\Database\StorageAdapterInterface;
use Elementl\Storage\Model\Mapper\UserMapper;
use Elementl\Storage\Model\User;
use Elementl\Validation\Rule;
use Elementl\Validation\Validator;

/**
 * Class PostRequestHandler
 * @package Elementl\Install\RequestHandler
 */
class PostRequestHandler implements RequestHandlerInterface
{
    const ERRORS_SESSION_KEY = 'install.errors';
    const DATA_SESSION_KEY = 'install.data';
    const NONCE_SESSION_KEY = 'install.nonce';

    /**
     * @var array
     */
    protected $entities;

    /**
     * @var StorageAdapterInterface
     */
    protected $storageAdapter;

    /**
     * @var string
     */
    protected $storageDirectory;

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $post = $request->getPost();
        $session = $request->getSession();

        $nonce = $post->get('nonce');
        $sessionNonce = $session->get(self::NONCE_SESSION_KEY);

        if (empty($sessionNonce) || $nonce !== $sessionNonce) {
            $response = new Response(302, new Dictionary(['Location' => '/']));

            $session->set(
                self::ERRORS_SESSION_KEY,
                serialize(new Dictionary(['nonce' => 'An error has occurred submitting your data. Please try again.']))
            );
            $session->set(self::DATA_SESSION_KEY, serialize($post));

            return $response;
        }

        $validator = new Validator();

        $validator->addRule(new Rule\NotBlank('username', $post->get('username', '')));
        $validator->addRule(
            new Rule\Length(
                'username', $post->get('username', ''), [
                    'min' => 6,
                    'max' => 255,
                ]
            )
        );

        $validator->addRule(new Rule\NotBlank('email', $post->get('email', '')));
        $validator->addRule(new Rule\Length('email', $post->get('email', ''), ['max' => 255]));
        $validator->addRule(new Rule\Email('email', $post->get('email', '')));

        $validator->addRule(new Rule\NotBlank('password', $post->get('password', '')));
        $validator->addRule(new Rule\Length('password', $post->get('password', ''), ['min' => 8]));

        $validator->addRule(new Rule\NotBlank('password_confirm', $post->get('password_confirm', '')));
        $validator->addRule(
            new Rule\Match(
                'password_confirm',
                $post->get('password_confirm', ''),
                ['match' => $post->get('password', '')]
            )
        );

        if (!$validator->isValid()) {
            $response = new Response(302, new Dictionary(['Location' => '/']));

            $session->set(self::ERRORS_SESSION_KEY, serialize($validator->getErrors()));
            $session->set(self::DATA_SESSION_KEY, serialize($post));

            return $response;
        }

        foreach ($this->entities as $entity) {
            $results = $this->storageAdapter->raw($entity->getSql());
        }

        $user = new User();
        $user->setEmail($post->get('email'));
        $user->setUsername($post->get('username'));
        $user->setPassword(password_hash($post->get('password'), PASSWORD_BCRYPT));

        $userMapper = new UserMapper($this->storageAdapter);
        $userMapper->persist($user);

        $request->getSession()->set('user_id', $user->getId());

        file_put_contents($this->storageDirectory . '/installed', date('U'));

        return new Response(302, new Dictionary(['Location' => '/elmtl']));
    }

    /**
     * @return StorageAdapterInterface
     */
    public function getStorageAdapter(): StorageAdapterInterface
    {
        return $this->storageAdapter;
    }

    /**
     * @param StorageAdapterInterface $storageAdapter
     */
    public function setStorageAdapter(StorageAdapterInterface $storageAdapter)
    {
        $this->storageAdapter = $storageAdapter;
    }

    /**
     * @return string
     */
    public function getStorageDirectory(): string
    {
        return $this->storageDirectory;
    }

    /**
     * @param string $storageDirectory
     */
    public function setStorageDirectory(string $storageDirectory)
    {
        $this->storageDirectory = $storageDirectory;
    }

    /**
     * @return Entity[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @param Entity[] $entities
     */
    public function setEntities(array $entities)
    {
        $this->entities = $entities;
    }
}