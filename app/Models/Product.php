<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, HasFactory;

    public $table = 'products';

    public static $searchable = [
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'photo',
        'product_image_2',
        'product_image_3',
    ];

    public const STATUS_SELECT = [
        'panding' => 'Panding',
        'approve' => 'Approved',
        'cancle'  => 'Cancled',
        'review'  => 'Review',
    ];

    protected $fillable = [
        'name',
        'price',
        'discount',
        'description',
        'long_description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function selectProductCoupons()
    {
        return $this->hasMany(Coupon::class, 'select_product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(ProductTag::class);
    }

    public function product_colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function select_brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getProductImage2Attribute()
    {
        $file = $this->getMedia('product_image_2')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getProductImage3Attribute()
    {
        $file = $this->getMedia('product_image_3')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
