<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ClassModel extends Model
{
    protected $table = 'class';
    static  function getRecord()
{
    $return= ClassModel::select('class.*', 'users.name as created_by_name')
                                    
                                    ->join('users','users.id','class.created_by');
                                    if(!empty(FacadesRequest::get('name')))
                                        {
                                            $return =$return->where('class.name','like', '%'. FacadesRequest::get('name').'%');
                                        }
                                        if(!empty(FacadesRequest::get('date')))
                                        {
                                            $return =$return->whereDate('class.created_at','=', FacadesRequest::get('date'));
                                        }
                                    $return=$return->where('class.is_delete', '=',0)
                                    ->orderBy('class.id', 'desc')
                                    ->paginate(30);
    return $return;
}
static function getSingle($id)
{
    return self::find($id);
}
static function getClass()
{
    $return= ClassModel::select('class.*')
                                    
                                    ->join('users','users.id','class.created_by')
                                    ->where('class.is_delete', '=',0)
                                    ->where('class.status', '=',0)
                                    ->orderBy('class.name', 'asc')
                                    ->get();
    return $return;
}
}

