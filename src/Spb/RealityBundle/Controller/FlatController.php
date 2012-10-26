<?php

namespace Spb\RealityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Spb\RealityBundle\Entity\Flat;
use Spb\RealityBundle\Form\FlatType;

/**
 * Flat controller.
 *
 * @Route("/admin/flat")
 */
class FlatController extends Controller
{
    /**
     * Lists all Flat entities.
     *
     * @Route("/", name="admin_flat")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('SpbRealityBundle:Flat')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Flat entity.
     *
     * @Route("/{id}/show", name="admin_flat_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SpbRealityBundle:Flat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Flat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            );
    }

    /**
     * Displays a form to create a new Flat entity.
     *
     * @Route("/new", name="admin_flat_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Flat();
        $form   = $this->createForm(new FlatType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Flat entity.
     *
     * @Route("/create", name="admin_flat_create")
     * @Method("post")
     * @Template("SpbRealityBundle:Flat:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Flat();
        $request = $this->getRequest();
        $form    = $this->createForm(new FlatType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_flat_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Flat entity.
     *
     * @Route("/{id}/edit", name="admin_flat_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SpbRealityBundle:Flat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Flat entity.');
        }

        $editForm = $this->createForm(new FlatType(), $entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
     * Edits an existing Flat entity.
     *
     * @Route("/{id}/update", name="admin_flat_update")
     * @Method("post")
     * @Template("SpbRealityBundle:Flat:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SpbRealityBundle:Flat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Flat entity.');
        }

        $editForm   = $this->createForm(new FlatType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_flat_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Flat entity.
     *
     * @Route("/{id}/delete", name="admin_flat_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('SpbRealityBundle:Flat')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Flat entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_flat'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
