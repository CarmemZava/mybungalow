<?php
// Criamos o ficheiro paypal.php mas podia também incluir no service.php abaixo do recaptcha, isso foi feito para manter mais organizado
return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'),
    'sandbox' => [
        'client_id'     => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
        // As variáveis acima já foram "declaradas" no .env
    ],
    'payment_action' => 'Sale',
    'currency'       => 'EUR',
    'notify_url'     => '',
    'locale'         => 'pt_PT',
    'validate_ssl'   => true,
];
