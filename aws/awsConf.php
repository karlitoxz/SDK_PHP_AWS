<?php 
	require 'aws-autoloader.php';

	use Aws\S3\S3Client;

	$options = [
	    'region'            => 'us-east-2',
	    'version'           => '2006-03-01',
	    'signature_version' => 'v4',
	];

	$s3Client = new S3Client($options);

?>