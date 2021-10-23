$(document).ready(function(){
   

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    

    $('.dropify').dropify();

    $('.venobox').venobox(); 

    $('#myTable').DataTable();
    

    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['#000']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      
    $('#summernote1').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['#000']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      
    $('#summernote2').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['#000']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      $(".updateBannerstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/bannerupdatestatus',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#banner-"+section_id).html("<a href='javascript:void(0)' class=' updateBannerstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#banner-"+section_id).html("<a href='javascript:void(0)' class=' updateBannerstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

  

    $(".updateCategorystatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/categories',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#category-"+section_id).html("<a href='javascript:void(0)' class=' updateCategorystatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#category-"+section_id).html("<a href='javascript:void(0)' class=' updateCategorystatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatetagstatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/tags',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#tag-"+section_id).html("<a href='javascript:void(0)' class=' updatetagstatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#tag-"+section_id).html("<a href='javascript:void(0)' class=' updatetagstatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    $(".updatePoststatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
     //    alert(status);
     //    alert(section_id);
        $.ajax({
            type : 'post',
            url : '/admin/tags',
            data : {status:status, section_id:section_id},
            success:function(resp){
             if(resp['status'] == 0){
                 $("#post-"+section_id).html("<a href='javascript:void(0)' class=' updatePoststatus'>Deactive</a>");
             }else if(resp['status'] == 1){
                 $("#post-"+section_id).html("<a href='javascript:void(0)' class=' updatePoststatus'>Active</a>"); 
             }
            },error:function(resp){
             alert("error");
            }
        })
 
    });

    var table = $('#myTable').DataTable();

    table.on('click', '.edit', function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('chlid')){
            $tr = $tr.prev('.parent');

        }

        var data = table.row($tr).data();
        // console.log(data);

        $('#name').val(data[1]);
        $('#slug').val(data[2]);
        $('#editForm').attr('action', '/admin/categories/edit/'+data[0]);
        $('#editCategory').modal('show');
    });


    var table = $('#myTable').DataTable();

    table.on('click', '.edittag', function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('chlid')){
            $tr = $tr.prev('.parent');

        }

        var data = table.row($tr).data();
        // console.log(data);

        $('#name').val(data[1]);
        $('#slug').val(data[2]);
        $('#editTagForm').attr('action', '/admin/tags/edit/'+data[0]);
        $('#edittag').modal('show');
    });

    

    


    


});

