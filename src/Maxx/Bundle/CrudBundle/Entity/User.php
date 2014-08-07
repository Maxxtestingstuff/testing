<?php

namespace Maxx\CrudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @UniqueEntity(fields="email", message=" The email address you have entered is already taken!")
 */

class User
{
    protected $name;

    protected $lastname;

    protected $email;
}

?>
