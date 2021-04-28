<?php

declare(strict_types=1);

namespace Juve534\LgtmGenerator\Services;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3ClientInterface;
use Juve534\LgtmGenerator\Entities\Image;
use Juve534\LgtmGenerator\Exceptions\ImageUploaderException;

class S3ImageUploader implements ImageUploaderInterface
{
    public function __construct(
        private S3ClientInterface $client
    ) {
    }

    /**
     * @throws ImageUploaderException
     */
    public function upload(Image $image): void
    {
        try {
            $bucket = $image->getDirectory();
            $key = $image->getPath();
            $body = fopen($image->getBody(),'rb');
            $this->client->upload($bucket, $key, $body);
        } catch (S3Exception $e) {
            throw new ImageUploaderException($e->getCode(), $e->getMessage(), $e);
        }
    }
}
