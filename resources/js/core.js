$(document).ready(function ()
{
  $("#sidebar").mCustomScrollbar(
    {
      theme: "minimal"
    });

  $('#sidebarCollapse').on('click', function ()
  {
    $('#sidebar').toggleClass('active');
    if ($('#sidebar').hasClass('active'))
    {
      $('#sidebarCollapse').find('span').each(function ()
      {
        this.innerText = 'Mostrar menú';
      });
    } else
    {
      $('#sidebarCollapse').find('span').each(function ()
      {
        this.innerText = 'Esconder menú';
      });
    }
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });

  if (window.location.pathname == '/users/create-users') 
  {
    $('#user-save').attr('data-save', 'save');
  }
  else if(window.location.pathname == '/users/update-users')
  {
    $('#user-save').attr('data-save', 'update');
  }

  $('#user-save').click(function ()
  {
    if ($('#user-save').attr('data-save') == 'save')
    {
      Swal.fire(
        {
          title: 'Verificación de datos',
          text: '¿Está seguro de almacenar los datos ingresados en el formulario?',
          type: 'info',
          showLoaderOnConfirm: true,
          showCancelButton: true,
          confirmButtonText: 'Si, acepto',
          cancelButtonText: 'Regresar',
          preConfirm: () => {
            let name = $('#user-name').val();
            let lastname = $('#user-lastname').val();
            let email = $('#user-email').val();
            let password = $('#user-password').val();
            if (name == '' || email == '' || password == '' || lastname == '') 
            {
              Swal.showValidationMessage('Hay campos inválidos');
            }
          }
      }).then((result) =>
      {
        if (result.value)
        {
          $.ajax(
            {
              type: 'POST',
              data: {
                'action': $('#user-save').attr('data-save'),
                'user-name': $('#user-name').val(),
                'user-lastname': $('#user-lastname').val(),
                'user-email': $('#user-email').val(),
                'user-password': $('#user-password').val(),
                'user-password-confirmation': $('#user-password-confirmation').val(),
              },
              dataType: 'JSON',
              url: $('#user-action').attr('url-action'),
              success: function(json)
              {
                if (json.success) 
                {
                  Swal.fire(
                    {
                      position: 'top-end',
                      type: 'success',
                      title: json.message,
                      showConfirmButton: false,
                      timer: 1000
                    }
                  );
                }
                else
                {
                  var list = '';
                  var parsed = json[0].err;
                  
                  $.each(parsed, function (index, value)
                  {
                    $.each(value, function (index, value2)
                    {
                      list+= '<li>' + value2 + '</li>'
                    });
                  });

                  Swal.fire(
                    {
                      type: 'error',
                      title: 'Hay campos inválidos',
                      html: list,
                      confirmButtonText: 'Regresar'
                    }
                  );
                }
              }
            }
          );
        }
        else if(result.dismiss == Swal.DismissReason.cancel)
        {
          Swal.fire(
          'Acción cancelada',
          '',
          'error');
        }
      });
    }
  });
});