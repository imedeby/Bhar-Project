@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editer d'un Bon Du Commande</h4>
                  <form class="form-sample" method="post" action="{{ url('admin/dashboard') }}" id="form_fact" name="form_fact"> {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Numero de facture </label>
                          <div class="col-sm-6">
                            <input type="number" class="form-control" id="n_facture" name="n_facture" value="{{ $num }}" disabled />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nom du Client </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $n_client }}" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Source Facture </label>
                          <div class="col-sm-9">
                            <select class="form-control" id="source" name="source">
                              <option>Ariana</option>
                              <option>Ben Aarous</option>
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Adress </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="adress" name="adress" value="{{ $adress }}" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">mobile </label>
                          <div class="col-sm-9">
                            <input type="tel" class="form-control" id="mobile" name="mobile" pattern="^\d{8}$" value="{{ $p_num }}" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date debut </label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" id="date_d" name="date_d" value="{{ $dd }}"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date fin </label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" id="date_f" name="date_f" value="{{ $df }}" />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12  stretch-card">
                      <div class="card">
                      <div class="card-body">
                      <section>
                        <div class="panel panel-footer" >
                          <table class="table" >
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Article</th>
                              <th>Quantite</th>
                              <th>Prix Unitaire</th>
                              <th>Prix Quantite</th>
                              <th class="text-center" width="150px">
                                <a href="#" class="create-modal btn btn-success btn-sm">
                                <i class="ti-plus"></i>
                                </a>
                              </th>
                            </tr>
                            </thead>
                            <tbody id="table">
                          </tbody>
                          <tfoot>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>Total</td>
                              <td class="total"></td>
                              <td></td>
                            </tr>
                          </tfoot>
                          </table>
                        </div>
                      </section>
                      
                      </div>
                      </div>
                      
                      </div>
                      
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Net a payer </label>
                          <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="np" name="np" value="{{ $n_p }}" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Remise(%) </label>
                          <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" id="re" name="re" value="{{ $remise }}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Avance </label>
                          <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="av" name="av" value="{{ $av1 }}"/>
                          </div>
                        </div>
                      </div>
                      @if($av2 != 0)
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">2eme Avance </label>
                          <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="av2" name="av2" value="{{ $av2 }}"/>
                          </div>
                        </div>
                      </div>
                      @endif
                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Type de la caution </label>
                          <div class="col-sm-6">
                            <select class="form-control" id="tc" name="tc">
                              @if($tc == "Cheque")
                              <option selected>Cheque</option>
                              <option>Espece</option>
                              @else
                              <option>Cheque</option>
                              <option selected>Espece</option>
                              @endif
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Remarque </label>
                          <div class="col-sm-8">
                          <textarea class="form-control" id="rem" name="rem" rows="4" value="{{ $remarque }}"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                            @if($tva != 1)
                              <input type="checkbox" id="tva" name="tva" class="form-check-input " value="tva">TVA
                            @else  
                              <input type="checkbox" id="tva" name="tva" class="form-check-input " value="tva" checked>TVA
                            @endif
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div align="center">
                    <button type="submit" id="valid" name="valid" class="btn btn-primary mr-2">Valider</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          
            
          </div>


