@extends('layouts.adminLayout.admin_design')
@section('content')

      
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Settings</h4>
                  @if(Session::has('flash_message_error')) 
                    <div class="alert alert-danger alert-block">
	                    <button type="button" class="close" data-dismiss="alert">×</button>	
                      {!! session('flash_message_error') !!}
                    </div>
                  @endif  
                  @if(Session::has('flash_message_success')) 
                    <div class="alert alert-success alert-block">
	                    <button type="button" class="close" data-dismiss="alert">×</button>	
                      {!! session('flash_message_success') !!}
                    </div>
                  @endif
                  <form class="forms-sample" method="post" action="{{ url('/admin/update-pwd') }}"> {{ csrf_field() }}
                    <div class="form-group">
                      <label for="currPasswd">{{ __('Current Password') }}</label>
                      <input type="password" class="form-control @error('currPasswd') is-invalid @enderror" id="currPasswd" name="currPasswd" placeholder="Password" required autocomplete="new-password">
                      <p id="chkpwd" class='text-danger'></p>
                    </div>
                    @error('currPasswd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="form-group">
                      <label for="newPasswd">{{ __('New Password') }}</label>
                      <input type="password" class="form-control @error('newPasswd') is-invalid @enderror" id="newPasswd" name="newPasswd" placeholder="Password" required autocomplete="new-password">
                    </div>
                    @error('newPasswd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="form-group">
                      <label for="confPasswd">{{ __('Confirm Password') }}</label>
                      <input type="password" class="form-control" id="confPasswd" name="confPasswd" placeholder="Password" required autocomplete="new-password">
                    </div>
                   
                    <button type="submit" class="btn btn-primary mr-2" >Update Password</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

@endsection