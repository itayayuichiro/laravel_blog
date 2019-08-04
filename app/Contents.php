<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $fillable = ['title', 'html', 'category_id','bg_image'];

    public static function findAll()
    {
        return Contents::all(Contents::publishableFields());
    }

    public static function findRecord($id)
    {
        return Contents::select(Contents::publishableFields())->findOrFail($id);
    }

    public static function updateRecord($input, $id)
    {
        $menu = Contents::findOrFail($id);
        $menu->fill($input)->save();
        return true;
    }

    public static function deleteRecord($id)
    {

        $menu = Contents::findOrFail($id);
        $menu->delete();
        return true;
    }


    private static function publishableFields()
    {
        return array_merge(['id'], (new static)->fillable);
    }

    public static function searchByKeyword($keyword)
    {
        return Contents::where('title', 'LIKE', "%" . $keyword . "%")->orWhere('description', 'LIKE',
            "%" . $keyword . "%")->select(Contents::publishableFields())->get();
    }

}