<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter un article</h4>
                    </div>
                    <div class="modal-body">
                    <form class="article_form" method="POST"> 
         
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Articles</label>
                          <div class="col-sm-7">
                          <select class="form-control" name="article_i" id="article_i" >
                          </select>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-10">
                      <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Quantity</label>
                          <div class="col-sm-7">
                            <input type="number" class="form-control" name="quantity_i" id="quantity_i" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-10">
                      <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Prix Unitaire</label>
                          <div class="col-sm-7">
                            <input type="number" class="form-control" name="prix_i" id="prix_i" step="0.01" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>     
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default mr-2" name="close_t" id="close_t" data-dismiss="modal">Close</button>
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
         <div class="row">
           <div class="col-md-10">
           <div class="form-group row">
               <label class="col-sm-5 col-form-label">Quantity</label>
               <div class="col-sm-7">
                 <input type="number" class="form-control" name="quantity_ma" id="quantity_ma" disabled/>
               </div>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-md-10">
           <div class="form-group row">
               <label class="col-sm-5 col-form-label">Prix Unitaire</label>
               <div class="col-sm-7">
                 <input type="number" class="form-control" name="prix_ma" id="prix_ma" step="0.01" disabled/>
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
               <select class="form-control"  name="article_m" id="article_m" >
                </select>
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
         <div class="row">
           <div class="col-md-10">
           <div class="form-group row">
               <label class="col-sm-5 col-form-label">Prix Unitaire</label>
               <div class="col-sm-7">
                 <input type="number" class="form-control" name="prix_m" id="prix_m" step="0.01" required/>
               </div>
             </div>
           </div>
         </div>
         </div>
         <div class="deleteContent">
          Are You sure want to delete <span class="title"></span>?
          <span class="hidden id"></span>
          <br>
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
  
  $(document).ready(function(){

    $.post('/bhar/public/admin/indexfacture',{
        '_token': $('input[name=_token]').val(),
        'n_facture': $('input[name=n_facture]').val()
    }, function(data){
      data = JSON.parse(data);
      var i = 0;
      var html_code = '';
      var c =0;

      $.each(data, function(key, value){
          html_code += "<tr class='post" + value.id + "'>" ;
          html_code +="<td>" + i ++ + "</td>";
          html_code += "<td>" + value.article_i + "</td>";
          html_code +="<td>" + value.quantity_i + "</td>";
          html_code +="<td>" + value.prix_i + "</td>";
          html_code +="<td class ='itemtotal'>" + value.prix_i * value.quantity_i + "</td>";
          html_code +="<td><button class='edit-modal btn btn-warning btn-sm' data-id='" + value.id + "' data-title='" + value.quantity_i + "' data-body='" + value.prix_i + "'><span class='ti-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + value.id + "' data-title='" + value.quantity_i + "' data-body='" + value.prix_i + "'><span class='ti-trash'></span></button></td>"+ "</tr>";
          c +=  value.prix_i * value.quantity_i ;
      });
      $('#table').html(html_code);
      $('.total').text(c);
    });
});
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.article_form').show();
    $.getJSON("/bhar/public/admin/indexstock", function(data){
      var html_code= '';
      $.each(data, function(key, value){
        html_code += '<option value="'+value.article+'">'+value.article+'</option>';
      });
      $("#article_i").html(html_code);
    });
  });
  $("#add").click(function() {

    $.post('/bhar/public/admin/addItem',{
        '_token': $('input[name=_token]').val(),
        'article_i': $("#article_i option:selected").val(),
        'quantity_i': $('input[name=quantity_i]').val(),
        'prix_i': $('input[name=prix_i]').val()
      },function(data){
        var k = parseInt($('.total').text());
        var data = jQuery.parseJSON(data);
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.article_i);
          $('.error').text(data.errors.quantity_i);
          $('.error').text(data.errors.prix_i);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.article_i + "</td>"+
          "<td>" + data.quantity_i + "</td>"+
          "<td>" + data.prix_i + "</td>"+
          "<td class ='itemtotal'>" + data.prix_i * data.quantity_i + "</td>"+
          "<td><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.quantity_i + "' data-body='" + data.prix_i + "'><span class='ti-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.quantity_i + "' data-body='" + data.prix_i + "'><span class='ti-trash'></span></button></td>"+
          "</tr>");
           k += data.prix_i * data.quantity_i  ;
           $('.total').text(k);
        }
      }).fail(function(xhr, status, error){
        console.log(error);
      });
      $('input[name=quantity_i]').val(0);
      $('input[name=prix_i]').val(0);
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
    $.getJSON("/bhar/public/admin/indexstock", function(data){
      var html_code= '';
      $.each(data, function(key, value){
        html_code += '<option value="'+value.article+'">'+value.article+'</option>';
      });
      $("#article_m").html(html_code);
    });
    $('#quantity_ma').val($(this).data('title'));
    $('#prix_ma').val($(this).data('body'));
    $('#id_m').val($(this).data('id'));
    $('#quantity_m').val($(this).data('title'));
    $('#prix_m').val($(this).data('body'));
    $('#myModal').modal('show');
  
});

