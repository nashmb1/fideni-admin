<?php
/**
 * Created by PhpStorm.
 * User: nhmayaou
 * Date: 20/11/16
 * Time: 20:42
 */

namespace Fideni\CoreBundle\Controller;

use Fideni\CoreBundle\Entity\Subscription;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    public function subscriptionAction()
    {
        $this->entity = $this->get('easyadmin.config.manager')->getEntityConfiguration('Subscription');
//        $newForm = $this->executeDynamicMethod('create<EntityName>NewForm', array($entity, $fields));
        $easyadmin = $this->request->attributes->get('easyadmin');
        $entity = $easyadmin['entity'];
        $action = $easyadmin['view'];
//        $fields = $entity[$action]['fields'];

//        dump($entity,$action,$this->entity);die;
        $entity = $easyadmin['item'];

//        $entity= $this->entity;
        $subscription = new Subscription();
        $subscription->setUser($entity);
        $fields = $this->entity['new']['fields'];
        $form = $this->createFormBuilder($subscription)
                      ->add('user', 'entity', array(
                          'class' => 'Fideni\UserBundle\Entity\User',
                          'data'  =>  $entity
                      ))->getForm();
        $form = $this->createEntityForm($subscription, $fields, 'new');
//        dump($fields, $entity,$form);die;
//        return $this->
//        $subscription->setCampaignNumber(555);
        $return = $this->redirectToRoute('easyadmin', array(
            'action' => 'new',
//            'entity' => 'Subscription'
            'form'   => $form,
//            'entity' => $entity,
//            'entity_fields' => $fields
        ));
//        return $return;
        dump($return);die;
//        $this->
//        return $this->redire
    }
}