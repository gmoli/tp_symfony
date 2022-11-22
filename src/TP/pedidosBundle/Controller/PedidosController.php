<?php


namespace TP\pedidosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use TP\pedidosBundle\Entity\Pedidos;
use Symfony\Component\HttpFoundation\Request;
use TP\pedidosBundle\Form\PedidosType;
use TP\pedidosBundle\Form\PedidosNewType;

class PedidosController extends Controller
{
    public function indexAction(){
        return $this->render('TPpedidosBundle:Pedidos:index.html.twig');
    }
    
    public function listarAction()
	{
	$em = $this->getDoctrine()->getEntityManager();
	$pedidos = $em->getRepository('TPpedidosBundle:Pedidos')->findAll();
	return $this->render('TPpedidosBundle:Pedidos:listar.html.twig', array('pedidos' => $pedidos));

        }
        
    
    
    public function newAction(){
        
        $request = $this->getRequest();
        $pedido = new Pedidos();
        $form = $this->createForm(new PedidosNewType(), $pedido);
        
        if($request->getMethod() == 'POST')
            {
		$form->bind($request);
                
                
		if($form->isValid())
                   {
                        $errors = $this->get('validator')->validate($pedido);
                        if (count($errors) > 0) {
                            return $this->render('TPpedidosBundle:Pedidos:validate.html.twig', array('errors' => $errors, ));
                        }
                        
                        $pedido->setEstado('Nuevo Pedido');
                        $pedido->setFechaHora(new \DateTime(date("Y-m-d H:i:s")));
			$em = $this->getDoctrine()->getEntityManager();
                      
			$em->persist($pedido);
			$em->flush();
			return $this->redirect($this->generateURL('pedido_confirmacion'));
                
                    }
            }
 
        
        return $this->render('TPpedidosBundle:Pedidos:new.html.twig', array(
            'form' => $form->createView(),
        ));
        
        
    }
    
    public function confirmacionAction(){
        return $this->render('TPpedidosBundle:Pedidos:confirmacion.html.twig');
    }
    
    
    public function editAction($id_pedido)

    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $pedido = $em->getRepository('TPpedidosBundle:Pedidos')->find($id_pedido);
        if (!$pedido) {

            throw $this->createNotFoundException('No se ha encontrado pedido ');

         }
        $form = $this->createForm(new PedidosType(), $pedido);
        if($request->getMethod() == 'POST')
        {   
            $form->bind($request);
            if($form->isValid())

            {
              
              $pedido->setNombre($form->get('nombre')->getData());
              $pedido->setTelefono($form->get('telefono')->getData());
              $pedido->setTipoPedido($form->get('tipoPedido')->getData());
              $pedido->setDescripcion($form->get('descripcion')->getData());
              $pedido->setFechaHora($form->get('fechaHora')->getData());
              $pedido->setEstado($form->get('estado')->getData());
              $em->persist($pedido);
              $em->flush();
              return $this->redirect($this->generateURl('pedido_listar'));
            }
        } 
       return $this->render('TPpedidosBundle:Pedidos:edit.html.twig', array('form' => $form->createView(),'id_pedido' => $id_pedido  ));




    }     

    

    
}




?>