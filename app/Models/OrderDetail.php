<?php
/*
* ProBot Version: 4.0
* Laravel Version: 10x
* Description: This source file "app/Models/_OrderDetail.php" was generated by ProBot AI.
* Date: 2/19/2025 11:57:43 AM
* Contact: towhid1@outlook.com
*/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderDetail extends Model{
    protected $table="order_details";
    protected $fillable =['order_id', 'product_id', 'qty', 'price', 'vat', 'uom_id', 'discount'];

    public function products(){
        return  $this->belongsTo(Product::class, 'product_id');
    }
    public function product(){
        return  $this->belongsTo(Product::class, 'product_id');
    }

}
?>
