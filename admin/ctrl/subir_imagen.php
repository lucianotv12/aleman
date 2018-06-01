<?php
//echo " aca ennnntroo";die;
error_reporting(E_ALL);
ini_set('display_errors', '1');

		require '../aws/aws-autoloader.php';

		use Aws\S3\S3Client;

		$bucket = 'ibris';
        $accessKey = 'AKIAJJ4QWM5QASG63C5A';
		$secretKey = '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';

		$filename = $_FILES["imagen"]["tmp_name"];

		// 1. Instantiate the client.
		$client = S3Client::factory(array(
			'region'            => 'us-west-2',
            'version'           => '2006-03-01',
            'signature_version' => 'v4',
            'credentials' => [
                'key' => $accessKey,
                'secret' => $secretKey,
            ]
));
// Upload a file.
$result = $client->putObject(array(
    'Bucket'       => $bucket,
    'Key'          => "images/productos/". $nombre_img,
    'SourceFile'   => $filename,
    'ContentType'  => 'text/plain',
    'ACL'          => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
    'Metadata'     => array(    
        'param1' => 'value 1',
        'param2' => 'value 2'
    )
));

echo $result['ObjectURL'];
?>
