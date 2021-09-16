<?php 

try {
    $result = $s3Client->deleteObject([
        'Bucket' => 'micarpeta',
        'Key' => 'FILE_NAME',
    ]);
 
} catch (Aws\S3\Exception\S3Exception $e) {
    // output error message if fails
    echo $e->getMessage();
}

 ?>