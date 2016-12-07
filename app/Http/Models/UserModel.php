<?php
	namespace App\Http\Models;


	use Illuminate\Database\Eloquent\Model;

	class UserModel extends Model
	{
		protected $table = 'user';

		protected $fillable = ['id','username', 'fullname','user_group_id','permission'];

		protected $hidden = [];

		public $timestamps = false;
	}