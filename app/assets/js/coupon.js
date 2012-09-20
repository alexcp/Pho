$(document).ready(function(){

  function message_quantite(quantite){
    var reponse;
    if(valide_la_quantite(quantite)){
      reponse = '<p>'+ quantite +' disponibles</p>';
    }else{
      reponse = '<p>Aucun disponible.</p>';
    }
    return reponse;
  }

  function valide_la_quantite(quantite){
    return quantite != 0;
  }

  function message_date(date){
    var reponse;
    if(valide_la_date(date)){
      var nombre_de_jours = nombre_de_jours_restants(date);
      if(nombre_de_jours <= 1){
        reponse = '<p>L\'offre ce termine dans '+ nombre_de_minutes_restantes(date) +' minutes.</p>';
      }else{
        reponse = '<p>L\'offre ce termine dans '+ nombre_de_jours +' jours.</p>';
      }
    }else{
      reponse = '<p>L\'offre est maintenant terminé</p>';
    }
    return reponse;
  }

  function valide_la_date(date){
    return Date.now() < string_to_date(date);
  }
  function string_to_date(string){
    var date_array = string.split("-");
    return new Date(date_array[1]+"-"+date_array[0]+"-"+date_array[2]);
  }

  function nombre_de_jours_restants(date){
    return Math.ceil((string_to_date(date) - Date.now())/(1000*60*60*24));
  }
  
  function nombre_de_minutes_restantes(date){
    return Math.ceil((string_to_date(date) - Date.now())/(1000*60));
  }

  function bouton_si_valide(quantite,date,id){
    var reponse = '';
    if(valide_la_quantite(quantite) && valide_la_date(date)){
      reponse = '<button class="acheter" data-offre_id="'+id+'">Acheter</button></div>'
    }
    return reponse;
  }

  $.ajax("/offres/index",{
    method:"get",
  dataType:'json',
  success:function(offres){
    $.each(offres,function(key,val){
      $("#offres").append('<li>'
        +'<div class="offre_details"><img src="/app/assets/images/'+ val["image"] +'" /></div>'
        +'<div class="offre_details">'+ val["nom"] +'<p>'+ val["fournisseur"] +'</p></div>'
        +'<div class="offre_details">'+ val["description"] +'</div>'
        +'<div class="offre_details">'+ val["prix"] +'$'
        + message_quantite(val["quantite"])
        + message_date(val["date_expiration"])
        + bouton_si_valide(val["quantite"],val["date_expiration"],val["id"])
        +'</li>');
    });
    $(".acheter").click(function(){
      var pressed_button = this;
      var offre_id = $(this).attr("data-offre_id");
      $(".acheter").hide();
      $.get("/app/views/form_achat.html",function(form){
        $(pressed_button).parent().parent().after(form);
        $(".achat").hide().slideDown(500);
        $(".form_achat").submit(function(){
          var date = new Date();
          var new_id = Math.random() * date;
          $.ajax("/transactions/create",{
            data:$(".form_achat").serialize()+"&offre_id="+offre_id+"&id="+new_id.toString()+"&date="+date,
            type: 'post',
            timeout: 8000,
            success:function(){
              $(".achat").css("background","#f9f9f9").html("<h2>Merci de votre achat.</h2>");
              $(".achat").fadeOut(5000,function(){
                $(".achat").remove();
              });
              $(".acheter").show();
            }
          });
          return false;
        });
        $(".annuler").click(function(){
          $(".achat").remove();
          $(".acheter").show();
        });
      });
    });
  }
  });
});
