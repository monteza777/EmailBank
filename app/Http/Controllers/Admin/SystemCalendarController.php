<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public function index() 
    {
        $events = []; 

        foreach (\App\User::all() as $user) { 
           $crudFieldValue = $user->getOriginal('created_at'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $user->name; 
           $prefix         = 'User'; 
           $suffix         = 'registered'; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.users.edit', $user->id)
           ]; 
        } 


       return view('admin.calendar' , compact('events')); 
    }

}
