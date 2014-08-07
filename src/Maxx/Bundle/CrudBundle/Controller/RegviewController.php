<?php

namespace Maxx\Bundle\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Maxx\Bundle\CrudBundle\Entity\Userinfo;
use Maxx\Bundle\CrudBundle\Form\Type\UserinfoType;

class RegviewController extends Controller
{
    public function viewregAction()
    {
          $repository = $this->getDoctrine()->getRepository('MaxxCrudBundle:Userinfo');
          $userinfo = $repository->findAll();
                    
          //exit(\Doctrine\Common\Util\Debug::dump($userinfo)) ;  
          
        return $this->render('MaxxCrudBundle:Default:viewreg.html.twig', array('userinfo' => $userinfo));
    }
}