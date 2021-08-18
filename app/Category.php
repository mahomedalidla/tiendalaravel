<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//validar
	public static $messages = [
		'name.required' => 'Es necesario ingresar el nombre de la categoria.',
		'name.min' => 'La categoría debe tener como minimo 3 caracteres como nombre.',
		'description.max' => 'El maximo de caracteres permitido para la descripcion corta es de 250.',
	];

	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'max:250'
	];
    	

	protected $fillable = ['name', 'description'];

    public function products(){
    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
		if($this->image) 
			return '/images/categories/'.$this->image;

    	$firstProduct = $this->products()->first();
		if($firstProduct) 
			return $firstProduct->featured_image_url;

		return '/images/default.png';
    }
}
