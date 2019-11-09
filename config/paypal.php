<?php
// return[
// 	'client_id' => env('PAYPAL_CLIENT_ID','AcB55JNDdMHz0NwiLbozuZoygsA1nwEOKSJPFlpVOCsgRbIeeCJIF4mP5HvVwjnfjELGHiIa9SUS7iEI'),
// 	'secret' => env('PAYPAL_SECRET','EDxglVgAHxEFcn3bcoaISY1kreREqC3xDTPU8kR-D0VSmQql1fNt0tFZWoj0vREXmH7m9Wzcr_SfwGP1'),
// 	'settings' => array(
// 		'mode' => env('PAYPAL_MODE','sandbox'),
// 		'http.ConnectionTimeOut' => 30,
// 		'log.LogEnabled' => true,
// 		'log.FileName' => storage_path().'/logs/paypal.log',
// 		'log.LogLevel' => 'Error',
// 	)
// ] 


return [ 
    // Testing 
//     'client_id' => env('PAYPAL_CLIENT_ID','AcB55JNDdMHz0NwiLbozuZoygsA1nwEOKSJPFlpVOCsgRbIeeCJIF4mP5HvVwjnfjELGHiIa9SUS7iEI'),
//     'secret' => env('PAYPAL_SECRET','EDxglVgAHxEFcn3bcoaISY1kreREqC3xDTPU8kR-D0VSmQql1fNt0tFZWoj0vREXmH7m9Wzcr_SfwGP1'),
    
//    'client_id' => env('PAYPAL_CLIENT_ID','AXOuEpJl4RNRZWRUUK6ppypNQC1bbJUAuqLrgafHCKBkT3PJayUCI0_NPMBiVd4ioC1FJx5mtwccXBFE'),
//    'secret' => env('PAYPAL_SECRET','EEXAsvgCXKvmwM_xLDwbJYMpB4q2PWy_OjOJFUD5POIsKqndXamJ-AYwCGPmFxPmuTgpWsOABj5Dne53'),
    
// Live
    
    'client_id' => env('PAYPAL_CLIENT_ID','AVPHRyoiXEL5cTbDfHSJVXt44WmuR47u-358USeuBePzSCFvguU7AYgfRzT2m9vIb91gF8pg5teYnawf'),
    'secret' => env('PAYPAL_SECRET','EMRD3B0SnC40hXpGdt8RlcNV1kClkN3mqNxcfoCu8zwfGutNjNhQ_KiHWcbDUseoCtyevJk5TCvJuV4O'),
    
    'settings' => array(
        'mode' => env('PAYPAL_MODE','live'),
        //'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];
?>