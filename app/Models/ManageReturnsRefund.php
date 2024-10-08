<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageReturnsRefund extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'manage_returns_refunds';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_by_id',
        'cancled_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const CANCLED_STATUS_SELECT = [
        'request approve' => 'Request Approved',
        'request cancle'  => 'Request Cancle',
        'request hold'    => 'Request Hold',
        'request panding' => 'Request Panding',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function product_bies()
    {
        return $this->belongsToMany(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function order_by()
    {
        return $this->belongsTo(ViewOrder::class, 'order_by_id');
    }
}
