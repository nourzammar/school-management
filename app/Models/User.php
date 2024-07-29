<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     *@var array<string, string>
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    static function getEmailSingle($email)
    {
        return User::where('email', '=',$email)->first();
    }
    static function getAdmin()
    {
        $return= self::select('users.*')->where('user_type','=',1)
                                        ->where('is_delete', '=',0);
                                        if(!empty(FacadesRequest::get('name')))
                                        {
                                            $return =$return->where('name','like', '%'. FacadesRequest::get('name').'%');
                                        }
                                        if(!empty(FacadesRequest::get('email')))
                                        {
                                            $return =$return->where('email','like', '%'. FacadesRequest::get('email').'%');
                                        }
                                        if(!empty(FacadesRequest::get('date')))
                                        {
                                            $return =$return->whereDate('created_at','=', FacadesRequest::get('date'));
                                        }
                         $return =$return->orderBy('id','desc')
                                        ->paginate(20);
            return $return;
    }
    static function getStudent()
    {
        $return= self::select('users.*', 'class.name as class_name')
                        ->join('class', 'class.id','=','users.class_id','left')
                       ->where('users.user_type','=',3)
                        ->where('users.is_delete', '=',0);                                        
                         $return =$return->orderBy('users.id','desc')
                                        ->paginate(20);
            return $return;
    }
    static function getParent()
    {
        $return= self::select('users.*',)
                       ->where('users.user_type','=',4)
                        ->where('users.is_delete', '=',0);                                        
                         $return =$return->orderBy('users.id','desc')
                                        ->paginate(20);
            return $return;
    }
    static function getSingle($id)
    {
        return self::find($id);
    }
    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile' .$this->profile_pic))
        {
            return url('upload/profile' ,$this->profile_pic);
        }
        else
        {
            return "";
        }
    }
}
