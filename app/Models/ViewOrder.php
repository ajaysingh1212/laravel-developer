<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViewOrder extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'view_orders';

    protected $dates = [
        'delevery_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ORDER_STATUS_SELECT = [
        'panding'   => 'Panding',
        'processed' => 'Process',
        'confirmed' => 'Confirmed',
        'cancle'    => 'Cancle',
        'hold'      => 'Hold',
    ];

    protected $fillable = [
        'order_related_by_id',
        'product_id',
        'total_price',
        'quantity',
        'delevery_date',
        'order_status',
        'order_number',
        'user_name',
        'user_email',
        'user_phone',
        'user_state',
        'user_city',
        'user_pincode',
        'user_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function order_bies()
    {
        return $this->belongsToMany(User::class);
    }

    public function order_related_by()
    {
        return $this->belongsTo(User::class, 'order_related_by_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getDeleveryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeleveryDateAttribute($value)
    {
        $this->attributes['delevery_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
