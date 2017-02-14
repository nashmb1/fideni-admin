<?php
/**
 * Created by PhpStorm.
 * User: nhmayaou
 * Date: 12/02/17
 * Time: 00:32
 */

namespace Fideni\UserBundle\Controller;

use Fideni\UserBundle\Form\UserType;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;

class UserProfileController extends Controller
{

    /**
     * @param null $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id = null)
    {
        $user = $this->getUser();

        if(!is_null($id)){
            $user = $this->getDoctrine()->getRepository('FideniUserBundle:User')->findOneBy(['id' => $id]);
        }
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('@FideniUser/Profile/show.html.twig', array(
            'user' => $user,
            'id'   => $id
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var $userManager UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $userManager->updateUser($user);

            return $this->redirectToRoute('fideni_user_profile_show');
        }

        return $this->render('@FideniUser/Profile/edit.html.twig', [
           'form' => $form->createView() 
        ]);
    }
}