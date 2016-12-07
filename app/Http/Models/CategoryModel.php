<?php
	namespace App\Http\Models;


	use Illuminate\Database\Eloquent\Model;

	class CategoryModel extends Model
	{
        protected $table = 'category';

		protected $fillable = ['id','name'];

		protected $hidden = [];

		public $timestamps = false;

	}