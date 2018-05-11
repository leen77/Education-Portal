<?php

use frontend/controllers/CController

class PaypalController extends CController
{

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	//=========================================================================
	//   M A I N   A C T I O N 
	//=========================================================================
	public function actionCheckout()
	{ 
         $PP = new paypal_payments; 
		 if(isset($_POST))
		 {
			$PP->attributes=$_POST;
			if($PP->save()) {
				switch( $PP->payment_status) {
					case 'Pending':
						$message .= "Pending Payment - reason : ".$PP->pending_reason.'<br />'; 
						if ($PP->pending_reason == 'unilateral')
						   $message .= '... because email address is not registered and/or confirmed onto a PayPal account.<br /><br />';  
						break;
					case 'Completed':
						if ($PP->txn_type=='reversal') {
							$reason_code=$PP->reason_code;
							$reverse_order=true;
						} else { 
							$process_order=true;
						}
						break;
					case 'Failed':
						// this will only happen in case of echeck.
						$message .= 'Failed Payment';
						break;
					case 'Denied':
						// denied payment by us
						$message .= "Denied Payment";
						break;
					case 'Refunded':
						// payment refunded by us
						$message .= "Refunded Payment";
						break;
					case 'Canceled':
						// reversal cancelled
						// mark the payment as dispute cancelled		
						$message .= "Cancelled reversal";
						break;
					default:
						// order is not good
						$message .= "Unknown Payment Status". $PP->payment_status;
					break;
				} 
				//Send emails or take any action as you desire with post data, process order, message etc.!
			}
		 }			
	}
}
