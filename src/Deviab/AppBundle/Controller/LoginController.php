<?php

namespace Deviab\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Deviab\AppBundle\Entity\Login;
use Deviab\AppBundle\Form\LoginType;

/**
 * Login controller.
 *
 * @Route("/login")
 */
class LoginController extends Controller
{

    /**
     * Lists all Login entities.
     *
     * @Route("/", name="login")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeviabAppBundle:Login')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Login entity.
     *
     * @Route("/", name="login_create")
     * @Method("POST")
     * @Template("DeviabAppBundle:Login:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Login();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('login_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Login entity.
     *
     * @param Login $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Login $entity)
    {
        $form = $this->createForm(new LoginType(), $entity, array(
            'action' => $this->generateUrl('login_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Login entity.
     *
     * @Route("/new", name="login_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Login();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Login entity.
     *
     * @Route("/{id}", name="login_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeviabAppBundle:Login')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Login entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Login entity.
     *
     * @Route("/{id}/edit", name="login_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeviabAppBundle:Login')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Login entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Login entity.
    *
    * @param Login $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Login $entity)
    {
        $form = $this->createForm(new LoginType(), $entity, array(
            'action' => $this->generateUrl('login_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Login entity.
     *
     * @Route("/{id}", name="login_update")
     * @Method("PUT")
     * @Template("DeviabAppBundle:Login:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeviabAppBundle:Login')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Login entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('login_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Login entity.
     *
     * @Route("/{id}", name="login_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeviabAppBundle:Login')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Login entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('login'));
    }

    /**
     * Creates a form to delete a Login entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('login_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
