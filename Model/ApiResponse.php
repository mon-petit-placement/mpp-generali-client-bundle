<?php

namespace Mpp\GeneraliClientBundle\Model;

class ApiResponse
{
    /**
     * @var string|null
     */
    private $statut;

    /**
     * @var array|null
     */
    private $messages;

    /**
     * @var array|null
     */
    private $donnees;

    /**
     * Get the value of statut
     *
     * @return  string|null
     */ 
    public function getStatut(): ?string
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @param  string|null  $statut
     *
     * @return  self
     */ 
    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of messages
     *
     * @return  array|null
     */ 
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * Set the value of messages
     *
     * @param  array|null  $messages
     *
     * @return  self
     */ 
    public function setMessages(?array $messages): self
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * Get the value of donnees
     *
     * @return  array|null
     */ 
    public function getDonnees(): ?array
    {
        return $this->donnees;
    }

    /**
     * Set the value of donnees
     *
     * @param  array|null  $donnees
     *
     * @return  self
     */ 
    public function setDonnees(?array $donnees): self
    {
        $this->donnees = $donnees;

        return $this;
    }
}
