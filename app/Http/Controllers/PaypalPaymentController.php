<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use URL;
use App\Cart;
use App\Product;
use App\Order;
use DB;
use Auth;

class PaypalPaymentController extends Controller {

    private $_api_context;

    public function __construct() {
        /** PayPal api context * */
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'], $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function paywithpaypal() {

        // 	$oldCart = Session::get('cart');
        //        $cart = new Cart($oldCart);
        //        print_r($cart);
        //        die();
        //        return view('paypalPay',['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        return view('paypalPay');
    }

    public function paymentPaypal(Request $request) {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = $cart->totalPrice;

        if (Session::has('cart')) {
            foreach ($products as $product) {

                $items = new Item();
                $items->setName($product['item']['product_name']) /** item name * */
                        ->setCurrency('INR')
                        ->setQuantity($product['qty'])
                        ->setPrice($product['item']['product_price']);
                $response[] = $items;
            }
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // $item_1 = new Item();
        // $item_1->setName('Item 1') /** item name **/
        //             ->setCurrency('USD')
        //             ->setQuantity('2')
        //             ->setPrice('1'); /** unit price **/
        // $item_2 = new Item();
        // $item_2->setName('Item 2') /** item name **/
        //             ->setCurrency('USD')
        //             ->setQuantity('3')
        //             ->setPrice('1'); /** unit price **/


        $item_list = new ItemList();
        //        $item_list->setItems(array($item_1,$item_2));
        $item_list->setItems($response);

        // echo "<pre>";
        // print_r($item_list);
        // //print_r($item_list1);
        // //die();

        $order = new Order();
        $amount = new Amount();
        $amount->setCurrency('INR')
                ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL * */
                ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

        /** dd($payment->create($this->_api_context));exit; * */
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                //return Redirect::route('paypalPay');
                return Redirect::to('/checkout');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                //return Redirect::route('paypalPay');
                return Redirect::to('/checkout');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session * */
        Session::put('paypal_payment_id', $payment->getId());

        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->contact = $request->input('contact');
        $order->postal_code = $request->input('postal_code');
        $order->city = $request->input('city');
        $order->payment_id = $payment->getId();
        $order->payment_status = "Pending";
        $order->transaction_id = "Pending";
        $order->payment_details = "Pending";
        Auth::user()->orders()->save($order);

        if (isset($redirect_url)) {
            /** redirect to paypal * */
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        //return Redirect::route('paypalPay');
        return Redirect::to('/checkout');
    }

    public function getPaymentStatus() {
        /** Get the payment ID before session clear * */
        $payment_id = Session::get('paypal_payment_id');
        $pay_id = $payment_id;
        /** clear the session payment ID * */
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            //return Redirect::route('/paypalPay');
            return Redirect::to('/checkout');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /*         * Execute the payment * */
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            $state = $result->getState();
            $t_id = $result->transactions[0]->related_resources[0]->sale->id;
            DB::table('orders')
                    ->where('payment_id', $pay_id)
                    ->update(['payment_status' => $state,'transaction_id' => $t_id,'payment_details' => $result]);

//                    echo"<pre>";
//                    print_r($result);
//                    die;
            \Session::put('success', 'Payment success');
            //return Redirect::route('/paypalPay');
            return Redirect::to('/checkout');
        }
//                echo"<pre>";
//                print_r($result);
//                    die;
        \Session::put('error', 'Payment failed');
        //return Redirect::route('/paypalPay');
        return Redirect::to('/checkout');
    }

}
