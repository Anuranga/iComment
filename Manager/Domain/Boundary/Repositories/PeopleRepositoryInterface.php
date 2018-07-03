<?php declare(strict_types = 1);

namespace Manager\Domain\Boundary\Repositories;
use Manager\Domain\Entities\User;

interface PeopleRepositoryInterface
{
    /**
     * Get user by credentials.
     *
     * @param array $credentials
     * @return User
     */
    public function getUser(array $credentials) : User;


    /**
     * insert Mobile user details at the sign in with mobile
     *
     * @return User
     */
    public function insertPeople($data,$id = null);
}