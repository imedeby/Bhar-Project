@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="content-wrapper">
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
                      <tbody>
                        @foreach($factures as $facture)
                        <tr class="fact{{$facture->N_facture}}">
                           <td>{{$facture->N_facture}}</td>
                           <td>{{$facture->N_client}}</td>
                           <td>@foreach($items as $item)
                              @if($facture->N_facture == $item->N_facture_i)
                                {{$item->article_i}} <br>
                              @endif
                           @endforeach</td>
                           <td>@foreach($items as $item)
                              @if($facture->N_facture == $item->N_facture_i)
                                {{$item->quantity_i}} <br>
                              @endif
                           @endforeach</td>
                           <td>{{$facture->date_debut}}</td>
                           <td>{{$facture->date_fin}}</td>
                           <td><button class="report btn btn-primary btn-sm" data-id="{{$facture->N_facture}}"  data-title="{{$facture->N_client}}" ><span class='ti-printer'></span></button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div><th>
              </div><th>

            </div>

          </div>
</div>
<script text="text/javascript">
     $(document).on('click', '.report', function() {
        var a = $(this).data('id');
        var url = '/admin/getPDF/' + a;
         window.open(url);
      });
</script>
@endsection
