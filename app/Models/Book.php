<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function getCover()
    {
        if (substr($this->cover, 0, 5) == 'https') {
            return $this->cover;
        }

        if ($this->cover) {
            return asset('storage/' . $this->cover);
        }
    }
    public function borrowed()
    {
        // Membuat relasi many to many ke user dan terdapat di borrow history
        return $this->belongsToMany(User::class, 'borrow_history')->withTimestamps()->where('returned_at');
    }

    public function scopeIsStillBorrow($query, $bookId)
    {
        return $query->where('books.id', $bookId)
            ->where('returned_at', null)
            ->count() > 0;
    }
}