<?php

namespace TP\pedidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use TP\pedidosBundle\Validator\Constraints as MiValidador;

/**
 * Pedidos
 */
class Pedidos
{
    /**
     * @var integer
     */
    private $idPedido;

    /**
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @Assert\NotBlank()
     */
    private $telefono;

    /**
     * @MiValidador\CustomEmail
     * @Assert\Email(
     *     message = "El email '{{ value }}' no es un formato de email válido.",
     *     checkMX = true
     * )
     * 
     */
    private $email;

    /**
     * @var string
     */
    private $tipoPedido;

    /**
     * @Assert\NotBlank()
     */
    private $descripcion;

    /**
     * @var \DateTime
     */
    private $fechaHora;

    /**
     * @var string
     */
    private $estado;


    /**
     * Get idPedido
     *
     * @return integer 
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Pedidos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Pedidos
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Pedidos
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tipoPedido
     *
     * @param string $tipoPedido
     * @return Pedidos
     */
    public function setTipoPedido($tipoPedido)
    {
        $this->tipoPedido = $tipoPedido;

        return $this;
    }

    /**
     * Get tipoPedido
     *
     * @return string 
     */
    public function getTipoPedido()
    {
        return $this->tipoPedido;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Pedidos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return Pedidos
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime 
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Pedidos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
