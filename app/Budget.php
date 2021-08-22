<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function budgetCategory()
    {
        // @todo will all new ones get saved to this same category?
        return $this->belongsTo(BudgetCategory::class)->withDefault([
            'name' => 'uncategorized',
        ]);
    }
}
