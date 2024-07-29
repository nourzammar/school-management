<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request as FacadesRequest;
class ClassSubjectModel extends Model
{
    protected $table = 'class_subject';

    static  function getRecord()
    {
        $return= self::select('class_subject.*','class.name as class_name', 'subject.name as subject_name' ,'users.name as created_by_name','subject.type as subject_type')
                                        
        ->join('subject','subject.id','=','class_subject.subject_id')
        ->join('class','class.id','=','class_subject.class_id')
        ->join('users','users.id','=','class_subject.created_by');
                                        if(!empty(FacadesRequest::get('class_name')))
                                            {
                                                $return =$return->where('class.name','like', '%'. FacadesRequest::get('class_name').'%');
                                            }
                                        if(!empty(FacadesRequest::get('subject_name')))
                                            {
                                                $return =$return->where('subject.name','like', '%'. FacadesRequest::get('subject_name').'%');
                                            }
                                            if(!empty(FacadesRequest::get('date')))
                                            {
                                                $return =$return->whereDate('class_subject.created_at','=', FacadesRequest::get('date'));
                                            }
                                        $return=$return->where('class_subject.is_delete', '=',0)
                                        ->orderBy('class_subject.id', 'desc')
                                        ->paginate(10);
            return $return;
    }
    static function getAlreadyFirst($class_id,$subject_id)
    {
        return self::where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->first();
    }
    static function getSingle($id)
    {
        return self::find($id);
    }
    static function getAssignSubjectID($class_id)
    {
        return self::where('class_id', '=', $class_id)->where('is_delete', '=',0)->get();
    }

    static function deleteSubject($class_id)
    {
        return self::where('class_id', '=', $class_id)->delete();
    }
    
}
