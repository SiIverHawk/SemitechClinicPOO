$(document).ready(function() {
  $("#sidebar").mCustomScrollbar({
    theme: "minimal"
  });

  $('#sidebarCollapse').on('click', function() {
    $('#sidebar').toggleClass('active');
    if ($('#sidebar').hasClass('active')) {
      $('#sidebarCollapse').find('span').each(function() {
        this.innerText = 'Mostrar menú';
      });
    } else {
      $('#sidebarCollapse').find('span').each(function() {
        this.innerText = 'Esconder menú';
      });
    }
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });
});