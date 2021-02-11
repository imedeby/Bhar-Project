@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Etat du stock</h4>
                  <div class="table-responsive"> {{ csrf_field() }}
                    <table class="table" id="table">
                      <thead>
                        <tr>
                          <th>Article</th>
                          <th>Quantité</th>
                          <th>Casse</th>
                          <th class="text-center" width = "150px">
                                <a href="#" class="create-modal btn btn-success btn-sm">
                                <i class="ti-plus"></i>
                                </a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($stocks as $stock)
                        <tr class="stock{{$stock->id}}">
                          <td>{{ $stock->article }}</td>
                          <td>{{ $stock->quantity }}</td>
                          <td>{{ $stock->casse }}</td>
                          <td> 
                              <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$stock->id}}" data-title="{{$stock->article}}" data-body="{{$stock->quantity}}">
                              <i class="ti-pencil"></i>
                              </a>
                              <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$stock->id}}" data-title="{{$stock->article}}" data-body="{{$stock->quantity}}">
                              <i class="ti-trash"></i>
                              </a></td>
                        </tr>
                      @endforeach  
                      </tbody>
                    </table>
                  </div>
                </div><th>
              </div><th>

            </div>
            
          </div>

          <div class="modal fade" id="articles_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter un article</h4>
                    </div>
                    <div class="modal-body">
                    <form class="article_form" method="POST"> 
         
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Articles</label>
                          <div class="col-sm-7">
                          <input type="text" class="form-control" name="article" id="article" required/>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-8">
                      <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Quantity</label>
                          <div class="col-sm-7">
                            <input type="number" class="form-control" name="quantity" id="quantity" required/>
                          </div>
                        </div>
                      </div>
                    </div>
  
                    </div>
      
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default mr-2" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary mr-2" id="add">Ajouter</button>
                    </div>
  
                  </form>
                </div>
       
        </div>
    </div>
</div>
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      <form class="article_form" method="POST"> 
      <div class="idContent">
      <div class="row">
           <div class="col-md-10">
           <div class="form-group row">
               <label class="col-sm-5 col-form-label">ID</label>
               <div class="col-sm-7">
                 <input type="text" class="form-control" name="id_m" id="id_m" disabled/>
               </div>
             </div>
           </div>
         </div>
        </div> 
         <div class="row">
           <div class="col-md-10">
             <div class="form-group row">
               <label class="col-sm-5 col-form-label">Articles</label>
               <div class="col-sm-7">
               <input type="text" class="form-control" name="article_m" id="article_m" required/>
               </div>
             </div>
           </div>
           </div>
           <div class="row">
           <div class="col-md-10">
           <div class="form-group row">
               <label class="col-sm-5 col-form-label">Quantity</label>
               <div class="col-sm-7">
                 <input type="number" class="form-control" name="quantity_m" id="quantity_m" required/>
               </div>
             </div>
           </div>
         </div>
      
         </div>
         <div class="deleteContent">
          Are You sure want to delete <span class="title"></span>?
          <span class="hidden id"></span>
        </div>
         <div class="modal-footer"> 
             <button type="button" class="btn btn-default mr-2" data-dismiss="modal">Fermer</button>
             <button type="button" class="btn  mr-2 actionBtn" id="footer_action_button" data-dismiss="modal"></button>
         </div>

       </form>
       
      </div>
    </div>
  </div>
</div>

 </div>
<script type="text/javascript">
     {{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#articles_modal').modal('show');
    $('.idContent').show();
    $('.article_form').show()
  });
  $("#add").click(function() {
    $.post('/bhar/public/admin/addStock',{
        '_token': $('input[name=_token]').val(),
        'article': $('input[name=article]').val(),
        'quantity': $('input[name=quantity]').val(),
        'casse' : 0,
      },function(data){
        var data = jQuery.parseJSON(data);
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.article);
          $('.error').text(data.errors.quantity);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='stock" + data.id + "'>"+
          "<td>" + data.article + "</td>"+
          "<td>" + data.quantity + "</td>"+
          "<td>" + data.casse + "</td>"+
          "<td><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.article + "' data-body='" + data.quantity + "'><span class='ti-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.article + "' data-body='" + data.quantity + "'><span class='ti-trash'></span></button></td>"+
          "</tr>");
        }
      }).fail(function(xhr, status, error){
        console.log(error);
      });
      $('input[name=article]').val("") ;
      $('input[name=quantity]').val(0);
  });
  $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Editer");
    $('.actionBtn').addClass('btn-primary');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Editer Article');
    $('.deleteContent').hide();
    $('.idContent').hide();
    $('.article_form').show();
    $('#id_m').val($(this).data('id'));
    $('#article_m').val($(this).data('title'));
    $('#quantity_m').val($(this).data('body'));
    $('#myModal').modal('show');
  
});

$('.modal-footer').on('click', '.edit', function() {

  $.post('/bhar/public/admin/editStock',{
        '_token': $('input[name=_token]').val(),
        'id': $('#id_m').val(),
        'article': $("#article_m").val(),
        'quantity': $('input[name=quantity_m]').val()
      },function(data){
       
        var data = jQuery.parseJSON(data);
          $('.stock' + data.id ).replaceWith("<tr class='stock" + data.id + "'>"+
          "<td>" + data.article + "</td>"+
          "<td>" + data.quantity + "</td>"+
          "<td>" + data.casse + "</td>"+
          "<td><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.article + "' data-body='" + data.quantity + "'><span class='ti-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.article + "' data-body='" + data.quantity + "'><span class='ti-trash'></span></button></td>"+
          "</tr>");
      });
});
  $(document).on('click', '.delete-modal', function() {
    $('#footer_action_button').text(" Delete");
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Delete Article');
    $('.deleteContent').show();
    $('.idContent').hide();
    $('.article_form').hide();
    $('#id_m').val($(this).data('id'));
    $('#myModal').modal('show');
  });
  $('.modal-footer').on('click', '.delete', function(){
    $.post('/bhar/public/admin/deleteStock',{
        '_token': $('input[name=_token]').val(),
        'id': $('#id_m').val()
      },function(data){
        $('.stock' + $('#id_m').val()).remove();
      });
  });
  </script>
@endsection