<?php

namespace Deviab\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BorrowerFinancialDetailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amountNeeded')
            ->add('amountRaised')
            ->add('tenure')
            ->add('interest')
            ->add('emi')
            ->add('createdAt')
            ->add('modifiedAt')
            ->add('modifiedBy')
            ->add('borrower')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Deviab\AppBundle\Entity\BorrowerFinancialDetail'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deviab_appbundle_borrowerfinancialdetail';
    }
}
