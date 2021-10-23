@extends('layouts.admin')

@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000;">Create User</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{url('admin/user/edit/'.Crypt::encrypt($users->id))}}" method="POST" >
                                    @csrf
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Name</label>
                                    <input type="text" class="form-control" name="name" style="color: #000;" value="{{$users->name}}">
                  
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">Eamil</label>
                                    <input type="email" class="form-control" name="email" value="{{$users->email}}">
                  
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Role</label>
                                    <select class="form-control" name="is_admin">
                                        <option>Select</option>
                                        <option value="0"  {{($users->is_admin == '0') ? 'Selected' : ''}}>User</option>
                                        <option value="1"  {{($users->is_admin == '1') ? 'Selected' : ''}}>Admin</option>
                                      </select>
                                    </div>
                                  
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Password</label>
                                    <input type="password" class="form-control" name="password" style="color: #000;">
                  
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Confirm Password</label>
                                    <input type="password" class="form-control" name="cpassword" style="color: #000;">
                  
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>

                              <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection