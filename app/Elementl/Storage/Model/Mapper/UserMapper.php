<?php

namespace Elementl\Storage\Model\Mapper;

use Elementl\Storage\Database\StorageAdapterInterface;
use Elementl\Storage\Model\User;

class UserMapper
{
    /**
     * @var string
     */
    protected $tableName = 'users';

    /**
     * @var StorageAdapterInterface
     */
    protected $storageAdapter;

    /**
     * UserMapper constructor.
     *
     * @param StorageAdapterInterface $storageAdapter
     */
    public function __construct(StorageAdapterInterface $storageAdapter)
    {
        $this->storageAdapter = $storageAdapter;
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function persist(User $user)
    {
        if (!$user->getId()) {
            $user->setCreatedAt(date('Y-m-d H:i:s'));
        }
        $user->setUpdatedAt(date('Y-m-d H:i:s'));

        $id = $this->storageAdapter->insert(
            $this->tableName,
            $this->mapUserToArray($user)
        );

        $user->setId($id);

        return true;
    }

    /**
     * @param User $user
     *
     * @return array
     */
    protected function mapUserToArray(User $user)
    {
        return [
            'id'         => $user->getId(),
            'email'      => $user->getEmail(),
            'username'   => $user->getUsername(),
            'password'   => $user->getPassword(),
            'created_at' => $user->getCreatedAt(),
            'updated_at' => $user->getUpdatedAt(),
        ];
    }

    /**
     * @param array $userData
     *
     * @return User
     */
    protected function mapArrayToUser(array $userData)
    {
        $user = new User;

        if (isset($userData['id'])) {
            $user->setId($userData['id']);
        }

        $user->setUsername($userData['username']);
        $user->setPassword($userData['password']);
        $user->setEmail($userData['email']);

        return $user;
    }
}