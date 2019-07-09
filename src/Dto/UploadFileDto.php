<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

use JsonSerializable;

class UploadFileDto implements JsonSerializable
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $file;

    /**
     * @param string $path
     * @param string $file
     */
    public function __construct(string $path, string $file)
    {
        $this->setPath($path)
            ->setFile($file);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     *
     * @return UploadFileDto
     */
    public function setPath(string $path): UploadFileDto
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     *
     * @return UploadFileDto
     */
    public function setFile(string $file): UploadFileDto
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return [
            'path' => $this->getPath(),
            'file' => base64_encode($this->getFile())
        ];
    }
}
