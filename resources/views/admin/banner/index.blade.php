@extends('layouts.admin')
@section('content')
<main>
    <div class="container " style="margin-top: 40px;" >
        <div class="page-header">
            <h3 class="page-title">
              Banner
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Banner</li>
              </ol>
            </nav>
          </div>

          <a t class="btn btn-primary" href="{{route('banners.create')}}" style="margin-bottom: 20px;">
            Add Banner
          </a>
        <table id="myTable" class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th  >Main Title</th>
                <th  >Title</th>
                <th  >Slug</th>
                <th  >Image</th>
                <th  >Active</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
                @php $count=0; @endphp
                    @foreach($banners as $item)
                    @php $count+=1 @endphp
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$item->main_title}}</td>
                    <td>{{$item->title_2nd}}</td>
                    <td>{{$item->slug}}</td>
                  
                    <td><a class="venobox" data-gall="gallery01" title="{{$item->imagename}}" href="{{asset('Image/Banner/'.$item->imagename)}}">{{$item->imagename}}</a></td>
                   
                    <td style="text-align: center;">
                      @if($item->status == 1)
                      <a style="" href="javascript:void(0)" class=" updateBannerstatus" id="banner-{{$item->id }}"
                         section_id ="{{$item->id}}" >Active</a>
                      @else
                      <a  href="javascript:void(0)" class=" updateBannerstatus" id="banner-{{$item->id }}"
                        section_id ="{{$item->id}}">Deactive</a>
                      @endif
                    </td>
                    <td>

                      <div class="btn-group">
                        <a class="btn btn-warning" href="{{url('admin/banners/view/'.Crypt::encrypt($item->id))}}">View<a>
                        <a class="btn btn-info" href="{{url('admin/banners/edit/'.Crypt::encrypt($item->id))}}">Edit<a>

                          <form action="{{url('admin/banners/delete/'.Crypt::encrypt($item->id))}}" method="post">
                            @method('delete')   
                            @csrf
                            <button type="submit"  data-name="" class="btn btn-danger delete-confirm delete-confirm"> 
                              <i class="fas fa-trash-alt btn-icon-prepend"></i>
                               Delete
                            </button>   
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
             
            
            </tbody>
          </table>
    </div>
  </main>
@endsection