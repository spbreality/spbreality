<?php

namespace Spb\RealityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Контроллер объектов недвижимости.
 *
 * @Route("/admin/{rtype}", requirements={"rtype" = "(room|flat|land|house|office|storehouse|building)"})
 */
class RealtyController extends Controller
{
    /**
     * Показать все объекты недвижимости определенного типа.
     *
     * @Route("/", name="admin_realty")
     */
    public function indexAction($rtype)
    {
        $realtySearch = 'Spb\\RealityBundle\\Entity\\Search\\' . ucwords($rtype) . 'Search';
        $realtySearchType = 'Spb\\RealityBundle\\Form\\Search\\' . ucwords($rtype) . 'SearchType';
        
        //Создаем доменный объект, в котором хранятся параметры поиска
        $rSearch = new $realtySearch();
        //Создаем форму поиска
        $searchForm = $this->createForm(new $realtySearchType(), $rSearch);
        $searchForm->bindRequest($this->getRequest());
                
        $em = $this->getDoctrine()->getEntityManager();

        $repository = $em->getRepository('SpbRealityBundle:' . ucwords($rtype));
        $query = $repository->createQueryBuilder('r')
                ->getQuery();
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1), /*номер страницы*/
            $this->container->getParameter('rows_per_page') /*количество записей на странице*/
        );

        return $this->render('SpbRealityBundle:Realty:index_' . $rtype . '.html.twig', array('entities' => $pagination, 'search_form' => $searchForm->createView()));
    }
    
    /**
     * Найти и отоброзить объект недвижимости
     *
     * @Route("/{id}/show", name="admin_realty_show")
     * @Template()
     */
    public function showAction($rtype, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $entity = $em->getRepository('SpbRealityBundle:' . ucwords($rtype))->find($id);

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
     * @Route("/new", name="admin_realty_new")
     * @Template()
     */
    public function newAction($rtype)
    {
        $realty = 'Spb\\RealityBundle\\Entity\\' . ucwords($rtype);
        $formType = 'Spb\\RealityBundle\\Form\\' . ucwords($rtype) . 'Type';
        
        $entity = new $realty();
        $form   = $this->createForm(new $formType, $entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Создать новый объект недвижимости.
     *
     * @Route("/create", name="admin_realty_create")
     * @Method("post")
     * @Template("SpbRealityBundle:Realty:new.html.twig")
     */
    public function createAction($rtype)
    {
        $realty = 'Spb\\RealityBundle\\Entity\\' . ucwords($rtype);
        $formType = 'Spb\\RealityBundle\\Form\\' . ucwords($rtype) . 'Type';
        
        $entity = new $realty();
        $form   = $this->createForm(new $formType, $entity);

        $request = $this->getRequest();
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_realty_show', array('rtype' => $rtype, 'id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }
    
    /**
     * Отобразить форму редактирования объекта недвижимости.
     *
     * @Route("/{id}/edit", name="admin_realty_edit")
     * @Template()
     */
    public function editAction($rtype, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SpbRealityBundle:' . ucwords($rtype))->find($id);
               
        if (!$entity) {
            throw $this->createNotFoundException('Объект недвижимости не найден.');
        }


        $formType = 'Spb\\RealityBundle\\Form\\' . ucwords($rtype) . 'Type';
        
        $editForm   = $this->createForm(new $formType, $entity);
               
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
        
    }

    /**
     * Редактировать объект недвижимости
     *
     * @Route("/{id}/update", name="admin_realty_update")
     * @Method("post")
     * @Template("SpbRealityBundle:Flat:edit.html.twig")
     */
    public function updateAction($rtype, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SpbRealityBundle:' . ucwords($rtype))->find($id);
                
        if (!$entity) {
            throw $this->createNotFoundException('Объект недвижимости не найден.');
        }

        $formType = 'Spb\\RealityBundle\\Form\\' . ucwords($rtype) . 'Type';       
        $editForm   = $this->createForm(new $formType, $entity);
        
        $deleteForm = $this->createDeleteForm($id);
        $request = $this->getRequest();
        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_realty_edit', array('rtype' => $rtype, 'id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Удаляет объект недвижимости.
     *
     * @Route("/{id}/delete", name="admin_realty_delete")
     * @Method("post")
     */
    public function deleteAction($rtype, $id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
        
            $em = $this->getDoctrine()->getEntityManager();

            $entity = $em->getRepository('SpbRealityBundle:' . ucwords($rtype))->find($id);
            
            if (!$entity) {
                throw $this->createNotFoundException('Объект недвижимости не найден.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_realty', array('rtype' => $rtype)));
    }
    
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

}
