<?php
/*
* ProBot Version: 4.0
* Laravel Version: 10x
* Description: This source file "app/Models/_Purchase.php" was generated by ProBot AI.
* Date: 2/19/2025 11:58:05 AM
* Contact: towhid1@outlook.com
*/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Purchase extends Model{
    // public function supplier(){
    //     return  $this->belongsTo(Supplier::class);
    // }
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

}
?>
