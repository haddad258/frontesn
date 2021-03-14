<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\TeacherClass;
use App\Models\TeacherStudent;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function storeTeacher(Request $request){
        $payLoad = $request->all();
        try{
            $teacher = Teacher::where('email', '=',$payLoad['email'])->first();
            if ($teacher === null) {
                Teacher::create([
                    "first_name"=>$payLoad['first_name'],
                    "last_name"=>$payLoad['last_name'],
                    "email"=>$payLoad['email'],
                    "phone"=>$payLoad['phone'],
                    "subject_ext_id"=>$payLoad['subject_ext_id']
                ]);
    
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Already existing teacher with the same email!'],409);
            }
            

        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function indexTeachers(){
        try{
            $teachers= Teacher::with('classes')->with('students')->get();
            return response(['code'=>'success','content'=>$teachers],200);
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function getTeacher($id){
        try{
            $teacher= Teacher::with('classes')->with('students')->find($id);
            if($teacher){
                return response(['code'=>'success','content'=>$teacher],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Teacher not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function editTeacher($id,Request $request){
        $payLoad = $request->all();
        try{
            $teacher= Teacher::find($id);
            if($teacher){
                $teacher_exist = Teacher::where('email', '=',$payLoad['email'])->where('teacher_id','!=',$id)->first();
                if ($teacher_exist === null) {
                    $teacher->update(
                        array( "first_name"=>$payLoad['first_name'],
                                "last_name"=>$payLoad['last_name'],
                                "email"=>$payLoad['email'],
                                "phone"=>$payLoad['phone'],
                                "subject_ext_id"=>$payLoad['subject_ext_id']
                            ));
                        return response(['code'=>'success'],200);
                }else{
                    return response(['code'=>'fails','error_message'=>'Already existing teacher with the same email!'],409);
                }
            }else{
                return response(['code'=>'fails','error_message'=>'Teacher not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function deleteTeacher($id){
        try{
            $teacher= Teacher::find($id);
            if($teacher){
                $teacher->delete();
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>'Teacher not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function addTeacherClasses($id,Request $request){
        $payLoad = $request->all();
        try{
            $errors_tab=[];
            $i=0;
            $teacher= Teacher::find($id);
            if($teacher){
                foreach($payLoad['classes_ext_ids'] as $class_id){
                    $class=Classroom::find($class_id);
                    if($class){
                        $teacher_class = TeacherClass::where('teacher_ext_id', '=',$id)->where('class_ext_id','=',$class_id)->first();
                        if ($teacher_class != null){
                            $errors_tab[$i]='Already existing class for the teacher with id='.$class_id.' !';
                            $i++;
                        }
                    }else{
                        $errors_tab[$i]='Class with id='.$class_id.' not found!';
                        $i++;
                    }
                    
                }
                if(sizeof($errors_tab)==0){
                    TeacherClass::create([
                        "teacher_ext_id"=>$id,
                        "class_ext_id"=>$class_id
                    ]);
                    return response(['code'=>'success'],200);
                }else{
                    return response(['code'=>'fails','error_message'=>$errors_tab],400);
                }
            }else{
                return response(['code'=>'fails','error_message'=>'Teacher not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function addTeacherStudents($id,Request $request){
        $payLoad = $request->all();
        try{
            $errors_tab=[];
            $i=0;
            $teacher= Teacher::find($id);
            if($teacher){
                foreach($payLoad['students_ext_ids'] as $student_id){
                    $student=Student::find($student_id);
                    if($student){
                        $teacher_student = TeacherStudent::where('teacher_ext_id', '=',$id)->where('student_ext_id','=',$student_id)->first();
                        if ($teacher_student != null){
                            $errors_tab[$i]='Already existing student for the teacher with id='.$student_id.' !';
                            $i++;
                        }
                    }else{
                        $errors_tab[$i]='Student with id='.$student_id.' not found!';
                        $i++;
                    }
                    
                }
                if(sizeof($errors_tab)==0){
                    TeacherStudent::create([
                        "teacher_ext_id"=>$id,
                        "student_ext_id"=>$student_id
                    ]);
                    return response(['code'=>'success'],200);
                }else{
                    return response(['code'=>'fails','error_message'=>$errors_tab],400);
                }
            }else{
                return response(['code'=>'fails','error_message'=>'Teacher not found!'],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function deleteTeacherClasses($teacher_id,$class_id){
        try{
            $errors_tab=[];
            $i=0;
            $teacher= Teacher::find($teacher_id);
            if($teacher){
                    $class=Classroom::find($class_id);
                    if($class){
                        $teacher_class = TeacherClass::where('teacher_ext_id', '=',$teacher_id)->where('class_ext_id','=',$class_id)->first();
                        if ($teacher_class === null) {
                            $errors_tab[$i]="Class for the teacher '".$teacher->first_name." ".$teacher->last_name."' not found!";
                            $i++;
                        }
                    }else{
                        $errors_tab[$i]='Class not found!';
                        $i++;

                    }
            }else{
                $errors_tab[$i]='Teacher not found!';
                $i++;
            }
            if(sizeof($errors_tab)==0){
                TeacherClass::where('teacher_ext_id', '=',$teacher_id)
                ->where('class_ext_id','=',$class_id)
                ->delete();
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>$errors_tab],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }

    public function deleteTeacherStudents($teacher_id,$student_id){
        try{
            $errors_tab=[];
            $i=0;
            $teacher= Teacher::find($teacher_id);
            if($teacher){
                    $student=Student::find($student_id);
                    if($student){
                        $teacher_student = TeacherStudent::where('teacher_ext_id', '=',$teacher_id)->where('student_ext_id','=',$student_id)->first();
                        if ($teacher_student === null) {
                            $errors_tab[$i]="Student for the teacher '".$teacher->first_name." ".$teacher->last_name."' not found!";
                            $i++;
                        }
                    }else{
                        $errors_tab[$i]='Student not found!';
                        $i++;

                    }
            }else{
                $errors_tab[$i]='Teacher not found!';
                $i++;
            }
            if(sizeof($errors_tab)==0){
                TeacherStudent::where('teacher_ext_id', '=',$teacher_id)
                ->where('student_ext_id','=',$student_id)
                ->delete();
                return response(['code'=>'success'],200);
            }else{
                return response(['code'=>'fails','error_message'=>$errors_tab],400);
            }
        }catch(Throwable $e) {
            return response(['code'=>'fails','error_message'=>$e],500);
        }
    }
}
