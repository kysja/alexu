<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

// A request sent from the small business page form.
#[Fillable(['name', 'business', 'email', 'phone', 'team_size', 'needs'])]
class Inquiry extends Model
{
    //
}
