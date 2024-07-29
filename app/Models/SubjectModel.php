<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request as FacadesRequest;
use PhpParser\Builder\FunctionLike;

class SubjectModel extends Model
{
    protected $table = 'subject';
    static  function getRecord()
{
    $return= SubjectModel::select('subject.*', 'users.name as created_by_name')
                                    
                                    ->join('users','users.id','subject.created_by');
                                         if(!empty(FacadesRequest::get('name')))
                                        {
                                            $return =$return->where('subject.name','like', '%'. FacadesRequest::get('name').'%');
                                        }
                                        if(!empty(FacadesRequest::get('type')))
                                        {
                                            $return =$return->where('subject.type','=', FacadesRequest::get('type'));
                                        }
                                        if(!empty(FacadesRequest::get('date')))
                                        {
                                            $return =$return->whereDate('subject.created_at','=', FacadesRequest::get('date'));
                                        }
                                    $return=$return->where('subject.is_delete', '=',0)
                                    ->orderBy('subject.id', 'desc')
                                    ->paginate(20);
    return $return;
}
static function getSingle($id)
{
    return self::find($id);
}
static function getSubject()
{
    $return= SubjectModel::select('subject.*')
                                    
    ->join('users','users.id','subject.created_by')
    ->where('subject.is_delete', '=',0)
    ->where('subject.status', '=',0)
    ->orderBy('subject.name', 'asc')
    ->get();
return $return;
}
}
