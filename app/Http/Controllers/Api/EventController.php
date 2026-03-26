<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        // Şimdilik veritabanındaki tüm etkinlikleri basitçe döndürüyoruz
        return Event::all();
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        return $event;
    }
}