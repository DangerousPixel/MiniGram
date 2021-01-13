<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : '/profile/SgseEcsCaTTdfulfNmEGd39IE9bz6VQ4ftXLR0BV.png';
        return '/storage/' . $imagePath ;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
        }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
