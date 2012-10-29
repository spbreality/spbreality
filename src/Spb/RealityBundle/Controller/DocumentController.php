<?php

namespace Spb\RealityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Spb\RealityBundle\Entity\Document;
use Spb\RealityBundle\Form\DocumentType;

/**
 * Document controller.
 *
 * @Route("/admin/document")
 */
class DocumentController extends Controller
{

    /**
     * Displays a form to create a new Document entity.
     *
     * @Route("/{id}/new", name="admin_document_new")
     * @Template()
     */
    public function newAction($id)
    {
        $entity = new Document();
        
        $em = $this->getDoctrine()->getEntityManager();

        $realty = $em->getRepository('SpbRealityBundle:Realty')->find($id);
        
        if (!$realty) {
            throw $this->createNotFoundException('Unable to find Realty entity.');
        }
        
        $entity->setRealty($realty);
        
        $form   = $this->createForm(new DocumentType(), $entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Document entity.
     *
     * @Route("/create", name="admin_document_create")
     * @Method("post")
     */
    public function createAction()
    {
        $entity  = new Document();
        $request = $this->getRequest();
        $form    = $this->createForm(new DocumentType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();
            
        }

        $realty = $entity->getRealty();

        return $this->redirect($this->generateUrl('admin_realty_edit', array('rtype' => $realty->getRealtyType(), 'id' => $realty->getId())));
    }

    /**
     * Deletes a Document entity.
     *
     * @Route("/{id}/delete", name="admin_document_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('SpbRealityBundle:Document')->find($id);        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $realty = $entity->getRealty();
        $rid = $realty->getId();
        $rtype = $realty->getRealtyType();
        
        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_realty_edit', array('rtype' => $rtype, 'id' => $rid)));        
    }

}
