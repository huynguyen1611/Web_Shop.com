<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'type',
        'value',
        'max_discount',
        'quantity',
        'start_date',
        'end_date',
        'status'
    ];

    public function isValid()
    {
        $now = now(); // Lấy thời gian hiện tại

        return $this->status &&                                   // Trạng thái được kích hoạt (1)
            $this->quantity > 0 &&                                // Vẫn còn số lượng
            (!$this->start_date || $this->start_date <= $now) &&  // Nếu có ngày bắt đầu, thì phải <= hiện tại
            (!$this->end_date || $this->end_date >= $now);        // Nếu có ngày kết thúc, thì phải >= hiện tại
    }

    public function calculateDiscount($cartTotal)
    {
        if ($this->type === 'fixed') {
            return min($this->value, $cartTotal); //giảm 50k , tối đó 40k thì giảm 40k
        } else {
            $discount = $cartTotal * ($this->value / 100); //tổng 200K, giảm 20% → được giảm 40K.
            if ($this->max_discount) {
                return min($discount, $this->max_discount); // giảm 20% nhưng không quá 30K → nếu tính ra được 40K thì chỉ giảm 30K thôi.
            }
            return $discount;
        }
    }
}
