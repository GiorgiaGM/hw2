<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Request;
use Session;
use App\Models\User;                             


class LoginController extends BaseController
{
    public function signup(){
        return view('signup');    
    }


    public function do_signup(){
        
        if(Session::has('user_id')){   
            return redirect('home');
        }
        
        $error=array();

        if(!empty(Request::get("name")) && !empty(Request::get("surname")) && !empty(Request::get("username")) && 
           !empty(Request::get("password")) && !empty(Request::get("confirm_password")) && !empty(Request::get("email"))){


           
            if(strlen(Request::get('password')) <8 ){
                $error['password']="I caratteri della password sono insufficienti";
            }

      
            if(Request::get('password') != Request::get('confirm_password')){
                $erorr['password']="Le password non coincidono";
            }

            
            if(!filter_var(Request::get('email'), FILTER_VALIDATE_EMAIL)){
                $error['email']="L'email non è valida";
            }
            else{
                if(User::where('email',Request::get('email'))->first()){
                    $error['email']="Email già utilizzata";
                }

            }

            
            $file_dest = null;
            if (count($error) == 0) { 
                $file = Request::file('avatar');
                if ($file && $file->getSize() > 0) {        
                    $type = exif_imagetype($file->path());  
                    $allowedExt = array(IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif');
                    if (isset($allowedExt[$type])) {
                        if ($file->getSize() < 7000000) {
                            $file_dest = $file->store();
                        } else {
                            $error['avatar'] = "L'immagine non deve avere dimensioni maggiori di 7MB";
                        }
                    } else {
                        $error['avatar'] = "I formati consentiti sono .png, .jpeg, .jpg e .gif";
                    }
                }
            }

            
            if(count($error) == 0){
                $password = password_hash(Request::get('password'), PASSWORD_BCRYPT);    
                $user=new User;    
                $user->name=Request::get('name');
                $user->surname=Request::get('surname');
                $user->username=Request::get('username');
                $user->password=$password;
                $user->email=Request::get('email');
                $user->propic=$file_dest;
                $user->save();
                Session::put('user_id',$user->id);         
                return redirect('home');
            }


        }
        else{
            $error[]="Compilare tutti i campi";
        }
        return redirect('signup')->withInput()->withErrors($error);

    }





    public function login(){
        return view('login');
    }


    public function do_login(){
        if(Session::has('user_id')){
            return redirect('home');
        }

        $error=array();

        if(!empty(Request::post('username')) && !empty(Request::post('password'))){
            $user=User::where('username',Request::post('username'))->first();  
            if(!$user){   
                $error['username']="Username non trovato";
            }
            else{
                if(!password_verify(Request::post('password'),$user->password)){  
                    $error['password']="La password non è corretta";
                }
            }
        }
        else{
            $error['username']="Devi inserire username e password";
        }
        if(count($error)==0){
            Session::put('user_id',$user->id);
            return redirect('home');
        }
        else{
            return redirect('login')->withInput()->withErrors($error);
        }
    }


    

}



