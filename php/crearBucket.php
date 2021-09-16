<?php 

$bucket = 'micarpeta';
  
try {
    $result = $s3Client->createBucket([
        'Bucket' => $bucket, // REQUIRED
    ]);
    echo "Bucket created successfully.";
} catch (Aws\S3\Exception\S3Exception $e) {
    // output error message if fails
    echo $e->getMessage();
}

		$buckets = $s3Client->listBuckets();
			foreach ($buckets['Buckets'] as $bucket) {
			    echo $bucket['Name'] . "\n";
		}


 ?>