<?php

declare(strict_types=1);

namespace Juve534\LgtmGenerator\Services;

use Juve534\LgtmGenerator\Entities\Image;

interface ImageUploaderInterface
{
    public function upload(Image $image): void;
}
