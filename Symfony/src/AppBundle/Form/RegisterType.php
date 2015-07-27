<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegisterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null,  array(
                "label" => "Pseudo de l'utilisateur"
            ))
            ->add('nom', null, array(
                "label" => "Nom de l'utilisateur"
            ))
            ->add('prenom', null, array(
                "label" => "Prenom de l'utilisateur"
            ))
            ->add('email', 'email', array(
                "label" => "Email"
            ))
            ->add('password', 'repeated', array(
                "type" => "password",
                'options' => array('required' => true),
				'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Mot de passe (validation)')
            ))
            ->add('adresse', null, array(
                "label" => "Adresse (num rue app)"
            ))
			
			->add('site', null, array(
                "label" => "site web"
            ))
            ->add('telephone', null, array(
                "label" => "Telephone"
            ))
            ->add('Enregistrer', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_user';
    }
}
