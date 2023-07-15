
document.querySelector(".info button").addEventListener("click",eliminaPost);


function eliminaPost(event){
    console.log("Eliminazione");

    const token=document.head.querySelector('meta[name="csrf-token"]').content;

    const opera=event.currentTarget;
    console.log(opera);
    const formData = new FormData();
    formData.append('id',opera.parentNode.parentNode.dataset.id);
    
    
    fetch("/elimina_post", {method: 'post',body: formData ,headers:{'X-CSRF-TOKEN':token}}).then(dispatchResponse, dispatchError).then(aggiornaPagina);
}


function aggiornaPagina(){
  location.reload();
}


function dispatchResponse(response) {
  console.log("Risposta");
  console.log(response);
  return response.json().then(databaseResponse); 
}
  
function dispatchError() { 
  console.log("Errore");
}
  
function databaseResponse(json) {
  console.log(json);
  if (!json.ok) {
      dispatchError();
      return null;
  }
}





document.querySelector(".infoEv button").addEventListener("click",elimina_evento);

function elimina_evento(event){
  console.log("Eliminazione");

  const token=document.head.querySelector('meta[name="csrf-token"]').content;

  const evento=event.currentTarget;
  const formData = new FormData();
  formData.append('id',evento.parentNode.parentNode.dataset.id);
  
  fetch("/elimina_evento", {method: 'post',body: formData ,headers:{'X-CSRF-TOKEN':token}}).then(dispatchResponse, dispatchError).then(aggiornaPagina);
}




