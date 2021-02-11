@extends('layouts.reglementLayout.reglement_design')
@section('content')
<div class="content-wrapper">
<div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">  
                <div class="card-body">
                  <h4 class="card-title" align = "center">Reglement</h4>
                  <br>
                  <br>
                  <form class="form-sample" method="POST">  {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date debut</label>
                          <div class="col-sm-6">
                            <input type="date" class="form-control" id="start_date" name="start_date">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date fin</label>
                          <div class="col-sm-6">
                            <input type="date" class="form-control" id="end_date" name="end_date">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div align="center">
                      <input type="button" name="search" id="search" value="Search" class="btn btn-primary mr-2" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
<div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive"> {{ csrf_field() }}
                    <table class="table" id="table">
                      <thead>
                        <tr>
                          <th>N Facture</th>
                          <th>Nom du Client</th>
                          <th>Article</th>
                          <th>Qté</th>
                          <th>Date de livraison</th>
                          <th>Etat</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody class = "listfact">
        
                      </tbody>
                    </table>
                  </div>
                </div><th>
              </div><th>

            </div>
            
          </div>
</div>
<div class="modal fade" id="valid" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Valider le facture </h4>
                    </div>
                    <div class="modal-body">
                    <form class="article_form" method="POST"> 
                    <div class="idContent">
                      <div class="row">
                        <div class="col-md-10">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">ID</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="id_v" id="id_v" disabled/>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      Êtes-vous sûr de vouloir confirmer? <span class="title"></span>?
                        <span class="hidden id"></span>
                    </div>

                    </div>     
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default mr-2" name="close_t" id="close_t" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary mr-2" id="validater"  data-dismiss="modal" >Valider</button>
                    </div>
                    
                  </form>
                </div>
       
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      <form class="article_form" method="POST"> 
      <div class="totalContent">
        <div class="row">
           <div class="col-md-10">
           <div class="form-group row">
               <label class="col-sm-5 col-form-label">ID</label>
               <div class="col-sm-7">
                 <input type="text" class="form-control" name="total" id="total" disabled/>
               </div>
             </div>
           </div>
         </div>
         </div>
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
               <label class="col-sm-5 col-form-label">2 eme Avance</label>
               <div class="col-sm-7">
                 <input type="number" step="0.01" class="form-control" id="av" name="av"/>
               </div>
             </div>
           </div>
         </div>
         </div>
        <br>
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

  $(document).on('click','.valid-modal', function() {
          $('#valid').modal('show');
          $('.article_form').show();
          $('.idContent').hide();
          $('#id_v').val($(this).data('id'));
      });
      $('.modal-footer').on('click', '#validater', function(){
          $.post('/bhar/public/reglement/validFacture',{
            '_token': $('input[name=_token]').val(),
            'id': $('#id_v').val()
          },function(data){
            $('.' + $('#id_v').val()).remove();
            location.reload();
          });
      });
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Valider");
          $('.actionBtn').addClass('btn-primary');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Ajouter 2eme avance');
          $('.idContent').show();
          $('.totalContent').hide();
          $('.article_form').show();
          $('#id_m').val($(this).data('id'));
          $('#av').val($(this).data('title'));
          $('#myModal').modal('show');  
      });
      $('.modal-footer').on('click', '.edit', function(){
          $.post('/bhar/public/reglement/avanceFacture',{
            '_token': $('input[name=_token]').val(),
            'id': $('#id_m').val(),
            'avance2': $('#av').val()
          },function(data){
            location.reload();
          });
      });
  
  $(document).ready(function(){
    $.getJSON("/bhar/public/reglement/reginit", function(data){
      var factures = jQuery.parseJSON(JSON.stringify(data.factures));
      var len = factures.length;
      var items = jQuery.parseJSON(JSON.stringify(data.items));
      var len2 = items.length;
      var c = 0;
      var d = new Date();
      var month = d.getMonth()+1;
      var day = d.getDate();
      var from = d.getFullYear() + '-' +
      ((''+month).length<2 ? '0' : '') + month + '-' +
      ((''+day).length<2 ? '0' : '') + day;
      var to = d.getFullYear() + '-' +
      ((''+month).length<2 ? '0' : '') + month + '-' +
      ((''+day).length<2 ? '0' : '') + (day+1);
     



      $('#search').click(function () {
        
          c=1;
          $('#tri').remove();
          var html_code= '';
          var html_item1 = '';
          var html_item2 = '';
          for( var i=0 ;  i < len;  i++ ){
            if((factures[i].date_debut >= $('#start_date').val()) && (factures[i].date_fin <= $('#end_date').val())&& (factures[i].status_r === 0) )
            {
              for(var j=0; j< len2; j++ ){
                if(items[j].N_facture_i === factures[i].N_facture){
                  html_item1 += items[j].article_i + '<br>';
                  html_item2 += items[j].quantity_i + '<br>';
                  }
              }
            html_code += '<tr id ="tri" class ="'+factures[i].N_facture+'">';
            html_code += '<td>'+factures[i].N_facture+'</td>';
            html_code += '<td>'+factures[i].N_client+'</td>';
            html_code += '<td>'+ html_item1 + '</td>';
            html_code += '<td>'+ html_item2 + '</td>';
            html_code += '<td>'+factures[i].date_debut+'</td>';
            if(factures[i].avance2 === 0){
              html_code += '<td> Net: '+factures[i].net_payer + '<br>' + 'Avance: ' + factures[i].avance +  '<br>' + 'Reste: '+ (factures[i].net_payer - factures[i].avance ) +'</td>';
            }
            else{
              html_code += '<td> Net: '+factures[i].net_payer + '<br>' + 'Avance: ' + factures[i].avance + '+' + factures[i].avance2 + '<br>' + 'Reste: '+ (factures[i].net_payer - (factures[i].avance + factures[i].avance2 )) +'</td>';
            }
            html_code +="<td> <button class='valid-modal btn btn-success btn-sm' data-id='" + factures[i].N_facture + "' data-title='" + factures[i].N_client + "'><span class='ti-shopping-cart'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + factures[i].N_facture + "' data-title='" + factures[i].avance2 + "'><span class='ti-pencil'></span></button> </td>";
            html_code += '</tr>';
            html_item1 = '';
            html_item2 = '';
          }
          $(".listfact").html(html_code);
          }
         
      });
      if(c === 0 )
      {
        var html_code= '';
        var html_item1 = '';
        var html_item2 = '';
        for( var i=0 ;  i < len;  i++ ){
          if((factures[i].date_debut >= from) && (factures[i].date_fin <= to))
          {
            for(var j=0; j< len2; j++ ){
              if(items[j].N_facture_i === factures[i].N_facture){
                  html_item1 += items[j].article_i + '<br>';
                  html_item2 += items[j].quantity_i + '<br>';
                  }
              }
            html_code += '<tr id ="tri" class ="'+factures[i].N_facture+'">';
            html_code += '<td>'+factures[i].N_facture+'</td>';
            html_code += '<td>'+factures[i].N_client+'</td>';
            html_code += '<td>'+ html_item1 + '</td>';
            html_code += '<td>'+ html_item2 + '</td>';
            html_code += '<td>'+factures[i].date_debut+'</td>';
            html_code +="<td> <button class='valid-modal btn btn-success btn-sm' data-id='" + factures[i].N_facture + "' data-title='" + factures[i].N_client + "'><span class='ti-shopping-cart'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + factures[i].N_facture + "' data-title='" + factures[i].avance2 + "'><span class='ti-pencil'></span></button></td>";
            html_code += '</tr>';
            html_item1 = '';
            html_item2 = '';
          }
          }
          $(".listfact").html(html_code);
        }
      });
  });

</script>
        <!-- content-wrapper ends -->
@endsection

