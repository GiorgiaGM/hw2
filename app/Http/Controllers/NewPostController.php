<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;
use App\Models\Opera;
use App\Models\Evento;

class NewPostController extends BaseController
{
    public function new_post(){
        if(!Session::has('user_id')){
            return redirect('login');
        }
        return view('new_post');
    }



    public function europeana_api($ricerca){
        if(!Session::has('user_id')){
            exit;
        }
        $apikey='dightpront';

        $query=urldecode(Request::get("q",$ricerca));                   
    
        $ch=curl_init();
    
        curl_setopt($ch, CURLOPT_URL, "https://api.europeana.eu/record/v2/search.json?wskey=".$apikey."&query=who:".$query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result= curl_exec($ch);
        curl_close($ch);
    
        
        return $result;

    }


    public function salva_elem(){
        if(!Session::has('user_id')){
            return ['ok'=>false];
        }
        
        $opera_immagine=Request::post('immagine');
        $opera_titolo=Request::post('titolo');
       

        $user_id=Session::get('user_id');

        $opera=new Opera;
        
        $opera->content=json_encode([
            'immagine'=> $opera_immagine,
            'titolo' => $opera_titolo,
        ]);
        $opera->user=$user_id;
        $opera->save();

        return ['ok'=>true];

    }




    public function ticketmaster_api($ricerca){
        if(!Session::has('user_id')){
            exit;
        }

        $apikey='vudKODYExVF3mz8CnWx7oAETLxQZZ6iG';

        $query=urldecode(Request::get("q",$ricerca));

        $ch=curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://app.ticketmaster.com/discovery/v2/events.json?countryCode=".$query."&apikey=".$apikey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result= curl_exec($ch);
        curl_close($ch);

    
        return $result;


    }

    public function salva_evento(){
        if(!Session::has('user_id')){
            return ['ok'=>false];
        }
        
        $evento_immagine=Request::post('immagine');
        $evento_nome=Request::post('nome');
        $evento_data=Request::post('data');
        $evento_luogo=Request::post('luogo');
       

        $user_id=Session::get('user_id');

        $evento=new Evento;
        
        $evento->content=json_encode([
            'immagine'=> $evento_immagine,
            'nome' => $evento_nome,
            'data' => $evento_data,
            'luogo' => $evento_luogo,
        ]);
        $evento->user=$user_id;
        $evento->save();

        return ['ok'=>true];

    }




   
}