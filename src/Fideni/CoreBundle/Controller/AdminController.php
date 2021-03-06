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
use Pagerfanta\Pagerfanta;
use Symfony\Component\PropertyAccess\PropertyAccess;

class AdminController extends BaseAdminController
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function subscriptionAction()
    {
        $this->get('request_stack')->getCurrentRequest();
        $this->entity = $this->get('easyadmin.config.manager')->getEntityConfig('Subscription');
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
            $em =  $this->getDoctrine()->getManager();
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


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function userSharesAction()
    {
        $this->entity = $this->get('easyadmin.config.manager')->getEntityConfig('Share');
        $this->request->query->set('entity', 'Share');

        return $this->listAction();
    }

    protected function createShareListQueryBuilder()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');
        $user = $easyadmin['item'];

        return $this->getDoctrine()->getRepository('FideniCoreBundle:Share')->getUserShareBuilder($user);
    }
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function cessionAction()
    {
        
        $this->entity = $this->get('easyadmin.config.manager')->getEntityConfiguration('Cession');
        $easyadmin = $this->request->attributes->get('easyadmin');

        $entity = $easyadmin['item'];
        $fields = $this->entity['new']['fields'];

        $cession = new Cession();
        $cession->setSeller($entity);

//        $shares = $this->getDoctrine()->getRepository('FideniCoreBundle:Share')->getUserShareBuilder($entity->getId());
        $form = $this->createForm(CessionType::class, $cession, ['userId' => $entity->getId()]);

        if($form->isSubmitted() && $form->isValid()){
            $em =  $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('easyadmin', array(
                'action' => 'list',
                'entity' => 'Cession'
            ));
        }

        return $this->render('@FideniCore/default/cession.html.twig', array(
            'form' => $form->createView(),
            'entity_fields' => $fields,
            'entity' => $entity
        ));

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