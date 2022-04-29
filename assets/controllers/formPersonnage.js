const { func } = require("prop-types");

var form = document.querySelector("#personnageForm")

$(document).on('change', '#edit_personnage_numberRecompences,#edit_personnage_numberVertus,#edit_personnage_numberArmes,#personnage_valeurPrincipale,#personnage_attributCoeur,#personnage_attributCorps, #personnage_classe, #personnage_origine, #personnage_vocation', function(){
    form.submit();
})
$('.loader').hide(1000)
/******Disabled champs & loader ********* */
document.getElementById('personnage_Admiration').disabled = true;
document.getElementById('personnage_Athletisme').disabled = true;
document.getElementById('personnage_Conscience').disabled = true;
document.getElementById('personnage_Exploration').disabled = true;
document.getElementById('personnage_Chant').disabled = true;
document.getElementById('personnage_Artisanat').disabled = true;
document.getElementById('personnage_Inspiration').disabled = true;
document.getElementById('personnage_Voyage').disabled = true;
document.getElementById('personnage_Perspicacite').disabled = true;
document.getElementById('personnage_Guerison').disabled = true;
document.getElementById('personnage_Courtoisie').disabled = true;
document.getElementById('personnage_Combat').disabled = true;
document.getElementById('personnage_Persuasion').disabled = true;
document.getElementById('personnage_Furtivite').disabled = true;
document.getElementById('personnage_Fouille').disabled = true;
document.getElementById('personnage_Chasse').disabled = true;
document.getElementById('personnage_Enigmes').disabled = true;
document.getElementById('personnage_Conaissances').disabled = true;
document.getElementById('personnage_part_ombre').disabled = true;
document.getElementById('personnage_traits').disabled = true;
document.getElementById('personnage_Athletisme').disabled = true;

document.getElementById('personnage_standard_de_vie').disabled = true;
document.getElementById('personnage_avantage_culturel').disabled = true;
document.getElementById('personnage_competence_favorite').disabled = true;

document.getElementById('personnage_espoir').disabled = true;
document.getElementById('personnage_corps').disabled = true;
document.getElementById('personnage_esprit').disabled = true;

document.getElementById('personnage_coeur').disabled = true;
document.getElementById('personnage_endurance').disabled = true;
//$('.loader').hide()
form.addEventListener("submit", function(e){
  document.getElementById('personnage_Admiration').disabled = false;
  document.getElementById('personnage_Admiration').disabled = false;
  document.getElementById('personnage_Athletisme').disabled = false;
  document.getElementById('personnage_Conscience').disabled = false;
  document.getElementById('personnage_Exploration').disabled = false;
  document.getElementById('personnage_Chant').disabled = false;
  document.getElementById('personnage_Artisanat').disabled = false;
  document.getElementById('personnage_Inspiration').disabled = false;
  document.getElementById('personnage_Voyage').disabled = false;
  document.getElementById('personnage_Perspicacite').disabled = false;
  document.getElementById('personnage_Guerison').disabled = false;
  document.getElementById('personnage_Courtoisie').disabled = false;
  document.getElementById('personnage_Combat').disabled = false;
  document.getElementById('personnage_Persuasion').disabled = false;
  document.getElementById('personnage_Furtivite').disabled = false;
  document.getElementById('personnage_Fouille').disabled = false;
  document.getElementById('personnage_Chasse').disabled = false;
  document.getElementById('personnage_Enigmes').disabled = false;
  document.getElementById('personnage_Conaissances').disabled = false;
  document.getElementById('personnage_part_ombre').disabled = false;
  document.getElementById('personnage_traits').disabled = false;
  document.getElementById('personnage_Athletisme').disabled = false;
  document.getElementById('personnage_standard_de_vie').disabled = false;
  document.getElementById('personnage_avantage_culturel').disabled = false;
  document.getElementById('personnage_competence_favorite').disabled = false;
  document.getElementById('personnage_espoir').disabled = false;
  document.getElementById('personnage_corps').disabled = false;
  document.getElementById('personnage_esprit').disabled = false;
  document.getElementById('personnage_coeur').disabled = false;
  document.getElementById('personnage_endurance').disabled = false;
  $('#personnageForm').hide(1000)
  $('.loader').show(1000); 
  });

//AJAX de l'ajout d'amis
$(document).on('click', '#ajaxAddFriend', function(e){
  e.preventDefault()
  ajax_simple(this.value)
})

