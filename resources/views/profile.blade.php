@extends('layouts.modul')

@section('content')
<section class="content">

    <div class="row">
        <div class="col-md-3">

            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if ($data->user->pengguna_foto)
                        <img src="<?php echo asset('/storage/uploads/images/user/' . $data->user->pengguna_foto); ?>" class="profile-user-img img-responsive img-circle" alt="<?php echo $data->user->name; ?>">
                    @else
                        <img class="profile-user-img img-responsive img-circle" src="https://pondokindahmall.co.id/assets/img/default.png" alt="<?php echo $data->user->name; ?>">
                    @endif
                    <h3 class="profile-username text-center">{{ $data->user->name }}</h3>
                    <p class="text-muted text-center">{{ $data->user->pengguna_kategori->pengguna_kategori_nama }}</p>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#account" data-toggle="tab">Account</a></li>
                    <li><a href="#security" data-toggle="tab">Security</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="account">
                        <form class="form-horizontal" id="form-account">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
            
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $data->user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
            
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $data->user->username }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="security">
                        <form class="form-horizontal" id="form-security">
                            <div class="form-group">
                                <label for="current_password" class="col-sm-2 control-label">Current Password</label>
            
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="current_password" required name="current_password" placeholder="Current Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password" class="col-sm-2 control-label">New Password</label>
            
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="new_password" required name="new_password" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password_confirm" class="col-sm-2 control-label">Confirm New Password</label>
            
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="new_password_confirm" required name="new_password_confirm" placeholder="Confirm New Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </section>
@endsection

@push('scripts')
<script>
    var action_account = '{{ route("profile.update_account") }}';
    var action_security = '{{ route("profile.update_security") }}';
</script>
<script>
    function refresh(result) {
        alertSuccess(result.message);
    }

    $(document).ready(function() {
        $('#form-account').validate({
            rules : {
                
            },
            submitHandler:function (form) {
                var reqData = new FormData(form);

                ajaxData(action_account, reqData, refresh, true);
            }
        });
        
        $('#form-security').validate({
            rules : {
                
            },
            submitHandler:function (form) {
                var reqData = new FormData(form);

                ajaxData(action_security, reqData, refresh, true);
            }
        });
    });
</script>
@endpush
