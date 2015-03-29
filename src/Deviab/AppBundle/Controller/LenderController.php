<?php

namespace Deviab\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Deviab\AppBundle\Entity\Lender;
use Deviab\AppBundle\Form\LenderType;

/**
 * Lender controller.
 *
 * @Route("/lender")
 */
class LenderController extends Controller
{

    /**
     * Lists all Lender entities.
     *
     * @Route("/", name="lender")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeviabAppBundle:Lender')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Lender entity.
     *
     * @Route("/", name="lender_create")
     * @Method("POST")
     * @Template("DeviabAppBundle:Lender:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Lender();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lender_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Lender entity.
     *
     * @param Lender $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Lender $entity)
    {
        $form = $this->createForm(new LenderType(), $entity, array(
            'action' => $this->generateUrl('lender_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Lender entity.
     *
     * @Route("/new", name="lender_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Lender();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Lender entity.
     *
     * @Route("/{id}", name="lender_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeviabAppBundle:Lender')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lender entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Lender entity.
     *
     * @Route("/{id}/edit", name="lender_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeviabAppBundle:Lender')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lender entity.');
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
    * Creates a form to edit a Lender entity.
    *
    * @param Lender $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Lender $entity)
    {
        $form = $this->createForm(new LenderType(), $entity, array(
            'action' => $this->generateUrl('lender_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Lender entity.
     *
     * @Route("/{id}", name="lender_update")
     * @Method("PUT")
     * @Template("DeviabAppBundle:Lender:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeviabAppBundle:Lender')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lender entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lender_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Lender entity.
     *
     * @Route("/{id}", name="lender_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeviabAppBundle:Lender')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lender entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lender'));
    }

    /**
     * Creates a form to delete a Lender entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lender_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
