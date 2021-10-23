@extends('layouts.admin')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Banner Uplaod</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('banners.allstore')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Main Title</label>
                                    <input type="text" class="form-control" name="main_title" style="color: #000;">
                  
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;">
                                  </div>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">2nd Title</label>
                                    <input type="text" class="form-control" name="title_2nd" style="color: #000;">
                  
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">3rd Title</label>
                                    <input type="text" class="form-control" name="title_3rd" style="color: #000;">
                  
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">4th Title</label>
                                    <input type="text" class="form-control" name="title_4th " style="color: #000;">
                                    <p style="color:red">Optional</p>
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">5th Title</label>
                                    <input type="text" class="form-control" name="title_5th" style="color: #000;">
                                    <p style="color:red">Optional</p>
                                  </div>
                                 
                                  
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">Images</label>
                                    <input type="file" class="dropify" name="imagename" data-max-height="1000" />
                                  </div>


                                  <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Social</label>
                                      <input type="text" class="form-control" name="social1" placeholder="EX:Facebook" aria-label="EX:facebook">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                      <input type="text" class="form-control" name="link1" placeholder="EX:www.facebook.com" aria-label="Last name">
                                      <p style="color:red">Optional</p>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">
                                      <label for="recipient-name" class="col-form-label" style="color: #000;">Social</label>
                                        <input type="text" class="form-control" name="social2" placeholder="EX:Twitter" aria-label="EX:facebook">
                                      </div>
                                      <div class="col-md-8">
                                           <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                        <input type="text" class="form-control"name="link2"  placeholder="EX:www.twitter.com" aria-label="Last name">
                                        <p style="color:red">Optional</p>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-md-4">
                                          <label for="recipient-name" class="col-form-label" style="color: #000;">Social</label>
                                            <input type="text" class="form-control" name="social3" placeholder="EX:Instragam" aria-label="EX:facebook">
                                          </div>
                                          <div class="col-md-8">
                                               <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                            <input type="text" class="form-control"name="link3"  placeholder="EX:www.instragam.com" aria-label="Last name">
                                            <p style="color:red">Optional</p>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="row">
                                              <div class="col-md-4">
                                              <label for="recipient-name" class="col-form-label" style="color: #000;">Social</label>
                                                <input type="text" class="form-control" name="social4" placeholder="EX:Github" aria-label="EX:facebook">
                                                <p style="color:red">Optional</p>
                                              </div>
                                              <div class="col-md-8">
                                                   <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                                <input type="text" class="form-control"name="link4" placeholder="EX:www.github.com" aria-label="Last name">
                                                <p style="color:red">Optional</p>
                                              </div>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label " style="color: #000;">PDF Upload</label>
                                      <input type="file" class="dropify" name="files" data-max-height="1000" />
                                    </div>
                                   
                                  

                              <div class="">
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