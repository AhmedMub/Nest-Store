<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'address', 'addressTwo', 'district', 'area', 'fname', 'lname', 'email', 'postal_code', 'payment_method', 'amount', 'additional_info', 'transaction_id', 'invoice_no', 'currency', 'shipping_date', 'delivered_date', 'canceled_date', 'canceled_reason', 'discounted_coupon', 'phone', 'coupon_discount_percentage', 'shipping_fees', 'subtotal', 'cancel_request'
    ];

    //relation
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function userOrders()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('fname', 'like', '%' . $val . '%')
            ->OrWhere('lname', 'like', '%' . $val . '%')
            ->OrWhere('email', 'like', '%' . $val . '%')
            ->OrWhere('amount', 'like', '%' . $val . '%')
            ->OrWhere('invoice_no', 'like', '%' . $val . '%')
            ->OrWhereDate('created_at', 'like', '%' . $val . '%');
    }
}
