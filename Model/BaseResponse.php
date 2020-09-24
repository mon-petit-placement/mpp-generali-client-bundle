<?php

namespace Mpp\GeneraliClientBundle\Model;

class BaseResponse
{
    /**
     * @var array
     */
    protected $messages;

    /**
     * @var array
     */
    protected $donnees;

    /**
     * BaseResponse constructor.
     */
    public function __construct()
    {
        $this->messages = [];
        $this->donnees = [];
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     *
     * @return self
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * @return array
     */
    public function getDonnees()
    {
        return $this->donnees;
    }

    /**
     * @param array $donnees
     *
     * @return self
     */
    public function setDonnees(array $donnees): self
    {
        $this->donnees = $donnees;

        return $this;
    }
}
