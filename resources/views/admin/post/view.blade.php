@extends('layouts.admin')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Post View</h4>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Title</label>
                                    <input type="text" class="form-control" name="title" style="color: #000;" value="{{$psots->single_words}}">
                  
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;" value="{{$psots->single_words}}">
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
                                        <textarea id="summernote" name="des1" col="60" row4="10"  style="border-color: aqua; color:#000;" >
                                            {{$psots->des1}}
                                        </textarea><br> 
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name2" class="col-form-label">Poem</label>
                                        <textarea id="summernote1" name="poem" col="60" row4="10"  style="border-color: aqua; color:#000;" >
                                            {{$psots->poem}}
                                        </textarea><br> 
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name3" class="col-form-label">Description</label>
                                        <textarea id="summernote2" name="des2" col="60" row4="10"  style="border-color: aqua; color:#000;" >
                                            {{$posts->des2}}
                                        </textarea><br> 
                                        
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
                                      <input type="text" class="form-control" name="socail1" placeholder="EX:Facebook" value="{{$posts->socail1}}" aria-label="EX:facebook">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                      <input type="text" class="form-control" name="link1" placeholder="EX:www.facebook.com" value="{{$posts->link1}}" aria-label="Last name">
                                      <p style="color:red">Optional</p>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4">
                                      <label for="recipient-name" class="col-form-label" style="color: #000;">Social</label>
                                        <input type="text" class="form-control" name="socail2" placeholder="EX:Twitter"  value="{{$posts->socail2}}" aria-label="EX:facebook">
                                      </div>
                                      <div class="col-md-8">
                                           <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                        <input type="text" class="form-control"name="link2"  placeholder="EX:www.twitter.com" value="{{$posts->link2}}" aria-label="Last name">
                                        <p style="color:red">Optional</p>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                          <div class="col-md-4">
                                          <label for="recipient-name" class="col-form-label" style="color: #000;">Social</label>
                                            <input type="text" class="form-control" name="socail3" placeholder="EX:Instragam" value="{{$posts->socail3}}" aria-label="EX:facebook">
                                          </div>
                                          <div class="col-md-8">
                                               <label for="recipient-name" class="col-form-label" style="color: #000;">Link</label>
                                            <input type="text" class="form-control"name="link3"  placeholder="EX:www.instragam.com" value="{{$posts->link3}}" aria-label="Last name">
                                            <p style="color:red">Optional</p>
                                          </div>
                                        </div>
                                    </div>
                                   

                           
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection