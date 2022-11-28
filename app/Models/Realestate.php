<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Realestate extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const STATUS_RADIO = [
        '0' => 'Rent',
        '1' => 'Sale',
    ];

    public const ACTIVE_RADIO = [
        '0'   => 'Active',
        '1' => 'Inactive',
    ];

    public $table = 'realestates';

    protected $appends = [
        'images',
        'video',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'video_url',
        'title_en',
        'title_ar',
        'title_tr',
        'description_en',
        'description_ar',
        'description_tr',
        'price',
        'status',
        'salon_num',
        'room_num',
        'area',
        'property_type',
        'active',
        'year_of_creation',
        'location',
        'owner_name',
        'city_id',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImagesAttribute()
    {
        $files = $this->getMedia('images');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getVideoAttribute()
    {
        return $this->getMedia('video')->last();
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    

    public function getTitleAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->title_en;
        }elseif(\App::getLocale() == 'ar'){
            return $this->title_ar;
        }else{
            return $this->title_tr;

        }
    }
    public function getDescriptionAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->description_en;
        }elseif(\App::getLocale() == 'ar'){
            return $this->description_ar;
        }else{
            return $this->description_tr;
        }
    }
}
