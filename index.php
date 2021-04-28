<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

if (!empty($_FILES['img'])) {
    $s3Client = new \Aws\S3\S3Client([
        'region' => 'ap-northeast-1',
        'version' => '2006-03-01'
    ]);

    $service = new \Juve534\LgtmGenerator\Services\S3ImageUploader($s3Client);
    $service->upload(new \Juve534\LgtmGenerator\Entities\Image(
        'juve534-lgtm-generator-temporary',
        uniqid(),
        $_FILES['img']['tmp_name']
    ));
}
?>
<form action="./" method="post" enctype="multipart/form-data">
    <input type="file" name="img">
    <input type="submit" value="Submit"/>
</form>