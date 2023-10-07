<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipRoom;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    function show(ShipRoom $room) {
        return Inertia::render('Public/Room/Show',compact('room'));
    }
}
