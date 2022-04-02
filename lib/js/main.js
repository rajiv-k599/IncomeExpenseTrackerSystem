$(function() { 
  $('#sidebarToggle').on('click', function() {
    $('#sidebar,#content').toggleClass('active');
  });
});

$(function() {
    $('#table').on('click',function(){
    	$('#Report').toggleClass('active');
    });
});