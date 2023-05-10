<?php 
$clientV = new SoapClient('http://soadev.dephub.go.id:7800/SimponiBRI_Service?wsdl',array('trace' => 1,'exceptions' => 1, 'cache_wsdl' => 0));

$params = array(
	'appsId' => '051',
	'invoiceNo' => '200004',
    'routeId' => '001',
    'data' => array(
    		'PaymentHeader' => array(
    					'TrxId'=>'VA0000000003',
    					'UserId'=>'0',
    					'Password'=>'0',
    					'ExpiredDate'=>'2022-11-29 11:09:00',
    					'DateSent'=>'2022-11-14 11:09:00',
    					'KodeKL'=>'022',
    					'KodeEselon1'=>'05',
    					'KodeSatker'=>'465657',
    					'JenisPNBP'=>'F',
    					'KodeMataUang'=>'1',
    					'TotalNominalBilling'=>'100000',
    					'NamaWajibBayar'=>'Otband3',
    				),
    		'PaymentDetails' => array(
    				'PaymentDetail' => array(
    						'NamaWajibBayar'=>'Otband3',
    						'KodeTarifSimponi'=>'000287', // KDTARIFMPN
    						'KodePPSimponi'=>'201615D', // KDPP
    						'KodeAkun'=>'425516', // KODEAKUN
    						'TarifPNBP'=>'100000', // KDTARIF atau KODETARIF 
    						'Volume'=>'1', 
    						'Satuan'=>'per orang per tahun',
    						'TotalTarifPerRecord'=>'100000',
    					),
    				),
    			),
);

$result = $clientV->PaymentRequest($params);

$data = json_decode(json_encode($result), true);
print_r($data);

echo '<br><br><b>RESPONSE:</b><br>';
echo 'Code: '.$data['response']['code'].'<br>';
echo 'message: '.$data['response']['message'].'<br>';
  	 
echo 'SimponiTrxId: '.$data['response']['simponiData']['SimponiTrxId'].'<br>';
echo 'KodeBillingSimponi: '.$data['response']['simponiData']['KodeBillingSimponi'].'<br>';
echo 'ExpiredDate: '.$data['response']['simponiData']['ExpiredDate'].'<br>';


?>