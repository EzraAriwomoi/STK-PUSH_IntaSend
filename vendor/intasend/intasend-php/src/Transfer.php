<?php
namespace IntaSend\IntaSendPHP;

use IntaSend\IntaSendPHP\Traits\BaseAPITrait;

class Transfer  
{
    use BaseAPITrait;

    public function init($credentials)
    {
        $this->credentials=$credentials;
    }

    public function send_money($provider, $currency, $transactions, $callback_url=null, $wallet_id=null)
    {
        $payload=[
            'provider'=> $provider,
            'currency'=> $currency,
            'transactions'=> $transactions,
            'callback_url'=> $callback_url,
            'wallet_id' => $wallet_id
        ];
        $payload=json_encode($payload);
        return $this->send_request('POST','/send-money/initiate/',$payload);
    }

    public function approve($payload)
    {
        $payload=json_encode($payload);
        return $this->send_request('POST','/send-money/approve/',$payload);
    }

    public function status($tracking_id)
    {
        $payload=[
            'tracking_id'=> $tracking_id,
        ];
        $payload=json_encode($payload);
        return $this->send_request('POST','/send-money/status/', $payload);
    }

    public function mpesa($currency, $transactions, $callback_url=null, $wallet_id=null)
    {
        $provider = "MPESA-B2C";
        return $this->send_money($provider, $currency, $transactions, $callback_url=$callback_url, $wallet_id=$wallet_id);
    }

    public function mpesa_b2b($currency, $transactions, $callback_url=null, $wallet_id=null)
    {
        $provider = "MPESA-B2B";
        return $this->send_money($provider, $currency, $transactions, $callback_url=$callback_url, $wallet_id=$wallet_id);
    }

    public function intasend($currency, $transactions, $callback_url=null, $wallet_id=null)
    {
        $provider = "INTASEND";
        return $this->send_money($provider, $currency, $transactions, $callback_url=$callback_url, $wallet_id=$wallet_id);
    }

    public function bank($currency, $transactions, $callback_url=null, $wallet_id=null)
    {
        $provider = "PESALINK";
        return $this->send_money($provider, $currency, $transactions, $callback_url=$callback_url, $wallet_id=$wallet_id);
    }
    
    public function airtime($currency, $transactions, $callback_url=null, $wallet_id=null)
    {
        $provider = "AIRTIME";
        return $this->send_money($provider, $currency, $transactions, $callback_url=$callback_url, $wallet_id=$wallet_id);
    }
}
