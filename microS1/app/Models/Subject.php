<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subject
 * 
 * @property int $id
 * @property string|null $description
 * 
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class Subject extends Model
{
	protected $table = 'subject';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
		'description',
		'credit',
		'coefficient'
	];

	public function students()
	{
		return $this->belongsToMany(Student::class, 'student_subjects', 'subject_ext_id', 'student_ext_id')
					->withPivot('note');
	}
}