$('.modal-footer').on('click', '.edit', function() {

  $.post('/bhar/public/admin/editItem',{
        '_token': $('input[name=_token]').val(),
        'id': $('#id_m').val(),
        'article_i': $("#article_m option:selected").val(),
        'quantity_i': $('input[name=quantity_m]').val(),
        'prix_i': $('input[name=prix_m]').val()
      },function(data){
        var c =  parseFloat($('#quantity_ma').val()) *  parseFloat($('#prix_ma').val());
        var k = parseFloat($('.total').text());
      
        var data = jQuery.parseJSON(data);
          $('.post' + data.id ).replaceWith("<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.article_i + "</td>"+
          "<td>" + data.quantity_i + "</td>"+
          "<td>" + data.prix_i + "</td>"+
          "<td class ='itemtotal'>" + data.prix_i * data.quantity_i + "</td>"+
          "<td><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.quantity_i + "' data-body='" + data.prix_i + "'><span class='ti-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.quantity_i + "' data-body='" + data.prix_i + "'><span class='ti-trash'></span></button></td>"+
          "</tr>");
          var b = data.prix_i * data.quantity_i ;
          if (c < b){
            var m = c - b;
            k -= m ;
          }
          else 
          {
            k = k + (b - c) ;
          }
  
         
          $('.total').text(k);
      });
});
$(document).click(function() {
    var total = $('.total').text();
    var np = $('#np').val();
    var r = 0;
    if(np != 0 & re != 100 ){
        if (parseFloat(total)< np){
          $('#re').val("-infinity");
        }
        else if (parseFloat(total) == np) {
          $('#re').val(0);
        }
        else {
          r = ((parseFloat(total) - np ) / parseFloat(total)) * 100 ;
          r = r.toFixed(2);  
          $('#re').val(r);
        }
    }
}); 
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Delete");
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Delete Item');
$('.deleteContent').show();
$('.idContent').hide();
$('.article_form').hide();
$('#quantity_ma').val($(this).data('title'));
$('#prix_ma').val($(this).data('body'));
$('#id_m').val($(this).data('id'));
$('#myModal').modal('show');
});
$('.modal-footer').on('click', '.delete', function(){
  $.post('/bhar/public/admin/deleteItem',{
        '_token': $('input[name=_token]').val(),
        'id': $('#id_m').val()
      },function(data){
        var k = parseFloat($('.total').text());
        var c =  parseFloat($('#quantity_ma').val()) *  parseFloat($('#prix_ma').val());
        k -= c;
        $('.post' + $('#id_m').val()).remove();
        $('.total').text(k);
      });
});



$(document).ready(function(){

$("#form_fact").on('submit',function() {
    var x = 0;
       if($('#table').html() != ''){
        if ($("#tva").is(':checked')){
            x= 1 ;
        }
        else {
            x=0;
        }
       $.post('/bhar/public/admin/updateFacture',{
            '_token': $('input[name=_token]').val(),
            'id' : $('input[name=n_facture]').val(),
            'nom': $('input[name=nom]').val(),
            'source': $("#source option:selected").val(),
            'adress': $('input[name=adress]').val(),
            'mobile': $('input[name=mobile]').val(),
            'date_d': $('input[name=date_d]').val(),
            'date_f': $('input[name=date_f]').val(),
            'np': $('input[name=np]').val(),
            're': $('input[name=re]').val(),
            'av': $('input[name=av]').val(),
            'av2': $('input[name=av2]').val(),
            'tc': $("#tc option:selected").val(),
            'rem': $('#rem').val(),
            'total': $('.total').text(),
            'tva' : x
          });
      }
      else{
        alert("put articles");
        return false;
      }
  });

});
  </script>

@endsection