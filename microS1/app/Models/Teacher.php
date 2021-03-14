<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 * 
 * @property int $teacher_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $subject_ext_id
 * 
 * @property TeacherClass $teacher_class
 * @property Collection|Student[] $students
 * * @property Collection|Classroom[] $classes
 *
 * @package App\Models
 */
class Teacher extends Model
{
	protected $table = 'teacher';
	protected $primaryKey = 'id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'subject_ext_id' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'subject_ext_id'
	];

	public function teacher_class()
	{
		return $this->hasOne(TeacherClass::class, 'teacher_ext_id');
	}

	public function classes()
	{
		return $this->belongsToMany(Classroom::class, 'teacher_classes', 'teacher_ext_id', 'class_ext_id');
	}

	public function students()
	{
		return $this->belongsToMany(Student::class, 'teacher_students', 'teacher_ext_id', 'student_ext_id');
	}
}
