<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CruiseLineRoom;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    function show(CruiseLineRoom $room) {
        return Inertia::render('Public/Room/Show',compact('room'));
    }
}
