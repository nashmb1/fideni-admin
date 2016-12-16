<?php

namespace Fideni\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CampaignType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('startDate', 'date', ['label' => 'app.admin.campaign.start_date'])
            ->add('endDate', 'date', ['label' => 'app.admin.campaign.end_date'])
            ->add('sharePrice', 'money', ['label' => 'app.admin.campaign.share_price'])
            ->add('enabled', 'checkbox', ['label' => 'app.admin.campaign.enabled'])        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fideni\CoreBundle\Entity\Campaign'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fideni_corebundle_campaign';
    }


}
