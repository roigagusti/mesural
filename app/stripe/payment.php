<?php 
// Include configuration file  
require_once 'config.php'; 

include_once("../conexiones/conexion.php");
session_start();
include_once("../sections/sessionStart.php");
 
// Get user ID from current SESSION 
$userID = $userId;

 
$payment_id = $statusMsg = $api_error = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
if(!empty($_POST['subscr_plan']) && !empty($_POST['stripeToken'])){ 
     
    // Retrieve stripe token and user info from the submitted form data 
    $token  = $_POST['stripeToken']; 
    $name = $userName; 
    $email = $userEmail; 
     
    // Plan info 
    $planID = $_POST['subscr_plan']; 
    $planInfo = $plans[$planID]; 
    $planName = $planInfo['name']; 
    $planPrice = $planInfo['price']; 
    $planInterval = $planInfo['interval']; 
     
    // Include Stripe PHP library 
    require_once '../vendor/stripe/stripe-php/init.php'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
     
    // Add customer to stripe 
    try {  
        $customer = \Stripe\Customer::create(array( 
            'email' => $email, 
            'source'  => $token 
        )); 
    }catch(Exception $e) {  
        $api_error = $e->getMessage();  
    } 
     
    if(empty($api_error) && $customer){  
     
        // Convert price to cents 
        $priceCents = round($planPrice*100); 
     
        // Create a plan 
        try { 
            $plan = \Stripe\Plan::create(array( 
                "product" => [ 
                    "name" => $planName 
                ], 
                "amount" => $priceCents, 
                "currency" => $currency, 
                "interval" => $planInterval, 
                "interval_count" => 1 
            )); 
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        } 
         
        if(empty($api_error) && $plan){ 
            // Creates a new subscription 
            try { 
                $subscription = \Stripe\Subscription::create(array( 
                    "customer" => $customer->id, 
                    "items" => array( 
                        array( 
                            "plan" => $plan->id, 
                        ), 
                    ), 
                )); 
            }catch(Exception $e) { 
                $api_error = $e->getMessage(); 
            } 
             
            if(empty($api_error) && $subscription){ 
                // Retrieve subscription data 
                $subsData = $subscription->jsonSerialize(); 
         
                // Check whether the subscription activation is successful 
                if($subsData['status'] == 'active'){ 
                    // Subscription info 
                    $subscrID = $subsData['id']; 
                    $custID = $subsData['customer']; 
                    $planID = $subsData['plan']['id']; 
                    $planAmount = ($subsData['plan']['amount']/100); 
                    $planCurrency = $subsData['plan']['currency']; 
                    $planinterval = $subsData['plan']['interval']; 
                    $planIntervalCount = $subsData['plan']['interval_count']; 
                    $created = date("Y-m-d H:i:s", $subsData['created']); 
                    $current_period_start = date("Y-m-d H:i:s", $subsData['current_period_start']); 
                    $current_period_end = date("Y-m-d H:i:s", $subsData['current_period_end']); 
                    $status = $subsData['status']; 
                     
                    // Include database connection file  
                    //include_once 'dbConnect.php'; 
         
                    // Insert transaction data into the database 
                    $transData = $database->insert("user_subscriptions_details", [
                        "user_id" => $userID,
                        "stripe_subscription_id" => $subscrID,
                        "stripe_customer_id" => $custID,         
                        "stripe_plan_id" => $planID,
                        "plan_amount" => $planAmount,
                        "plan_amount_currency" => $planCurrency,
                        "plan_interval" => $planinterval,
                        "plan_interval_count" => $planIntervalCount,
                        "payer_email" => $email,
                        "created" => $created,
                        "plan_period_start" => $current_period_start,
                        "plan_period_end" => $current_period_end,
                        "status" => $status
                    ]);  
                    if($planAmount==19.99){
                        $planType=2;
                    }elseif($planAmount==9.99){
                        $planType=1;                        
                    }else{
                        $planType=0; 
                    }

                    $updateUser = $database->update("users", [
                        "subscription_id" => $subscrID,
                        "plan"=> $planType
                    ],["id"=>$userID]); 
                     
                    $ordStatus = 'success'; 
                    $statusMsg = 'Your Subscription Payment has been Successful!'; 
                }else{ 
                    $statusMsg = "Subscription activation failed!"; 
                } 
            }else{ 
                $statusMsg = "Subscription creation failed! ".$api_error; 
            } 
        }else{ 
            $statusMsg = "Plan creation failed! ".$api_error; 
        } 
    }else{  
        $statusMsg = "Invalid card details! $api_error";  
    } 
}else{ 
    $statusMsg = "Error on form submission, please try again."; 
} 
?>

<div class="container">
    <div class="status">
        <h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
        <?php if(!empty($subscrID)){ ?>
            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $subscrID; ?></p>
            <p><b>Transaction ID:</b> <?php echo $subscrID; ?></p>
            <p><b>Amount:</b> <?php echo $planAmount.' '.$planCurrency; ?></p>
			
            <h4>Subscription Information</h4>
            <p><b>Plan Name:</b> <?php echo $planName; ?></p>
            <p><b>Amount:</b> <?php echo $planPrice.' '.$currency; ?></p>
            <p><b>Plan Interval:</b> <?php echo $planInterval; ?></p>
            <p><b>Period Start:</b> <?php echo $current_period_start; ?></p>
            <p><b>Period End:</b> <?php echo $current_period_end; ?></p>
            <p><b>Status:</b> <?php echo $status; ?></p>
        <?php } ?>
    </div>
    <a href="../perfil.php" class="btn-link">Back to Subscription Page</a>
    <?php header('Location: ../perfil.php');?>
</div>