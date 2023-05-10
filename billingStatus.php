<?php 
$clientV = new SoapClient('http://soadev.dephub.go.id:7800/SimponiBRI_Service?wsdl',array('trace' => 1,'exceptions' => 1, 'cache_wsdl' => 0));

$params = array(
	'appsId' => '051',
	'invoiceNo' => '200002',
    'routeId' => '001',
    'TrxId'=>'VA0000000001',
    'UserId'=>'0',
    'Password'=>'0',
    'KodeBillingSimponi'=>'820221115363458',
    'KodeKL'=>'022',
    'KodeEselon1'=>'05',
    'KodeSatker'=>'465657',
);

$result = $clientV->BillingStatus($params);

$data = json_decode(json_encode($result), true);
print_r($data);

echo '<br><br><b>RESPONSE:</b><br>';
echo 'Code: '.$data['ResponseCode'].'<br>';
echo 'message: '.$data['ResponseMessage'].'<br>';
  	 
echo 'SimponiTrxId: '.$data['ResponseData']['SimponiTrxId'].'<br>';
echo 'NTB: '.$data['ResponseData']['NTB'].'<br>';
echo 'NTPN: '.$data['ResponseData']['NTPN'].'<br>';
echo 'TrxDate: '.$data['ResponseData']['TrxDate'].'<br>';
echo 'BankPersepsi: '.$data['ResponseData']['BankPersepsi'].'<br>';
echo 'ChannelPembayaran: '.$data['ResponseData']['ChannelPembayaran'].'<br>';

?>