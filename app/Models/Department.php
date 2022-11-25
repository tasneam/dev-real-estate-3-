<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'departments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_en',
        'name_ar',
        'name_tr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function departmentUniversities()
    {
        return $this->belongsToMany(University::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getNameAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->name_en;
        }elseif(\App::getLocale() == 'ar'){
            return $this->name_ar;
        }else{
            return $this->name_tr;

        }
    }
}
