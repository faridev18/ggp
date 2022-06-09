<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\Chat;
use Session;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    public function acceuil()
    {
        $services = Service::select()
                    ->join("clients", "services.id_auteur","=","clients.id")
                    ->limit(8)
                    ->where('comfirm', 2)
                    ->get();
        
        return view('client.acceuil')->with('services', $services);
    }

    public function register()
    {
        return view('client.register');
    }

    public function login()
    {
        return view('client.login');
    }


    public function saveclient(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'email'=>'required|email|unique:clients',
            'password'=>'required|min:8',
            'password2'=>'required|same:password',
            'condition'=>'required']);

        $client = new Client();
        $client->username = $request->input('username');
        $client->type_compte = $request->input('type_compte');
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));
        $client->save();
        return back()->with('status', 'Votre compte à été créé avec succes');
    }

    public function loginaction(Request $request)
    {
        $this->validate($request, [
           
            'email'=>'required|email',
            'password'=>'required|min:8']);
        
            $client = Client::where('email', $request->input('email'))->first();
            if ($client) {
                if (Hash::check($request->input('password'),$client->password)) {
                    Session::put('client',$client);
                    return redirect('/');
                } else {
                    return back()->with('status', 'Mauvais email ou mot de passe');
                }
            } else {
                return back()->with('status', 'Vous n\'avez pas de compte avec cet email');
            }
    }
    public function profil($id)
    {
        $profil = Client::find($id);
        $services = Service::where('id_auteur',$id)->where('comfirm',2)->get();
        return view('client.profile')->with('profil', $profil)->with('services', $services);
    }
    public function logout()
    {
        Session::forget('client');
        return back();
    }

    public function service($id)
    {
        $service = DB::table('services')
                            ->join("clients", "services.id_auteur","=","clients.id")
                            ->where('id_s',$id)
                            ->first();
        $services = DB::table('services')
                            ->join("clients", "services.id_auteur","=","clients.id")
                            ->where('id_auteur',$service->id_auteur)
                            ->where('comfirm',2)
                            ->get();
        $comments = DB::table('ratings')
                            ->join("clients", "ratings.user_id","=","clients.id")
                            ->where('service_id',$id)
                            ->get();
        $counta = DB::table('ratings')
                            ->where('service_id',$id)
                            ->count();
        $moy = DB::table('ratings')
                            ->where('service_id',$id)
                            ->sum('ratings.stars_rated');
        $moy = $moy/5;
        return view('client.service')->with('service', $service)
        ->with('services', $services)->with('comments', $comments)
        ->with('counta', $counta)
        ->with('moy', $moy);


    }
    public function profilsetting()
    {
        $id_user = Session::get('client.id');
        if (Session::has('client')) {
            $user = Client::find($id_user);
            return view('admin.profilsetting')->with('client', $user);
        }else{
            return view('client.login');
        }
    }

    public function updateprofil(Request $request)
    {
        $this->validate($request, [
            'user_name'=>'required',
            'biographie'=>'required',
            'competence'=>'required',
            'profil_image'=>'image|required|max:1999',
            'couverture_image'=>'image|required|max:1999']);



        $fileNameWithExt = $request->file('profil_image')->getClientOriginalName();
    
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('profil_image')->getClientOriginalExtension();

        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        $path = $request->file('profil_image')->storeAs('public/profil_image', $fileNameToStore);


        $fileNameWithExt2 = $request->file('couverture_image')->getClientOriginalName();
        
        $fileName2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);

        $extension2 = $request->file('couverture_image')->getClientOriginalExtension();

        $fileNameToStore2 = $fileName2.'_'.time().'.'.$extension2;

        $path = $request->file('couverture_image')->storeAs('public/couverture_image', $fileNameToStore2);

        $client = Client::find($request->input('id'));
        $client->username = $request->input('user_name');
        $client->prof_info = $request->input('biographie');
        $client->prof_comp = $request->input('competence');
        $client->prof_image = $fileNameToStore;
        $client->prof_couv = $fileNameToStore2;
        $client->update();

        return redirect('/profilsetting')->with('status','Votre profil a été mise à jour avec succès');
    }

    public function search()
    {
        $services = Service::select()
                            ->join("clients", "services.id_auteur","=","clients.id")
                            ->where('comfirm',2)
                            ->paginate(8);

        return view('client.search')->with('services', $services);
    }

    public function chat($id)
    {
        if (Session::has('client')) {
            $id_ut = Session::get('client.id');
            $message = DB::table('chats')
                            ->join("clients", "chats.id_dest","=","clients.id")
                            // ->where(['id_dest',$id],['id_auth',$id_ut])
                            // ->where(['id_auth',$id],['id_dest',$id_ut])
                            ->orderBy('id_c', 'ASC')
                            ->get();

            return view('client.chat')->with('messages', $message);
        }else{
            return redirect('/login');
        }
        
    }
    public function sendchat(Request $request)
    {
        $this->validate($request, [
            'message'=>'required']);
        
        $chat = new Chat();
        $chat->id_auth = Session::get('client.id');
        $chat->id_dest = $request->input('id_dest');
        $chat->message = $request->input('message');
        $chat->save();
        return back();
    }


    
}
