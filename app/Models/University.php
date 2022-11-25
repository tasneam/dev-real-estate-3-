<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const UNIVERSITY_RANKING_SELECT = [
        '2' => 'private',
        '1' => 'government',
    ];

    public const EDUCATIONAL_LEVEL_SELECT = [
        '1' => 'level1',
        '2' => 'level2',
        '3' => 'level3',
        '4' => 'level4',
        '5' => 'level5',
        '6' => 'level6',
    ];

    public $table = 'universities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_en',
        'name_ar',
        'name_tr',
        'university_ranking',
        'educational_level',
        'city_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getnameAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->name_en;
        }elseif(\App::getLocale() == 'ar'){
            return $this->name_ar;
        }else{
            return $this->name_tr;

        }
    }
}
