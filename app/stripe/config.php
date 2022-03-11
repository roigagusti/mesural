<?php 
$plans = array( 
    '1' => array( 
        'name' => 'Manos a la obra', 
        'price' => 9.99, 
        'interval' => 'month' 
    ), 
    '2' => array( 
        'name' => 'Profesional', 
        'price' => 19.99, 
        'interval' => 'month' 
    )
); 
$currency = "EUR";  

/* PRUEBA *
define('STRIPE_API_KEY', 'sk_test_51IQ79SDzY9AsmTJ8r9YX3CqYBNtjd06LLO3TUyrLdHZRKXViP7CZIDCWE834Qtkhuaf0Xit7vKjo7tVZBt6uk3gJ002Yj4eKvJ'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51IQ79SDzY9AsmTJ8Bq56HQ3XoV8axtwcgs73TsppvSDlKjW3UBVahw8Z1gaHDCWdgjK1eZaMoBskAb8kcNlnGaMM00nTudY0dg'); 

/* REAL */
define('STRIPE_API_KEY', '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'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_live_51IQ79SDzY9AsmTJ8hiX2lz9102ZGFktUH60mWQVQ0sESraSBRH7ExuJYOJLWPvQ6UQBbdHU43LlzIWOwYo1Gl0CX007He3oaWN');
?>