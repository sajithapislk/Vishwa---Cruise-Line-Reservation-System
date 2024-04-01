<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CruiseShipRoom;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    function show(CruiseShipRoom $room) {
        return Inertia::render('Public/Room/Show',compact('room'));
    }
}
