<?php 

	use Aws\Textract\TextractClient;

	$options = [
	    'region'            => 'us-east-2',
	    'version'           => '2018-06-27',
	    'signature_version' => 'v4',
	];

	$s3Textract = new TextractClient($options);
//PDF asyncronico necesita de listaTrabajos
$options = [
    'DocumentLocation' => [
        'S3Object' => [
            'Bucket' => 'micarpeta',
            'Name' => 'miarchivo.pdf',
        ],
    ],
    'FeatureTypes' => ['FORMS'], // REQUIRED TABLES | FORMS
];

try {
	$result = $s3Textract->StartDocumentAnalysis($options);
} catch (AwsException $e) {
    // output error message if fails
    echo $e->getMessage();
    echo "\n";
}

var_dump($result);

//JPG y PNG sincronico
//https://www.fullstackoasis.com/articles/2019/09/16/how-to-use-the-amazon-aws-sdk-for-textract-with-php-7-2/

// The file in this project.
/*$filename = "aws_cli_text_document.jpg";
$file = fopen($filename, "rb");
$contents = fread($file, filesize($filename));
fclose($file);
$options = [
    'Document' => [
		'Bytes' => $contents
    ],
    'FeatureTypes' => ['FORMS'], // REQUIRED
];
$result = $client->analyzeDocument($options);
// If debugging:
// echo print_r($result, true);
$blocks = $result['Blocks'];
// Loop through all the blocks:
foreach ($blocks as $key => $value) {
	if (isset($value['BlockType']) && $value['BlockType']) {
		$blockType = $value['BlockType'];
		if (isset($value['Text']) && $value['Text']) {
			$text = $value['Text'];
			if ($blockType == 'WORD') {
				echo "Word: ". print_r($text, true) . "\n";
			} else if ($blockType == 'LINE') {
				echo "Line: ". print_r($text, true) . "\n";
			}
		}
	}
}
*/

 ?>