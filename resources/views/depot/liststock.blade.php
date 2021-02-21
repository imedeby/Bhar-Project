@extends('layouts.depotLayout.depot_design')
@section('content')
<div class="content-wrapper">
<div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
                <div class="card-body">
                  <h4 class="card-title" align = "center">Stock list</h4>
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
                          <th>Article</th>
                          <th>Qté</th>
                        </tr>
                      </thead>
                      <tbody class = "liststock">

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
    $.getJSON("/depot/stocklist", function(data){
      var factures = jQuery.parseJSON(JSON.stringify(data.factures));
      var len = factures.length;
      var stocks = jQuery.parseJSON(JSON.stringify(data.stocks));
      var len2 = stocks.length;

      var items = jQuery.parseJSON(JSON.stringify(data.items));
      var len3 = items.length;
      var c = 0;
      $('#search').click(function () {

        c=1;
          var html_code= '';
          var html_item1 = '';
          var html_item2 = '';
          for( var i=0 ;  i < len2;  i++ ){
            var b = stocks[i].quantity;
            for(var j=0; j< len; j++ ){
                if((factures[j].date_debut >= $('#start_date').val()) && (factures[j].date_fin <= $('#end_date').val()) ){
                    for(var k=0; k<len3; k++){
                        if(items[k].N_facture_i === factures[j].N_facture){
                            if(items[k].article_i === stocks[i].article){
                                b -= items[k].quantity_i;
                            }
                        }

                    }
                }
            }
            html_code += '<tr id ="tri" class ="stock'+stocks[i].id+'">';
            html_code += '<td>'+stocks[i].article+'</td>';
            html_code += '<td>'+b+'</td>';
            html_code += '</tr>';

            $(".stock"+stocks[i].id).remove();
            $(".liststock").html(html_code);
          }
      });
      if(c === 0 )
      {
        var html_code= '';
        for( var i=0 ;  i < len2;  i++ ){
            html_code += '<tr id ="tri" class ="stock'+stocks[i].id+'">';
            html_code += '<td>'+stocks[i].article+'</td>';
            html_code += '<td>'+stocks[i].quantity+'</td>';
            html_code += '</tr>';
        }
        $(".liststock").html(html_code);
        }
    });

});
</script>
@endsection
