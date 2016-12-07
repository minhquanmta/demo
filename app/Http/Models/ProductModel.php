<?php
	namespace App\Http\Models;


	use Illuminate\Database\Eloquent\Model;

	class ProductModel extends Model
	{
		protected $table = 'product';

		protected $fillable = ['id','name','category','brand','color','size','quantity','image0','image','description','is_new' ,'is_featured' ,'username'];

		protected $hidden = [];

		public $timestamps = false;


        /**
         * @return array
         */
        public function getName()
        {
            return $this->select(array('id', 'name'));
        }
	}