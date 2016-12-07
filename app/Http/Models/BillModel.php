<?php
namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    protected $table = 'bill';

    protected $fillable = ['id','name','phone','address','total','time'];

    protected $hidden = [];

    public $timestamps = false;

}