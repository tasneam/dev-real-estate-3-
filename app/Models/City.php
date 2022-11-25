<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'cities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_en',
        'title_ar',
        'title_tr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cityRealestates()
    {
        return $this->hasMany(Realestate::class, 'city_id', 'id');
    }

    public function cityUniversities()
    {
        return $this->hasMany(University::class, 'city_id', 'id');
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
}
