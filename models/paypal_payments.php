<?php

class paypal_payments extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'paypal_payments':
	 * @var integer $id
	 * @var string $payer_id
	 * @var string $payment_date
	 * @var string $txn_id
	 * @var string $first_name
	 * @var string $last_name
	 * @var string $payer_email
	 * @var string $payer_status
	 * @var string $payment_type
	 * @var string $memo
	 * @var string $item_name
	 * @var string $item_number
	 * @var integer $quantity
	 * @var string $mc_gross
	 * @var string $mc_currency
	 * @var string $address_name
	 * @var string $address_street
	 * @var string $address_city
	 * @var string $address_state
	 * @var string $address_zip
	 * @var string $address_country
	 * @var string $address_status
	 * @var string $payer_business_name
	 * @var string $payment_status
	 * @var string $pending_reason
	 * @var string $reason_code
	 * @var string $txn_type
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'paypal_payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('payer_id','length','max'=>60),
			array('payment_date','length','max'=>50),
			array('txn_id','length','max'=>50),
			array('first_name','length','max'=>50),
			array('last_name','length','max'=>50),
			array('payer_email','length','max'=>75),
			array('payer_status','length','max'=>50),
			array('payment_type','length','max'=>50),
			array('item_name','length','max'=>127),
			array('item_number','length','max'=>127),
			array('mc_gross','length','max'=>9),
			array('mc_currency','length','max'=>3),
			array('address_name','length','max'=>255),
			array('address_street','length','max'=>255),
			array('address_city','length','max'=>255),
			array('address_state','length','max'=>255),
			array('address_zip','length','max'=>255),
			array('address_country','length','max'=>255),
			array('address_status','length','max'=>255),
			array('payer_business_name','length','max'=>255),
			array('payment_status','length','max'=>255),
			array('pending_reason','length','max'=>255),
			array('reason_code','length','max'=>255),
			array('txn_type','length','max'=>255),
			array('quantity', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'payer_id' => 'Payer',
			'payment_date' => 'Payment Date',
			'txn_id' => 'Txn',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'payer_email' => 'Payer Email',
			'payer_status' => 'Payer Status',
			'payment_type' => 'Payment Type',
			'memo' => 'Memo',
			'item_name' => 'Item Name',
			'item_number' => 'Item Number',
			'quantity' => 'Quantity',
			'mc_gross' => 'Mc Gross',
			'mc_currency' => 'Mc Currency',
			'address_name' => 'Address Name',
			'address_street' => 'Address Street',
			'address_city' => 'Address City',
			'address_state' => 'Address State',
			'address_zip' => 'Address Zip',
			'address_country' => 'Address Country',
			'address_status' => 'Address Status',
			'payer_business_name' => 'Payer Business Name',
			'payment_status' => 'Payment Status',
			'pending_reason' => 'Pending Reason',
			'reason_code' => 'Reason Code',
			'txn_type' => 'Txn Type',
		);
	}
}