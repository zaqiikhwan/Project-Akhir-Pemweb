<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Midtrans\CoreApi;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;

class PaymentsController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function qrisTransferCharge(Request $req) {
    try {
        $transaction = array(
            "payment_type" => "gopay",
            "transaction_details" => [
                "order_id" => Str::uuid()->toString(),

            ],
            "customer_details" => [
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
            return view("user.pages.payment", ['data' => $charge, 'product'=>$req->all()]);
            // return ['code' => 1, 'message' => 'success', 'result' => $charge];
        } catch (\Exception $e)
        {
            return ['code' => 0, 'message' => 'Terjadi kesalahan: '+ $e->getMessage()];
        }
    }
}