$(document).on('click', '.deletFriend', function(e){
  e.preventDefault()
  ajax_simple(this.value)
})


$(document).on('change', 'input[type=checkbox]', function(e){
  e.preventDefault()
  // Si j'ai un id de partie je redirige vers la modification de partie sinon creation
  $('#partieNumber').val() ?ajax_form($('#ajaxCreatePartie').val()+'/'+$('#partieNumber').val(),$('[name=partie]')):ajax_form($('#ajaxCreatePartie').val() ,$('[name=partie]') )
})

$(document).on('click', '#endPartie', function(e){
  $('#endPartie').hide()
  $('#endPartieCancel').show()
  $('#generate_de').hide()
  $('.showModifPerso').show()
  $('#endModif').show()
})


$(document).ready( function(e){
$("label[for='personnage_classe']").hide()
$("label[for='personnage_origine']").hide()
$("label[for='personnage_vocation']").hide()
})


$(document).on('click', '#endPartieCancel', function(e){
  $('#endPartie').show()
  $('#endPartieCancel').hide()
  $('#generate_de').show()
  $('.showModifPerso').hide()
  $('#endModif').hide()
})

$(document).on('click', '#partieShow', function(e){
  $('#partie').show()
  $('#personnage').hide()
  
})




if ($('#is_modif').val() == 1) {
  $('#endPartie').hide()
  $('#endPartieCancel').show()
  $('#generate_de').hide()
  $('.showModifPerso').show()
}

//AJAX pour la recherche d'amis
$(document).on('click', '#submit_friend', function(e){
  e.preventDefault()
  let form = $('[name=recherche_amis]')
  let path_friend = $('#path_friend').val();
  ajax_form(path_friend ,form )
})

function ajax_form(url, form){

  $.ajax({
    method: 'POST',
    url: url,
    data: form.serialize(),
    dataType: "HTML",
}).done( function(response) {
  // Je split pour récupérer et changer que le body
  let splitResponse1 = response.split('</barre-navigation>')[1];
  let splitResponse = splitResponse1.split('<script>')[0]

   $(".replaceAjaxContent").html(splitResponse);
}).fail(function(jxh,textmsg,errorThrown){
    console.log(textmsg);
    console.log(errorThrown);
});
}


function ajax_simple(url){

      $.ajax({
        method: 'POST',
        url: url,
        dataType: "HTML",
    }).done( function(response) {
      let splitResponse1 = response.split('</barre-navigation>')[1];
      let splitResponse = splitResponse1.split('<script>')[0]

       $(".replaceAjaxContent").html(splitResponse);
    }).fail(function(jxh,textmsg,errorThrown){
        console.log(textmsg);
        console.log(errorThrown);
    });
}















//Générateur de dés
function randomNumber(range) {
    return Math.round( Math.random() * range );
  }
  
  // --- d4 --- //
  $('#d4Roll').on('click',
  function(){
    var d4Result = Math.floor(Math.random()*4+1);
    document.getElementById('display').innerHTML = d4Result;
  })
  
  // --- d6 --- //
  $('#d6Roll').on('click',
  function(){
    var d6Result = Math.floor(Math.random()*6+1);
    document.getElementById('display').innerHTML = d6Result;
  })
  
  // --- d8 --- //
  $('#d8Roll').on('click',
  function(){
    var d8Result = Math.floor(Math.random()*8+1);
    document.getElementById('display').innerHTML = d8Result;
  })
  
  // --- d10 --- //
  $('#d10Roll').on('click',
  function(){
    var d10Result = Math.floor(Math.random()*10+1);
    document.getElementById('display').innerHTML = d10Result;
  })
  
  // --- d12 --- //
  $('#d12Roll').on('click',
  function (){
    var d12Result = Math.floor(Math.random()*12+1);
    document.getElementById('display').innerHTML = d12Result;
  })
  
  // --- d20 --- //
  $('#d20Roll').on('click',
  function (){
    var d20Result = Math.floor(Math.random()*20+1);
    document.getElementById('display').innerHTML = d20Result;
  })
  
  // --- d100 --- //
  $('#d4Roll').on('click',
  function (){
    var d100Result = Math.floor(Math.random()*100+1);
    document.getElementById('display').innerHTML = d100Result;
  })
  //Générateur de dés
  