<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeacherClass
 * 
 * @property int $teacher_ext_id
 * @property int $class_ext_id
 * 
 * @property Classroom $classroom
 * @property Teacher $teacher
 *
 * @package App\Models
 */
class TeacherClass extends Model
{
	protected $table = 'teacher_classes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'teacher_ext_id' => 'int',
		'class_ext_id' => 'int'
	];

	protected $fillable = [
		'teacher_ext_id',
		'class_ext_id'
	];

	public function classroom()
	{
		return $this->belongsTo(Classroom::class, 'class_ext_id');
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class, 'teacher_ext_id');
	}
}
