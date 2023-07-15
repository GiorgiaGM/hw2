<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;
use App\Models\Opera;
use App\Models\Evento;


class HomeController extends BaseController
{
    public function home(){
        if(!Session::has('user_id')){
            return redirect('login');
        }
        $user=User::find(Session::get('user_id'));

        $opere=$user->opere;
        foreach($opere as $opera){
            $opera->content=json_decode($opera->content);
        }

        $eventi=$user->eventi;
        foreach($eventi as $evento){
            $evento->content=json_decode($evento->content);
        }

        return view('home')->with('user',$user)->with('opere',$opere)->with('eventi',$eventi);                     
        
    }


    public function profile()
    {
        if(!Session::has('user_id')){
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        
        return view('profile')->with('user', $user);
    }


    public function elimina_post(){
        if(!Session::has('user_id')){
            return redirect('login');
        }

        $opera_id=Request::post('id');

        $opera=Opera::find($opera_id);

        if(Opera::where('id',$opera_id)->where('user',Session::get('user_id'))->first()){
            $opera->delete();
        }
        

        return ["ok"=>true];  

    }

    
     public function elimina_evento(){            
        if(!Session::has('user_id')){
            return redirect('login');
        }

        $evento_id=Request::post('id');

        $evento=Evento::find($evento_id);

        if(Evento::where('id',$evento_id)->where('user',Session::get('user_id'))->first()){
            $evento->delete();
        }

      
        return ["ok"=>true]; 
    }





    public function logout(){
        Session::flush();
        return redirect('login');
    }
}