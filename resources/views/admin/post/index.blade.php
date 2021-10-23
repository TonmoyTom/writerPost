@extends('layouts.admin')
@section('content')
<main>
    <div class="container " style="margin-top: 40px;" >
        <div class="page-header">
            <h3 class="page-title">
              User
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">DashBoard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
              </ol>
            </nav>
          </div>
        <table id="myTable" class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th  >Category</th>
                <th  >Tag</th>
                <th  >Post View</th>
                <th  >Author</th>
                <th  >Time/Date</th>
                <th  >Status</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
                @php $count=0; @endphp
                    @foreach($post as $item)
                    @php $count+=1 @endphp
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                      <td style="text-align: center;">
                      @if($item->status == 1)
                      <a style="" href="javascript:void(0)" class=" updatePoststatus" id="post-{{$item->id }}"
                         section_id ="{{$item->id}}" >Active</a>
                      @else
                      <a  href="javascript:void(0)" class=" updatePoststatus" id="post-{{$item->id }}"
                        section_id ="{{$item->id}}">Deactive</a>
                      @endif
                    </td>
                   
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-info" href="{{url('admin/post/edit/'.$item->slug.'/'.Crypt::encrypt($item->id))}}">Edit<a>
                        <a class="btn btn-warning" href="{{url('admin/post/view/'.$item->slug.'/'.Crypt::encrypt($item->id))}}">VIew<a>

                          <form action="{{url('admin/post/delete/'.$item->slug.'/'.Crypt::encrypt($item->id))}}" method="post">
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