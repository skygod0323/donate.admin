<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Donation;
use App\Entities\Billing;
use App\Entities\Crypto;
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Charge;
use App\Mail\Receipt;
use Illuminate\Support\Facades\Mail;


class DonationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        ApiClient::init(env('COINBASE_COMMERCE_KEY'));
    }

    public function index() {
        $donations = Donation::with('billing')->orderBy('created_at', 'desc')->get();
        return view('donations', compact('donations'));
    }

    public function create(Request $request) {

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_KEY')
        );

        $input = $request->input();

        $account = $input['account'];
        $billing_info = $input['billing'];

        $cardDetail = $input['card'];
        $var = preg_split("#/#", $cardDetail['expDate']);

        /// here card detail
        $card_number = str_replace(' ', '', $cardDetail['cardNumber']);
        $exp_month = intval(str_replace([' ', '0'], '', $var[0]));
        $exp_year = intval(str_replace(' ', '', $var[1]));
        $cvc = $cardDetail['cardCVV'];

        $payment_id = null;

        if ($input['donate_type'] == 'single') {
            $card = $stripe->tokens->create([
                'card' => [
                    'number' => $card_number,
                    'exp_month' => $exp_month,
                    'exp_year' => $exp_year,
                    'cvc' => $cvc,
                ],
            ]);

            $charge = $stripe->charges->create([
                'amount' => $cardDetail['amount'] * 100,
                'currency' => 'gbp',
                'source' => $card['id'],
                'description' => 'AL-AN SAR Donation',
            ]);

            $payment_id = $charge['id'];

        } else {

            /// create payment method
            $pm = $stripe->paymentMethods->create([
                'type' => 'card',
                'card' => [
                    'number' => $card_number,
                    'exp_month' => $exp_month,
                    'exp_year' => $exp_year,
                    'cvc' => $cvc
                ],
            ]);

            //// create customer
            $cus = $stripe->customers->create([
                'name' => $account['firstName'] . ' ' . $account['lastName'],
                'email' => $account['email'],
                'description' => 'Customer for donation',
                'payment_method' => $pm['id']
            ]);

            /// create product
            $prod = $stripe->products->create([
                'name' => 'Subscription for donation',
            ]);

            /// create price
            $price = $stripe->prices->create([
                'unit_amount' => $cardDetail['amount'] * 100,
                'currency' => 'gbp',
                'recurring' => ['interval' => 'month'],
                'product' => $prod['id'],
            ]);

            /// create subscription
            $subscription = $stripe->subscriptions->create([
                'customer' => $cus['id'],
                'items' => [
                  ['price' => $price['id']],
                ],
                'default_payment_method' => $pm['id']
            ]);

            $payment_id = $subscription['id'];
        }

        

        $donation = new Donation;
        $donation->type = $input['donate_type'];
        $donation->amount = $cardDetail['amount'];
        $donation->first_name = $account['firstName'];
        $donation->last_name = $account['lastName'];
        $donation->email = $account['email'];
        $donation->phone = $account['phone'];
        $donation->get_mail = $account['getMail'];
        $donation->get_sms = $account['getSMS'];
        $donation->donor_wall = $account['donorWall'];
        $donation->donor_wall_name = $account['donorWallName'];
        $donation->gift_add = $account['giftAdd'];

        if ($account['giftAdd']) {
            /// add billing info
            $billing = new Billing;
            $billing->first_name = $account['firstName'];
            $billing->last_name = $account['lastName'];
            $billing->company = $billing_info['company'];
            $billing->house = $billing_info['house'];
            $billing->apartment = $billing_info['apartment'];
            $billing->city = $billing_info['city'];
            $billing->country = $billing_info['country'];
            $billing->postcode = $billing_info['postcode'];
            $billing->email = $account['email'];
            $billing->phone = $account['phone'];

            $billing->save();

            $donation->billing_id = $billing->id;
        }

        $donation->payment_id = $payment_id;
        $donation->save();

        $res = Mail::to($donation->email)->send(new Receipt($donation));

        return response()->json(['success' => true]);
    }

    public function cryptoDonation() {
        error_log('Some message here.');
        
        $chargeData = [
            'name' => 'Donation',
            'description' => 'AL-AN SAR Donation',
            'local_price' => [
                'amount' => '0.01',
                'currency' => 'GBP'
            ],
            'pricing_type' => 'fixed_price'
        ];
        $res = Charge::create($chargeData);

        $crypto = new Crypto;
        $crypto->charge_code = $res['code'];
        $crypto->status = 'pending';
        $crypto->save();

        $hosted_url = $res['hosted_url'];
        return response()->json(['success' => true, 'hosted_url' => $hosted_url]);
    }

    public function summary() {
        $total_amount = Donation::sum('amount');
        $count = Donation::count();

        return response()->json(['success' => true, 'total_amount' => $total_amount, 'count' => $count]);
    }

    
}
