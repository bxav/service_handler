<?php
namespace Bxav\Bundle\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class CustomerAdmin extends Admin
{
    
    protected $baseRoutePattern = 'customer';
    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('user')
                ->add('email')
                ->add('username')
                ->add('firstname')
                ->add('lastname')
                ->end();

    }
    
    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('user')
                ->add('email')
                ->add('username')
                ->add('firstname')
                ->add('lastname');
    }
    
    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('user')
            ->add('email')
            ->add('username')
            ->add('firstname')
            ->add('lastname');
    }
}