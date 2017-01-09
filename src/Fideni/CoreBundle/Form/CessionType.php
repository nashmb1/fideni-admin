<?php

namespace Fideni\CoreBundle\Form;

use Fideni\CoreBundle\Repository\ShareRepository;
use Fideni\CoreBundle\Entity\Share;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CessionType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sellingPrice')
            ->add('buyer')
            ->add('seller')
            ->add('shares', EntityType::class, [
                'class' => 'Fideni\CoreBundle\Entity\Share',
                'query_builder' => function(ShareRepository $shareRepository) use ($options) {
                         return $shareRepository->getUserShareBuilder($options['userId']);
                },
                'multiple' => true,
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fideni\CoreBundle\Entity\Cession',
            'userId' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fideni_corebundle_cession';
    }


}
