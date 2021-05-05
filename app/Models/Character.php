<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Character extends Model
{


    protected $table = 'characters';

    protected $fillable = [
        'id',
        'name',
        'description',
        'power',
    ];

    public static function enterCharacter(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'power' => ['required','numeric']
        ]);

        $character = new Character;
        $character->name = $request->get('name');
        $character->description = $request->get('description');
        $character->power = $request->get('power');
        $character->save();

        return $character;
    }







/*
    public function scopeName ($query,$name)
    {
        if($name)
            return $query->where('name','LIKE',"%$name%");

    }

    public function scopeDescription($query,$description)
    {
        if($description)
            return $query->where('description','LIKE',"%$description%");
    }

    public function scopePower($query,$power)
    {
        if($power)
            return $query->where('power','LIKE',"%$power%");

    }
*/


}
