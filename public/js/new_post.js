document.querySelector("#search form").addEventListener("submit",search);


function Onjson(json){
    console.log("Json ricevuto");
    console.log(json);
    const container=document.getElementById('results');
    container.innerHTML='';
    container.className='artista';


    let risultati=json.totalResults;

    if(risultati>6){
        risultati=6;
    }
    for(let i=0;i<risultati;i++){
        const items=json.items[i];
        const opera=document.createElement('div');
        opera.dataset.titolo=items.title;
        opera.dataset.immagine=items.edmIsShownBy;
        //leggo il titolo e l'immagine
        const titolo=items.title;
        const immagine=items.edmIsShownBy;


        if(immagine){
            const o=document.createElement('div');
            const img=document.createElement('img');
            img.src=immagine;


            const didascalia=document.createElement('span');
            didascalia.textContent=titolo;
            didascalia.classList.add("didascalia");

            o.appendChild(img);
            o.appendChild(didascalia);
            opera.appendChild(o);
            container.appendChild(opera);
            opera.addEventListener("click",aggOpera);
        }


    }
}


function search(event){
    const form_data=new FormData(document.querySelector("#search form"));

    fetch("/europeana_api/"+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(Onjson);
    
    event.preventDefault();
}

function searchResponse(response){
    console.log(response);
    return response.json();
}

function aggOpera(event){
    console.log("Salvataggio");

    const token=document.head.querySelector('meta[name="csrf-token"]').content;

    const opera=event.currentTarget;
    console.log(opera);
    const formData=new FormData();
    formData.append('immagine',opera.dataset.immagine);
    formData.append('titolo',opera.dataset.titolo);

    console.log(opera.dataset.titolo);
    console.log(opera.dataset.immagine);
    

    fetch("/salva_elem",{method: 'post', body: formData ,headers:{'X-CSRF-TOKEN':token}}).then(dispatchResponse, dispatchError);
    event.stopPropagation();
}


function dispatchResponse(response) {
    console.log("Risposta");
    console.log(response);
    return response.json().then(databaseResponse); 
}
    
function dispatchError(error) { 
    console.log("Errore");
}
    
function databaseResponse(json) {
    console.log(json);
    if (!json.ok) {
        dispatchError();
        return null;
    }
}







document.querySelector("#search_event form").addEventListener("submit", search_event);


function search_event(event){
  const form_data = new FormData(document.querySelector("#search_event form"));
  fetch("/ticketmaster_api/"+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(OnjsonEv);
  event.preventDefault();
}



function OnjsonEv(json){
    console.log("Json ricevuto");
    console.log(json);

    const sezione=document.getElementById('result_event');
    sezione.innerHTML='';
    sezione.className='evento';

    let risultati=json.page.totalElements;


    for(let i=0;i<risultati;i=i+3){
        const ev=json._embedded.events[i];
        const evento=document.createElement('div');

        evento.dataset.immagine=ev.images[0].url;
        evento.dataset.nome=ev.name;
        evento.dataset.data=ev.dates.start.localDate;
        evento.dataset.luogo=ev.dates.timezone;

        

        const immagine=ev.images[0].url;    
        const nome=ev.name;
        const data=ev.dates.start.localDate;
        const luogo=ev.dates.timezone;
        

        const img=document.createElement('img');
        img.src=immagine;       

        const didascalia=document.createElement('span');
        didascalia.textContent=data;
        didascalia.classList.add("didascalia");

        const nome_artista=document.createElement('span');
        nome_artista.textContent=nome;
        nome_artista.classList.add("nome_artista");

        const luogo_evento=document.createElement('span');
        luogo_evento.textContent=luogo;
        luogo_evento.classList.add("luogo_evento");


        evento.appendChild(img);
        evento.appendChild(nome_artista);
        evento.appendChild(didascalia);
        evento.appendChild(luogo_evento);
        sezione.appendChild(evento);        
        evento.addEventListener("click",aggEv);
    }

}

function aggEv(event){
  console.log("Salvataggio");
  const evento=event.currentTarget;

  const token=document.head.querySelector('meta[name="csrf-token"]').content;

  const formData = new FormData();
  formData.append('immagine', evento.dataset.immagine);
  formData.append('nome', evento.dataset.nome);
  formData.append('data',evento.dataset.data);
  formData.append('luogo',evento.dataset.luogo);
  console.log(formData);
  fetch("/salva_evento", {method: 'post', body: formData,headers:{'X-CSRF-TOKEN':token}}).then(dispatchResponse, dispatchError);
  event.stopPropagation();
}