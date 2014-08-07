<?php

namespace Maxx\Bundle\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Maxx\Bundle\CrudBundle\Entity\Userinfo;
use Maxx\Bundle\CrudBundle\Form\Type\UserinfoType;

class DefaultController extends Controller
{
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        
        $userinfo = new Userinfo();
        
        //$userinfo->setName('test');
        $userinfoType = new UserinfoType();
        $form = $this->createForm($userinfoType, $userinfo);
      
        
        // $form = $this->createFormBuilder(new UserinfoType())
       /* $form = $this->createFormBuilder($userinfo)
                ->add('name','text')
                ->add('lastname','text')
                ->add('email','email')
                ->add('register','submit') */
              //  ->getForm();
        
        $form ->handleRequest($request);
        
        //if ($form->get('register')->isClicked()){
            if ($form->isValid()) {
                
                 $em = $this->getDoctrine()->getManager();
                 
                 $registration = $form->getData();
            
                 echo get_class($registration);
                 die();
                 //$em = $this->getDoctrine()->getManager();
                 $em->persist($registration);
                 $em->flush();
            
            
                 // return $this->redirect($this->generateUrl('regsuccess'));
                 return $this->render('MaxxCrudBundle:Default:success.html.twig');
                 //}
            }
            
        return $this->render('MaxxCrudBundle:Default:index.html.twig', array('form' => $form->createView(),));
    }
}
