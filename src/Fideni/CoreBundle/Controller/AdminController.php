<?php
/**
 * Created by PhpStorm.
 * User: nhmayaou
 * Date: 20/11/16
 * Time: 20:42
 */

namespace Fideni\CoreBundle\Controller;

use Fideni\CoreBundle\Entity\Campaign;
use Fideni\CoreBundle\Entity\Subscription;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    public function subscriptionAction()
    {
        $this->entity = $this->get('easyadmin.config.manager')->getEntityConfiguration('Subscription');
        $easyadmin = $this->request->attributes->get('easyadmin');

        $entity = $easyadmin['item'];
        $easyadmin['entity'] = $this->entity;
        $easyadmin['view'] = 'new';

        $subscription = new Subscription();
        $subscription->setUser($entity);
        $this->request->attributes->set('easyadmin', $easyadmin);
        $fields = $this->entity['new']['fields'];

        $form = $this->createEntityForm($subscription, $fields, 'new');

        $form->handleRequest($this->request);

        if($form->isSubmitted() && $form->isValid()){
            $subscription = $form->getData();
            $em =  $this->getDoctrine()->getEntityManager();
            $em->persist($subscription);
            $em->flush();

            return $this->redirectToRoute('easyadmin', array(
                'action' => 'list',
                'entity' => 'Subscription'
            ));
        }

        return $this->render($this->entity['templates']['new'], array(
            'form' => $form->createView(),
            'entity_fields' => $fields,
            'entity' => $entity
        ));
    }

    protected function prePersistCampaignEntity(){
        $this->getDoctrine()->getRepository('FideniCoreBundle:Campaign')->disable();
    }

}