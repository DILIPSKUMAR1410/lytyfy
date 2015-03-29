<?php

namespace Deviab\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BorrowerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('gender')
            ->add('state')
            ->add('phone')
            ->add('address')
            ->add('locality')
            ->add('city')
            ->add('borrowerImg')
            ->add('borrowerDob')
            ->add('createdAt')
            ->add('modifiedAt')
            ->add('modifiedBy')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Deviab\AppBundle\Entity\Borrower'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deviab_appbundle_borrower';
    }
}
