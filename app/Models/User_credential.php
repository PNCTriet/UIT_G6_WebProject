<?php
// File: app/Models/User.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User_credential extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'User_credential'; // Thay 'User' bằng tên bảng thực tế trong cơ sở dữ liệu của bạn
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];
}
?>