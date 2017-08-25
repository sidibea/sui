<?php

namespace SIV\MainBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmpVisitesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array(
                'choices' => array(
                    'Rendez-vous programmé' =>'Rendez-vous programmé',
                    'Livraison' => 'Livraison',
                    'Entretien' => 'Entretien'
                ),
                'required' => true
            ))
            ->add('societe', 'text', [
                'required' => false
            ])
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('nobadge', 'text')
            ->add('telephone', 'text')
            ->add('dateEntree', 'text' )
            ->add('heureEntree', 'text')
            ->add('commentaire', 'textarea', array(
                'required' => false
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIV\MainBundle\Entity\Visites'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siv_mainbundle_visites';
    }
}
