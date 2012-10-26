<?php

namespace Spb\RealityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Контроллер объектов недвижимости.
 *
 * @Route("/adm")
 */
class RealtyController extends Controller
{
    /**
     * Показать все объекты недвижимости определенного типа.
     *
     * @Route("/", defaults={"rtype" = "flat"}, name="admin_home")
     * @Route("/{rtype}", requirements={"rtype" = "(room|flat)"}, name="admin_realty")
     */
    public function indexAction($rtype)
    {
        $em = $this->getDoctrine()->getEntityManager();

        switch ($rtype) {
            case "flat":
                $entities = $em->getRepository('SpbRealityBundle:Flat')->findAll();                
                break;
            case "room":
                $entities = $em->getRepository('SpbRealityBundle:Room')->findAll();
                break;
            default:
                throw $this->createNotFoundException('Объекты недвижимости неизвестны.');
                break;
        }
        
        return $this->render('SpbRealityBundle:Realty:index_' . $rtype . '.html.twig', array('entities' => $entities));
    }
    
    /**
     * Найти и отоброзить объект недвижимости
     *
     * @Route("/{rtype}/{id}/show", name="admin_realty_show")
     * @Template()
     */
    public function showAction($rtype, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        switch ($rtype) {
            case "flat":
                $entity = $em->getRepository('SpbRealityBundle:Flat')->find($id);
                break;
            case "room":
                $entity = $em->getRepository('SpbRealityBundle:Room')->find($id);
                break;
            default:
                throw $this->createNotFoundException('Объект недвижимости неизвестен.');
                break;
        }

        if (!$entity) {
            throw $this->createNotFoundException('Объект недвижимости не найден.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SpbRealityBundle:Realty:show_' . $rtype . '.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            ));
    }
    
    /**
     * Форма по созданию нового объекта недвижимости.
     *
     * @Route("/{rtype}/new", name="admin_realty_new")
     * @Template()
     */
    public function newAction($rtype)
    {
        switch ($rtype) {
            case "flat":
                $entity = new Flat();
                $form   = $this->createForm(new FlatType(), $entity);
                break;
            case "room":
                $entity = new Room();
                $form   = $this->createForm(new RoomType(), $entity);
                break;
            default:
                throw $this->createNotFoundException('Объект недвижимости неизвестен.');
                break;
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Создать новый объект недвижимости.
     *
     * @Route("/{rtype}/create", name="admin_realty_create")
     * @Method("post")
     * @Template("SpbRealityBundle:Realty:new.html.twig")
     */
    public function createAction($rtype)
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
    
    
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

}
