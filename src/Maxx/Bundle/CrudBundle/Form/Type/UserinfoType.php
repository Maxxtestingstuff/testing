<?php

namespace Maxx\Bundle\CrudBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserinfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
                ->add('name','text', array('attr' => array('maxlength' => 20), 'required' => false))
                ->add('lastname','text', array('attr' => array('maxlength' => 25), 'required' => false))
                ->add('email','email', array('attr' => array('maxlength' => 30), 'required' => false))
                //->add('register','submit')
                ;
    }
    public function getName()
    {
        return 'UserinfoType';
    }
}
