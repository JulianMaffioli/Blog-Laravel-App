<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $table = 'posts';

    //Primary Key
    public $PK = 'id';

    //Timestamps
    public $timestamps = true;

    //Retationship between User and Post
    public function user(){
        return $this->belongsTo('App\User');
    }

}
