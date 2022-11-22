<?php

namespace TP\pedidosBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CustomEmail extends Constraint
{
     public $message = 'La cuenta de email "%string%" ha superado la cantidad de 3 pedidos realizados';

public function validatedBy()
    {
        return 'custom_email';
    }
      
}
