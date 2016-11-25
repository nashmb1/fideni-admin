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

//    public function subscriptionAction(){
//        $easyadmin = $this->request->attributes->get('easyadmin');
//        $entity = $easyadmin['item'];
////dump($entity,$easyadmin);die;
//        $subscription = new Subscription();
//        $subscription->setUser($entity);
//        $form = $this->createForm(new SubscriptionType(), $subscription);
//
//        $return = $this->redirectToRoute('fideni_core_homepage',[
//            'entity' => 'Subscription',
//            'form' => $form->createView()
//        ]);
//        dump($return);die;
//        return $this->render('@FideniCore/subscription.html.twig', [
//            'form' => $form->createView()
//        ]);
//    }
    public function subscriptionAction()
    {
        $this->entity = $this->get('easyadmin.config.manager')->getEntityConfiguration('Subscription');
        $easyadmin = $this->request->attributes->get('easyadmin');
        $entity = $easyadmin['entity'];
        $action = $easyadmin['view'];
//        $fields = $entity[$action]['fields'];
        $easyadmin['view'] = 'new';

        $entity = $easyadmin['item'];
        $template = $this->entity['templates']['new'];
//        dump($template);die;
//        $entity= $this->entity;
        $subscription = new Subscription();
        $subscription->setUser($entity);

        $easyadmin['entity'] = $this->entity;
//                dump($easyadmin,$entity,$action,$this->entity,$subscription);die;

        $this->request->attributes->set('easyadmin', $easyadmin);


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
            'entity' => 'Subscription',
//            'form'   => $form->createView(),
//            'entity' => $entity,
//            'entity_fields' => $fields
        ));
        $newForm = $this->createForm(new SubscriptionType(), $subscription);
        return $this->render($this->entity['templates']['new'], array(
            'form' => $form->createView(),
            'entity_fields' => $fields,,
            'entity' => $entity
        ));
        return $return;
        dump($return);die;
//        $this->
//        return $this->redire
    }
}