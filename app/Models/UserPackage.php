<?php
/**
 * User Package Mapping table Model
 * @param Request $request
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserPackage extends Model
{
  use SoftDeletes;
  protected $table = 'userPackageMapping';
  protected $softDelete = true;

  public function user() {
      return $this->belongsTo('App\User');
  }

  public function package() {
      return $this->belongsTo('App\Models\Packages');
  }
}
