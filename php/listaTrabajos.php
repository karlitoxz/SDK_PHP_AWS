<?php 
//https://www.fullstackoasis.com/articles/2019/09/16/how-to-use-the-amazon-aws-sdk-for-textract-with-php-7-2/
    use Aws\Textract\TextractClient;

    $options = [
        'region'            => 'us-east-2',
        'version'           => '2018-06-27',
        'signature_version' => 'v4',
    ];

    $s3Textract = new TextractClient($options);

$result = $s3Textract->getDocumentAnalysis([
    'JobId' => 'adecafae3d50be5dbf812a76707fbc08fbc08d51eea1af4412b0c3b3d22e0b04', // REQUIRED
]);


if($result["JobStatus"] == 'SUCCEEDED'){
    $blocks = $result['Blocks'];
    // Loop through all the blocks:
    foreach ($blocks as $key => $value) {
        if (isset($value['BlockType']) && $value['BlockType']) {
            $blockType = $value['BlockType'];
            if (isset($value['Text']) && $value['Text']) {
                $text = $value['Text'];
                if ($blockType == 'WORD') {
                    echo $text.' ';
                } else if ($blockType == 'LINE') {
                    echo $text.' ';
                }
            }
        }
        '<br>';
    }

}



 ?>