<?php

namespace TP\pedidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PedidosNewType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('telefono')
            ->add('email')
            ->add('descripcion')
            ->add('captcha', 'captcha', array(
        
        
         'as_url' => true,
         'reload' => true,
           
   
    ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TP\pedidosBundle\Entity\Pedidos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tp_pedidosbundle_pedidos';
    }
}
