<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Client;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function controlacceuil()
    {
        $users = Client::all();
        $nu = Client::count();
        $ns = Service::count();
        $nr = Rating::count();
        return view('control.controlacceuil')
        ->with('users', $users)
        ->with('nu', $nu)
        ->with('ns', $ns)
        ->with('nr', $nr);
    }

    public function deleteuser($id)
    {
        $user = Client::find($id);
        $user->delete();
        $service = Service::where('id_auteur', $id);
        Storage::delete('public/service_image/'.$service->service_image);
        $service->delete();

        return back()->with('status','L utilisateur a été supprimé avec succès');
    }
    public function controlservices()
    {
        $services = Service::all();
        return view('control.controlservices')->with('services', $services);
    }
    
    public function confirmservice($id)
    {
        $nbr = 2;
        DB::table('services')
        ->where('id_s', $id)
        ->limit(1)
        ->update(array('comfirm' => $nbr));
        return back();
    }

    public function removeservice($id)
    {
        $nbr = 1;
        DB::table('services')
        ->where('id_s', $id)
        ->limit(1)
        ->update(array('comfirm' => $nbr));
        return back();
    }
}
