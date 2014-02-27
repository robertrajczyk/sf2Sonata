<?php

namespace Polcode\ShopBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class ProductAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name_en', 'text', array('label' => 'Product Name (EN)'))
            ->add('name_fr', 'text', array('label' => 'Product Name (FR)'))
            ->add('category', 'sonata_type_model_list', array('label' => 'Category'))
            ->add('price', 'number', array('label' => 'Price'))
        ;
    }
 
    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('category.name')
            ->add('price')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name_en')
            ->addIdentifier('name_fr')
            ->add('category.name')
            ->add('price')
			->add('_action', 'actions', array(
			'actions' => array(
				'countprod' => array() 
			))); 
    }
}