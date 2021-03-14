<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $student_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string|null $phone
 * @property int|null $class_ext_id
 * 
 * @property Collection|Subject[] $subjects
 * @property Collection|Teacher[] $teachers
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'student';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'class_ext_id' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'class_ext_id'
	];

	public function subjects()
	{
		return $this->belongsToMany(Subject::class, 'student_subjects', 'student_ext_id', 'subject_ext_id')
					->withPivot('note');
	}

	public function teachers()
	{
		return $this->belongsToMany(Teacher::class, 'teacher_students', 'student_ext_id', 'teacher_ext_id');
	}
}
