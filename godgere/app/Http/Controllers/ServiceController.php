<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\Rating;
use Session;


class ServiceController extends Controller
{
    public function addservice()
    {
        if (Session::has('client')) {
            return view('admin.addservice');
        }else{
            return view('client.login');
        }
    }

    public function saveservice(Request $request)
    {
        $this->validate($request, [
        'service_name'=>'required',
        'categorie'=>'required',
        'service_description'=>'required',
        'service_price'=>'required',
        'basic_description'=>'required',
        'basic_price'=>'required',
        'basic_day'=>'required',
        'standard_description'=>'required',
        'standard_price'=>'required',
        'standard_day'=>'required',
        'god_description'=>'required',
        'god_price'=>'required',
        'god_day'=>'required',
        'service_image'=>'image|required|max:1999',]);

        $fileNameWithExt = $request->file('service_image')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('service_image')->getClientOriginalExtension();

        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        $path = $request->file('service_image')->storeAs('public/service_image', $fileNameToStore);


        $service = new Service();
        $service->service_name = $request->input('service_name');
        $service->id_auteur = Session::get('client.id');
        $service->categorie = $request->input('categorie');
        $service->service_description = $request->input('service_description');
        $service->service_price = $request->input('service_price');
        $service->basic_description = $request->input('basic_description');
        $service->basic_price = $request->input('basic_price');
        $service->basic_day = $request->input('basic_day');
        $service->standard_description = $request->input('standard_description');
        $service->standard_price = $request->input('standard_price');
        $service->standard_day = $request->input('standard_day');
        $service->god_description = $request->input('god_description');
        $service->god_price = $request->input('god_price');
        $service->god_day = $request->input('god_day');
        $service->service_image = $fileNameToStore;
        $service->save();

        return back()->with('status','Le service a été enregistré avec succès');
    }
    public function services()
    {
        
        if (Session::has('client')) {
            $auteur_id = Session::get('client.id');
            $services = Service::where('id_auteur',$auteur_id)->get();
            return view('admin.services')->with('services', $services);
        }else{
            return view('client.login');
        }
    }

    public function editservice($id)
    {
        if (Session::has('client')) {
            $service = Service::find($id);
            return view('admin.editservice')->with('service', $service);
        }else{
            return view('client.login');
        }
    }
    public function updateservice(Request $request)
    {
        $this->validate($request, [
            'service_name'=>'required',
            'categorie'=>'required',
            'service_description'=>'required',
            'service_price'=>'required',
            'basic_description'=>'required',
            'basic_price'=>'required',
            'basic_day'=>'required',
            'standard_description'=>'required',
            'standard_price'=>'required',
            'standard_day'=>'required',
            'god_description'=>'required',
            'god_price'=>'required',
            'god_day'=>'required',
            'service_image'=>'image|required|max:1999']);
    
            $fileNameWithExt = $request->file('service_image')->getClientOriginalName();
    
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    
            $extension = $request->file('service_image')->getClientOriginalExtension();
    
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    
            $path = $request->file('service_image')->storeAs('public/service_image', $fileNameToStore);

            // Storage::delete('public/service_image/'.$service->service_image);
    
    
            $service = Service::find($request->input('id'));
            $service->service_name = $request->input('service_name');
            $service->id_auteur = Session::get('client.id');
            $service->categorie = $request->input('categorie');
            $service->service_description = $request->input('service_description');
            $service->service_price = $request->input('service_price');
            $service->basic_description = $request->input('basic_description');
            $service->basic_price = $request->input('basic_price');
            $service->basic_day = $request->input('basic_day');
            $service->standard_description = $request->input('standard_description');
            $service->standard_price = $request->input('standard_price');
            $service->standard_day = $request->input('standard_day');
            $service->god_description = $request->input('god_description');
            $service->god_price = $request->input('god_price');
            $service->god_day = $request->input('god_day');
            $service->service_image = $fileNameToStore;
            $service->update();

            return redirect('/services')->with('status','Le service a été modifié avec succès');
        
    }

    public function deleteservice($id)
    {
        $service = Service::where('id_s', $id);
        // Storage::delete('public/service_image/'.$service->service_image);
        $service->delete();
        return back()->with('status','Le service a été supprimé avec succès');
    }

    public function addrating(Request $request)
    {
        $this->validate($request, [
            'commentaire'=>'required']);

            if (Session::has('client')) {
                $rating = new Rating();
                $rating->user_id = Session::get('client.id');
                $rating->service_id = $request->input('id_service');
                $rating->stars_rated = $request->input('service_rating');
                $rating->comment = $request->input('commentaire');
                $rating->save();
                return back();
            }else{
                return view('client.login');
            }
    }

    public function makesearch(Request $request)
    {
        $ver = $request->input('chercher');
        
            $service = DB::select()
            ->join("clients", "services.id_auteur","=","clients.id")
            ->where('categorie',$request->input('cat'))
            ->andWhere('service_name','like','%'.$request->input('keyword').'%')
            ->paginate(8);
        return  back('client.search')->with('service', $service);
               
    }

}
