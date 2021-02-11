@extends('layouts.depotLayout.depot_design')
@section('content')
<div class="content-wrapper">
<div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">  
                <div class="card-body">
                  <h4 class="card-title" align = "center">Depot</h4>
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
                          <th>Date de début</th>
                          <th>Date de fin</th>
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
<script type="text/javascript">
  
  $(document).ready(function(){
    $.getJSON("/bhar/public/depot/depinit", function(data){
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
            var id = factures[i].N_facture;
            if((factures[i].date_debut >= $('#start_date').val()) && (factures[i].date_fin <= $('#end_date').val()) && (factures[i].status_a === 0) )
            {
              for(var j=0; j< len2; j++ ){
                if(items[j].N_facture_i === factures[i].N_facture){
                  html_item1 += items[j].article_i + '<br>';
                  html_item2 += items[j].quantity_i + '<br>';
                  }
              }
            html_code += '<tr id ="tri" class ="'+factures[i].N_facture+'">';
            html_code += '<td id = "fact">'+factures[i].N_facture+'</td>';
            html_code += '<td>'+factures[i].N_client+'</td>';
            html_code += '<td>'+ html_item1 + '</td>';
            html_code += '<td>'+ html_item2 + '</td>';
            html_code += '<td>'+factures[i].date_debut+'</td>';
            html_code += '<td>'+factures[i].date_fin+'</td>';
            html_code +="<td> <button class='valid-modal btn btn-success btn-sm' data-id='" + factures[i].N_facture + "' data-title='" + factures[i].N_client + "'><span class='ti-check'></span></button><br><button class='report btn btn-primary btn-sm' data-id='" + factures[i].N_facture + "' data-title='" + factures[i].N_client + "'><span class='ti-printer'></span></button> </td>";
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
          if((factures[i].date_debut >= from) && (factures[i].date_fin <= to) && (factures[i].status_a === 0) )
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
            html_code += '<td>'+factures[i].date_fin+'</td>';
            html_code +="<td> <button class='valid-modal btn btn-success btn-sm' data-id='" + factures[i].N_facture + "' data-title='" + factures[i].N_client + "'><span class='ti-check'></span></button><br><button class='report btn btn-primary btn-sm' data-id='" + factures[i].N_facture + "' data-title='" + factures[i].N_client + "'><span class='ti-printer'></span></button></td>";
            html_code += '</tr>';
            html_item1 = '';
            html_item2 = '';
          }
          }
          $(".listfact").html(html_code);
        }
      
      });
  
  });
    $(document).on('click', '.report', function() {
        var a = $(this).data('id');
        var url = '/bhar/public/depot/getPDF/' + a;
         window.open(url);
      });

</script>
        <!-- content-wrapper ends -->
@endsection