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
        $fields = $this->entity['new']['fields'];
//        dump($fields);die;
        $subscription = new Subscription();
        $subscription->setCampaignNumber(555);
        $return = $this->redirectToRoute('easyadmin', array(
            'action' => 'new',
            'entity' => 'Subscription',
            'entity_fields' => $fields
        ));
        return $return;
        dump($return);die;
//        $this->
//        return $this->redire
    }
}