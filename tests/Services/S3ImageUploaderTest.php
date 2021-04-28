<?php

declare(strict_types=1);

namespace Tests\Services;


use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Juve534\LgtmGenerator\Entities\Image;
use Juve534\LgtmGenerator\Services\S3ImageUploader;
use PHPUnit\Framework\TestCase;

class S3ImageUploaderTest extends TestCase
{
    private array $awsParam = [
        'region' => 'ap-northeast-1',
        'version' => '2006-03-01'
    ];

    /**
     * @test
     */
    public function アップロード成功()
    {
        $mock = new MockHandler();
        $mock->append(new Result(['foo' => 'bar']));
        $this->awsParam['handler'] = $mock;

        $stubClass = new S3ImageUploader(new S3Client($this->awsParam));
        $stubClass->upload(new Image(
            'hoge',
            'fuga',
            tempnam('/tmp', 'FOO')
        ));

        $this->assertTrue(true);
    }
}