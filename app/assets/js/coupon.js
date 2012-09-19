$(document).ready(function(){
  $.ajax("/offres/index",{
    method:"get",
    dataType:'json',
    success:function(offres){
      $.each(offres,function(key,val){
        $("#offres").append('<li>'
          +'<div class="offre_details"><img src="/app/assets/images/pizza.jpg" /></div>'
          +'<div class="offre_details">'+ val["nom"] +'<p>'+ val["fournisseur"] +'</p></div>'
          +'<div class="offre_details">'+ val["description"] +'</div>'
          +'<div class="offre_details">'+ val["prix"] +'$'
          +'<p>'+ val["quantite"]+' disponibles</p>'
          +'<p>L\'offre ce termine le 18-5-2012</p>'
          +'<button class="acheter" data-offre_id="'+val["id"]+'">Acheter</button></div>'
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
            $.ajax("/transactions/new",{
              data:$(".form_achat").serialize()+"&offre_id="+offre_id,
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
            $(pressed_button).show();
          });
        });
      });
    }
  });
});
