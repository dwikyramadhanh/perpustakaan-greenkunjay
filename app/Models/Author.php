<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function books() {
        return $this->hasMany(Book::class);
    }
    public function borrow() {
        return $this->hasMany(BorrowHistory::class);
    }
    public function borrowed()
    {
        // Membuat relasi many to many ke user dan terdapat di borrow history
        return $this->belongsToMany(User::class, 'borrow_history')->withTimestamps();
    }
}