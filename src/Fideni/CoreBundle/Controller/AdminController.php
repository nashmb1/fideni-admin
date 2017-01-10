<?php
/**
 * Created by PhpStorm.
 * User: nhmayaou
 * Date: 20/11/16
 * Time: 20:42
 */

namespace Fideni\CoreBundle\Controller;

use Fideni\CoreBundle\Entity\Campaign;
use Fideni\CoreBundle\Entity\Cession;
use Fideni\CoreBundle\Entity\Subscription;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Fideni\CoreBundle\Form\CessionType;

class AdminController extends BaseAdminController
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
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

        $campaign = $this->getDoctrine()->getRepository('FideniCoreBundle:Campaign')->getLastEnabled();
        if($campaign instanceof  Campaign){
            $subscription->setCampaign($campaign);
        }

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

    public function cessionAction(){

        $this->entity = $this->get('easyadmin.config.manager')->getEntityConfiguration('Cession');
        $easyadmin = $this->request->attributes->get('easyadmin');

        $entity = $easyadmin['item'];
        $fields = $this->entity['new']['fields'];

        $cession = new Cession();
        $cession->setSeller($entity);
//        $form = $this->createEntityForm($subscription, $fields, 'new');

        $shares = $this->getDoctrine()->getRepository('FideniCoreBundle:Share')->getUserShareBuilder($entity->getId());
        $form = $this->createForm(CessionType::class, $cession, ['userId' => $entity->getId()]);
        dump($this->entity['templates']['new'],$form);
        $form = $this->createEntityForm($cession,$fields,'new');
                    dump($form);
//die;
//        dump($shares);die;
//        $form->get('shares')->setData($shares);
//        $form->setData([]);
        $formOptions = $this->getEntityFormOptions($cession,'new');
//        dump($formOptions);die;
        return $this->render($this->entity['templates']['new'], array(
            'form' => $form->createView(),
            'entity_fields' => $fields,
            'entity' => $entity
        ));

        dump($entity);die;
    }

    protected function prePersistCampaignEntity()
    {
        $this->getDoctrine()->getRepository('FideniCoreBundle:Campaign')->disable();
    }

    public function createNewSubscriptionEntity()
    {
        $subscription = new Subscription();

        $campaign = $this->getDoctrine()->getRepository('FideniCoreBundle:Campaign')->getLastEnabled();
        if($campaign instanceof  Campaign){
            $subscription->setCampaign($campaign);
        }

        return $subscription;

    }
}