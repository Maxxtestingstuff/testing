<?php

namespace Maxx\Bundle\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Maxx\Bundle\CrudBundle\Entity\Userinfo;
use Maxx\Bundle\CrudBundle\Form\Type\UserinfoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class AjaxController extends Controller
{
    public function ajaxsubmitAction(Request $request)
    {
                 $name = $request->get('name');
                 $lastname = $request->get('lastname');
                 $email = $request->get('email');
                 
                 $data = new Userinfo();
                 $data->setName($name);
                 $data->setLastname($lastname);
                 $data->setEmail($email);
                 
                 $emailcheck = $this->getDoctrine()->getRepository('MaxxCrudBundle:Userinfo')->findOneBy(array('email' => $email));
                 
                 if ($emailcheck){
                     echo 1;
                     die();
                 }
                 else {
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($data);
                 
                 $em->flush();
            
                 return $this->render('MaxxCrudBundle:Default:success.html.twig');
                 }
            
            
        return $this->render('MaxxCrudBundle:Default:success.html.twig', array('emailcheck' => $emailcheck));//->createView(),));
    }
}