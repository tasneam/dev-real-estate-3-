<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'pages';
    public const LAYOUT_RADIO = [
        '0' => 'realestate',
        '1'=>'tourism',
        '2' => 'studentServices',
        '3' => 'contactus',
        '4' => 'about',

    ];
    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'keywords_en',
        'keywords_ar',
        'keywords_tr',
        'title_en',
        'title_ar',
        'title_tr',
        'description_en',
        'description_ar',
        'description_tr',
        'short_description_en',
        'short_description_ar',
        'short_description_tr',
        'page_title',
        'layout',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function pageItems()
    {
        return $this->hasMany(Item::class, 'page_id', 'id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
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

    public function getshortDescriptionAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->short_description_en;
        }elseif(\App::getLocale() == 'ar'){
            return $this->short_description_ar;
        }else{
            return $this->short_description_tr;
        }
    }

    
    public function getDescriptionAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->short_description_en;
        }elseif(\App::getLocale() == 'ar'){
            return $this->short_description_ar;
        }else{
            return $this->short_description_tr;
        }
    }
}
