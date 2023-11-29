<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $guarded = [];

    protected $appends = ['logo_path','icon_path'];

    public function getLogoPathAttribute(){
        return asset('/uploads/setting_images/' . $this->logo);
    }

    public function getIconPathAttribute(){
        return asset('/uploads/setting_images/' . $this->icon);
    }
}
