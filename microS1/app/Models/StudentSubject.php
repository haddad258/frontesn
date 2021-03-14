<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentSubject
 * 
 * @property int $student_ext_id
 * @property int $subject_ext_id
 * @property string|null $note
 * 
 * @property Student $student
 * @property Subject $subject
 *
 * @package App\Models
 */
class StudentSubject extends Model
{
	protected $table = 'student_subjects';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'student_ext_id' => 'int',
		'subject_ext_id' => 'int'
	];

	protected $fillable = [
		'student_ext_id',
		'subject_ext_id',
		'note'
	];

	public function student()
	{
		return $this->belongsTo(Student::class, 'student_ext_id');
	}

	public function subject()
	{
		return $this->belongsTo(Subject::class, 'subject_ext_id');
	}
}
