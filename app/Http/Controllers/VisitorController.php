<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public static function getVisitorCount()
    {
        // Total visitors (all entries)
        return Visitor::count();

        // 👉 If you want unique visitors instead:
        // return Visitor::distinct('ip_address')->count('ip_address');
    }
}
