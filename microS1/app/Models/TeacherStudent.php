<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeacherStudent
 * 
 * @property int $teacher_ext_id
 * @property int $student_ext_id
 * 
 * @property Student $student
 * @property Teacher $teacher
 *
 * @package App\Models
 */
class TeacherStudent extends Model
{
	protected $table = 'teacher_students';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'teacher_ext_id' => 'int',
		'student_ext_id' => 'int'
	];

	protected $fillable = [
		'teacher_ext_id',
		'student_ext_id'
	];

	public function student()
	{
		return $this->belongsTo(Student::class, 'student_ext_id');
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class, 'teacher_ext_id');
	}
}
