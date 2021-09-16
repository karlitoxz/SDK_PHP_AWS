<?php 
//https://artisansweb.net/upload-files-amazon-s3-using-aws-php-sdk/

$bucket = 'micarpeta';
$file_Path = 'uploads/miarchivo.pdf';
$key = basename($file_Path);
  
// Upload a publicly accessible file. The file size and type are determined by the SDK.
try {
    $result = $s3Client->putObject([
        'Bucket' => $bucket,
        'Key'    => $key,
        'Body'   => fopen($file_Path, 'r'),
        'ACL'    => 'public-read', // make file 'public'
    ]);
    echo "Image uploaded successfully. Image path is: ". $result->get('ObjectURL');
} catch (Aws\S3\Exception\S3Exception $e) {
    echo "There was an error uploading the file.\n";
    echo $e->getMessage();
}



 ?>