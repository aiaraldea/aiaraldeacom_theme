$(document).ready(function () { 
  $('ul.quicktabs_tabs li a').each(function(){
    $(this).bind('mouseover', quicktabsClick);
  });
});