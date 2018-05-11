<?php
/**
 * Paypal Extension class file.
 * 
 * @author Deepak Pradhan <deepak.pradhan@IncisiveSystem.com>
 * @link http://gemisoft.com
 * @version 0.2
 */
class Paypal extends CApplicationComponent {
	public $useSandBox = true; 
	public $notify_url = 'http://gemisoft.com/hulkseo/checkpayment.php';
	private $sandbox    = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	private $production = 'https://www.paypal.com/cgi-bin/webscr';
	private $buttinImg  = 'https://www.paypal.com/en_US/i/btn/btn_cart_LG.gif';

	public $oParams    = null;

	public function showButton($typ) 
	{
		$action  = ($this->useSandBox)?$this->sandbox:$this->production;

		echo "<form method='$post' action='$action'>";
		foreach ($this->oParams as $key => $val) {
			echo '<input type="hidden" name="'.$key.'" value="'.$val.'">'."\n";
		}
		echo CHtml::submitButton(' Pay via Paypal');
		echo "</form>";
		//public static string submitButton(string $label='submit', array $htmlOptions=array ( ))
	}
}