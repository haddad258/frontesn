<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Classroom
 * 
 * @property int $class_id
 * @property string|null $description
 * 
 * @property TeacherClass $teacher_class
 *
 * @package App\Models
 */
class Classroom extends Model
{
	protected $table = 'classroom';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
		'description'
	];

	public function teacher_class()
	{
		return $this->hasOne(TeacherClass::class, 'class_ext_id');
	}
}
