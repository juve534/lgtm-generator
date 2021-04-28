<?php

declare(strict_types=1);


namespace Juve534\LgtmGenerator\Exceptions;

class ImageUploaderException extends \ErrorException
{
    public function __construct($message = null, $code = 0, $previous = null)
    {
        $previous = $previous instanceof \Exception ? $previous : null;
        parent::__construct($message, $code, $severity = 1, $filename = __FILE__, $lineno = __LINE__, $previous);
    }
}
