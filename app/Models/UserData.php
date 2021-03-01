<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class UserData extends Model
{
    // use HasFactory;
    protected $table = 'user_datas';
    protected $fillable = [
        'last_name','first_name','last_name_fri','first_name_fri','birth_day',
        'prefecture','view_name','email','password','course','university','faculty','department','liberal','user_attribute',
        'j_h_exam','h_exam','comment','updated_at'
        ];
    protected $guarded = [
        'id','created_at'
        ];
    public static function loginValidate(Request $request){
        $users = self::where([
            ['user_id',$request->user_id],
            ['password', $request->password]
        ])->count();
        if($users >0){
            return true;
        }else{
            return false;
        }
    }
}
