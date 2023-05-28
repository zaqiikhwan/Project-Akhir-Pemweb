<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\CoreApi;
class PaymentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
public function qrisTransferCharge(Request $req)
    {
        try {
            $transaction = array(
                "payment_type" => "gopay",
                "transaction_details" => [
                    "gross_amount" => 10000,
                    "order_id" => date('Y-m-dHis')
                ],
                "customer_details" => [
                    "email" => "budi.utomo@Midtrans.com",
                    "first_name" => "Azhar",
                    "last_name" => "Ogi",
                    "phone" => "+628948484848"
                ],
                "item_details" => array(
                    [
                        "id" => "1388998298204",
                        "price" => 5000,
                        "quantity" => 1,
                        "name" => "Panci Miako"
                    ],
                    [
                    "id" => "1388998298202",
                    "price" => 5000,
                    "quantity" => 1,
                    "name" => "Ayam Geprek"
                    ]
                ),
            );
$charge = CoreApi::charge($transaction);
        if (!$charge) {
            return ['code' => 0, 'messgae' => 'Terjadi kesalahan'];
        }
        return ['code' => 1, 'messgae' => 'Success', 'result' => $charge];
        } catch (\Exception $e) {
            return ['code' => 0, 'messgae' => 'Terjadi kesalahan'];
        }
    }
            // return response()->json($charge);
}
