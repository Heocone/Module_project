<?php

namespace Modules\User\src\Repositories;
use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{

    //get user list
    public function getUsers();

}