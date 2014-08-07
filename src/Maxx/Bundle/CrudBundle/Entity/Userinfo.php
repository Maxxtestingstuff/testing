<?php

namespace Maxx\Bundle\CrudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * Userinfo
 *
 * @ORM\Table(name="userinfo")
 * @ORM\Entity
 */
class Userinfo
{
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=25, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     * 
     * @Assert\Email(
     *     message = "The email you provided is not a valid email.",
     *     checkMX = true
     * )
     * 
     * @ORM\Column(name="email", type="string", length=30)
     */
    private $email;
    
    /**
     * 
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context)
    {
        $em = $this->getServiceContainer()->get('doctrine.orm.entity_manager');
        $repository = $em->getRepository('MaxxCrudBundle:Userinfo');
        $userinfo = $repository->findOneByEmail($this->getEmail());
        
        if ($userinfo) {
            $context->addViolationAt(
                'email',    
                'The email you have entered is already taken!',
                array(),
                null
            );
        }
    } 

    /**
     * Set name
     *
     * @param string $name
     * @return Userinfo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Userinfo
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Userinfo
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    } 
    
    /**
     * Get email
     *
     * @return string 
     */
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    protected function getServiceContainer()
    {
        global $kernel;

        if ('AppCache' == get_class($kernel)) {
            $kernel = $kernel->getKernel();
        }

        return $kernel->getContainer();
    }
    
    /**                                                                                   
    * @Route("/ajax", name="_recherche_ajax")
    */
    
}
