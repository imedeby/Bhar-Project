@extends('layouts.depotLayout.depot_design')
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
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($stocks as $stock)
                        <tr class="stock{{$stock->id}}">
                          <td>{{ $stock->article }}</td>
                          <td>{{ $stock->quantity }}</td>
                          <td>{{ $stock->casse }}</td>
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
 </div>

@endsection