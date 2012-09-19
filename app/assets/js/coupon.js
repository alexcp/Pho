$(document).ready(function(){
  $.ajax("/offres/index",{
    method:"get",
    dataType:'json',
    success:function(offres){
      $.each(offres,function(key,val){
        $("#offres").append('<li><a href="#">'+ val["nom"] +' </a>'+
          '<p class="description">'+ val["description"] +'</p>'+
          '<p class="quantite">'+val["quantite"]+' coupons disponible.</p></li>');
      })
    }
  })
});
