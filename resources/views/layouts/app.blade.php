<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Crud</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-ststic-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('casenote.index')}}">CodELog</a>
    </div>
  </div>
</nav>
<div class="container">
  @yield('content')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
  {{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
      $('#create').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Add CaseNote');
  });
  $("#add").click(function() {
      $.ajax({
          type: 'POST',
          url: 'addCaseNote',
          data: {
              '_token': $('input[name=_token]').val(),
              'notes': $('textarea[name=notes]').val()
          },
          success: function(data){
              if ((data.errors)) {
                  $('.error').removeClass('hidden');
                  $('.error').text(data.errors.notes);

              } else {
                  $('.error').remove();
                  $('#casenotes').append(" "+
                      "<div class='col-sm-12 post" + data.id + "'>"+
                      "<div class='card  border-warning mb-3'>"+
                      "<div class='card-body'>"+
                      "<h5 class='card-title'>" + data.created_at + " " + data.employee_id + " "+ data.employee_id + " " + data.employee_id + " </h5>"+
                      "<p>" + data.updated_at + "</p>"+
                      "<p class='card-text'>" + data.notes + "</p></div>"+
                      "<div class='card-footer'>"+
                      "<button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-notes='" + data.notes + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-notes='" + data.notes + "'><span class='fa fa-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-notes='" + data.notes + "'><span class='fa fa-trash'></span></button>"+
                      "</div></div></div>");
              }
          },
      });
      $('#notes').val('');

  });

  // function Edit POST
  $(document).on('click', '.edit-modal', function() {
      $('#footer_action_button').text(" Update Note");
      $('#footer_action_button').addClass('fa fa-check');
      $('#footer_action_button').removeClass('fa-trash');
      $('.actionBtn').addClass('btn-success');
      $('.actionBtn').removeClass('btn-danger');
      $('.actionBtn').addClass('edit');
      $('.modal-title').text('CaseNote Edit');
      $('.deleteContent').hide();
      $('.form-horizontal').show();
      $('#fid').val($(this).data('id'));
      $('#t').val($(this).data('notes'));
      $('#myModal').modal('show');
  });

  $('.modal-footer').on('click', '.edit', function() {
      $.ajax({
          type: 'POST',
          url: 'editCaseNote',
          data: {
              '_token': $('input[name=_token]').val(),
              'id': $("#fid").val(),
              'notes': $('#t').val()
          },
          success: function(data){
              $('.post' + data.id).replaceWith(" "+
                  "<div class='col-sm-12 post" + data.id + "'>"+
                  "<div class='card  border-warning mb-3'>"+
                  "<div class='card-body'>"+
                  "<h5 class='card-title'>" + data.created_at + " " + data.employee_id + " "+ data.employee_id + " " + data.employee_id + " </h5>"+
                  "<p>" + data.updated_at + "</p>"+
                  "<p class='card-text'>" + data.notes + "</p></div>"+
                  "<div class='card-footer'>"+
                  "<button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-notes='" + data.notes + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-notes='" + data.notes + "'><span class='fa fa-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-notes='" + data.notes + "'><span class='fa fa-trash'></span></button>"+
                  "</div></div></div>");

          }
      });
      $('#notes').val('');
  });


  // form Delete function
  $(document).on('click', '.delete-modal', function() {
      $('#footer_action_button').text(" Delete");
      $('#footer_action_button').removeClass('fa  fa-check');
      $('#footer_action_button').addClass('fa fa-trash');
      $('.actionBtn').removeClass('btn-success');
      $('.actionBtn').addClass('btn-danger');
      $('.actionBtn').addClass('delete');
      $('.modal-title').text('Delete CaseNote');
      $('.id').text($(this).data('id'));
      $('.deleteContent').show();
      $('.form-horizontal').hide();
      $('.notes').html($(this).data('notes'));
      $('#myModal').modal('show');
  });

  $('.modal-footer').on('click', '.delete', function(){
      $.ajax({
          type: 'POST',
          url: 'deleteCaseNote',
          data: {
              '_token': $('input[name=_token]').val(),
              'id': $('.id').text()
          },
          success: function(data)
          {
              $('.post' + $('.id').text()).remove();
          }
      });
  });

  // Show function
  $(document).on('click', '.show-modal', function()
  {
      $('#show').modal('show');
      $('#i').text($(this).data('id'));
      $('#ti').text($(this).data('notes'));
      $('.modal-title').text('Show CaseNote');
  });
</script>

</body>
</html>
