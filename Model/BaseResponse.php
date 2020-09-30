<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class BaseResponse.
 */
class BaseResponse
{
    /**
     * @var array
     */
    protected $errorMessages;

    /**
     * @var array
     */
    protected $donnees;

    /**
     * BaseResponse constructor.
     */
    public function __construct()
    {
        $this->errorMessages = [];
        $this->donnees = [];
    }

    /**
     * @return array
     */
    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }

    /**
     * @param array $errorMessages
     *
     * @return self
     */
    public function setErrorMessages(array $errorMessages): self
    {
        $this->errorMessages = $errorMessages;

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
