<?php

namespace App\Models;

use App\Models\Anggaran;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
	protected $guarded = [];

	public function anggaran()
	{
		return $this->belongsTo(Anggaran::class, 'anggaran_id');
	}
}
