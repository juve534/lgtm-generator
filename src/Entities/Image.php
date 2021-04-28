<?php

declare(strict_types=1);


namespace Juve534\LgtmGenerator\Entities;

class Image
{
    public function __construct(
        private string $directory,
        private string $path,
        private string $body
    ) {
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return $this->directory;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}
