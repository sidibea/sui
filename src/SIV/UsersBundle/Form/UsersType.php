<?php

namespace SIV\UsersBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('fonction', 'choice', array(
                'choices' => array(
                    'Commercial' => 'Commercial',
                    'Comptable' => 'Comptable',
                    'Consultant' => 'Entretien',
                    'DG' => 'DG',
                    'Directeur Administratif' => 'Directeur Administratif',
                    'Directeur Commercial' => 'Directeur Commercial',
                    'Directeur RH' => 'Directeur RH',
                    'Employé'=> 'Employé',
                    'Secrétaire' => 'Secrétaire',
                    'Stagiaire' => 'Stagiaire',
                    'Sécurité' => 'Sécurité',
                    'informaticien' => 'informaticien',
                    'Technicien' => 'Technicien'
                ),
                'required' => true
            ))
            ->add('departement')
            ->add('telephone')
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIV\UsersBundle\Entity\Users'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siv_usersbundle_users';
    }
}
