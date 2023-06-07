<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Midtrans\CoreApi;
use App\Http\Controllers\Midtrans\Notification;
use App\Models\Order;
use Illuminate\Support\Str;

// $notif = new \App\Http\Controllers\Midtrans\Notification();
// $notif = $notif->getResponse();
// $transaction = $notif->transaction_status;
// $type = $notif->payment_type;
// $order_id = $notif->order_id;
// $fraud = $notif->fraud_status;
class PaymentsController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function qrisTransferCharge(Request $req) {
    try {
        $transaction = array(
            "payment_type" => "gopay",
            "transaction_details" => [
                "order_id" => Str::uuid()->toString(),
            ],
            "customer_details" => [
                "email"=> $req->input('email'),
                "address" => $req->input('address'),
                "first_name" => $req->input('name'),
                "phone" => $req->input('phone'),
            ],
            "item_details" => array(
                [
                    "id" => 'order-id: ' . Str::random(15) . time(),
                    "price" => $req->input('total'),
                    "quantity" => $req->input('quantity'),
                    "name" => $req->input('product_name'),
                ],
            ),
        );

        $charge = CoreApi::charge($transaction);
        if (!$charge) {
            return ['code' => 0, 'message' => 'Terjadi kesalahan'];
        }
        Order::create([
            'id' => $transaction['transaction_details']['order_id'],
            'quantity' => $transaction['item_details'][0]['quantity'],
            'price' => $charge->gross_amount,
            'qris_code' => $charge->actions[0]->url,
            'status' => 'pending',
            'product_id' => $req->input('product_id'),
        ]);
            // return view("user.pages.payment", ['data' => $charge, 'product'=>$req->all()]);
            return ['code' => 200, 'message' => 'success', 'result' => $charge];
        } catch (\Exception $e)
        {
            return ['code' => 0, 'message' => 'Terjadi kesalahan: '. $e->getMessage()];
        }
    }
}
