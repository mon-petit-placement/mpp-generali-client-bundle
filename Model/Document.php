<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Document.
 */
class Document
{
    /**
     * @var string
     */
    protected $idDocument;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var bool
     */
    protected $required;

    /**
     * @var bool
     */
    protected $alreadySent;

    /**
     * Document constructor.
     */
    public function __construct()
    {
        $this->alreadySent = false;
    }

    /**
     * @return string
     */
    public function getIdDocument(): string
    {
        return $this->idDocument;
    }

    /**
     * @param string $idDocument
     *
     * @return self
     */
    public function setIdDocument(string $idDocument): self
    {
        $this->idDocument = $idDocument;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     *
     * @return self
     */
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this->filename;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     *
     * @return self
     */
    public function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * @return bool
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     *
     * @return self
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAlreadySent(): bool
    {
        return $this->alreadySent;
    }

    /**
     * @param bool $alreadySent
     *
     * @return self
     */
    public function setAlreadySent(bool $alreadySent): self
    {
        $this->alreadySent = $alreadySent;

        return $this;
    }
}
