<?php
/*
* ProBot Version: 4.0
* Laravel Version: 10x
* Description: This source file "app/Models/_Order.php" was generated by ProBot AI.
* Date: 2/19/2025 11:57:23 AM
* Contact: towhid1@outlook.com
*/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    public function customers(){
        return  $this->belongsTo(Customer::class, 'customer_id');
    }
    // public function shipping_address(){
    //     return  $this->belongsTo(Customer::class, 'shipping_address');
    // }


}
?>
