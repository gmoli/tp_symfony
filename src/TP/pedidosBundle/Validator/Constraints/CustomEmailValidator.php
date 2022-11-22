<?php



namespace TP\pedidosBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Doctrine\ORM\EntityManager;


class CustomEmailValidator extends ConstraintValidator
{   
     protected $em;
 
    function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;

    }
       
    public function validate($value, Constraint $constraint)
     {  
       $repository = $this->em->getRepository('TPpedidosBundle:Pedidos');

        $total = $repository->createQueryBuilder('p')
        ->select('COUNT(p)')
        ->where('p.email = :email')
        ->setParameter('email', $value)
        ->getQuery()
        ->getSingleScalarResult();


        if($total > 2){
            $this->context->addViolation($constraint->message, array('%string%' => $value));
        }

      }
      
    
      
      
   
}