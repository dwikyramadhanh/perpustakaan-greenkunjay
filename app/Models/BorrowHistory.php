<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowHistory extends Model
{
    use HasFactory;
    // menggunakan table borrow history
    protected $table = 'borrow_history';
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }
    // id(primary key) = 'id' pada table user, 'admin_id' = foreign key pada table borrow_history
    public function admin() {
        return $this->belongsTo(User::class, 'id', 'admin_id');
    }
    public function book() {
        return $this->belongsTo(Book::class);
    }
    public function scopeIsBorrowed($query){
        return $query->where('returned_at', null);
    }
}