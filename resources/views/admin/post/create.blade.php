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
                                <form action="{{route('posts.allstore')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf

                                 {{-- <input type="hidden" value="{{Auth::id()}}">    --}}

                                
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Title</label>
                                    <input type="text" class="form-control" name="title" style="color: #000;">
                  
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;">
                                  </div>

                                  <div class="form-group">
                                    <label for="role" style="color: #000;">Category</label>
                                    <select class="custom-select js-example-basic-multiple" id="inputGroupSelect01" name="category_id[]" multiple >
                                        <option style="color: #000;" >Choose...</option>
                                        @foreach ($category as $item)
                                        <option style="color: #000;" value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                   </div>


                                   <div class="form-group">
                                        <label for="recipient-name1" class="col-form-label">Description</label>
                                        <textarea id="summernote" name="des1" col="60" row4="10"  style="border-color: aqua; color:#000;" ></textarea><br> 
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name2" class="col-form-label">Poem</label>
                                        <textarea id="summernote1" name="poem" col="60" row4="10"  style="border-color: aqua; color:#000;" ></textarea><br> 
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name3" class="col-form-label">Description</label>
                                        <textarea id="summernote2" name="des2" col="60" row4="10"  style="border-color: aqua; color:#000;" ></textarea><br> 
                                        
                                    </div>

                                   <div class="form-group">
                                    <label for="role" style="color: #000;">Tag</label>
                                    <select class="custom-select js-example-basic-multiple" id="inputGroupSelect01" name="tag_id[]" multiple >
                                        <option style="color: #000;" >Choose...</option>
                                        @foreach ($tag as $item)
                                        <option style="color: #000;" value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                   </div>

                                  <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Social</label>
                                      <input type="text" class="form-control" name="socail1" placeholder="EX:Facebook" aria-label="EX:facebook">
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
                                        <input type="text" class="form-control" name="socail2" placeholder="EX:Twitter" aria-label="EX:facebook">
                                      </div>
                                      <div class="col-md-8">
                                           <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                        <input type="text" class="form-control"name="socail2"  placeholder="EX:www.twitter.com" aria-label="Last name">
                                        <p style="color:red">Optional</p>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-md-4">
                                          <label for="recipient-name" class="col-form-label" style="color: #000;">Social</label>
                                            <input type="text" class="form-control" name="socail3" placeholder="EX:Instragam" aria-label="EX:facebook">
                                          </div>
                                          <div class="col-md-8">
                                               <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                            <input type="text" class="form-control"name="link3"  placeholder="EX:www.instragam.com" aria-label="Last name">
                                            <p style="color:red">Optional</p>
                                          </div>
                                        </div>
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