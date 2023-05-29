<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Midtrans\CoreApi;
use Illuminate\Support\Str;

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
                "email" => "budi.utomo@Midtrans.com",
                "first_name" => "Azhar",
                "last_name" => "Ogi",
                "phone" => "+628948484848"
            ],
            "item_details" => array(
                [
                    "id" => 'order-id: ' . Str::random(15) . time(),
                    "price" => 7000,
                    "quantity" => $req->input('quantity'),
                    "name" => "Panci Miako"
                ],
            ),
        );
        $charge = CoreApi::charge($transaction);
        if (!$charge) {
            return ['code' => 0, 'message' => 'Terjadi kesalahan'];
        }
            return ['code' => 1, 'message' => 'success', 'result' => $charge];
        } catch (\Exception $e)
        {
            return ['code' => 0, 'message' => 'Terjadi kesalahan: '+ $e->getMessage()];
        }
    }
}
