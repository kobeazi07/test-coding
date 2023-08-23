@extends('layouts')

@section('konten')

<div class="row mt-5">
<div class="">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Name</label>
                    <input class="form-control" name="name" id="name" type="text"  aria-label="default input example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Code</label>
                    <input class="form-control" name="code" id="code" type="text"  aria-label="default input example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Continent</label>
                    <input class="form-control" name="continent" id="continent" type="text"  aria-label="default input example">
                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-primary tombol-simpan">Save changes</button>
                </div>
            </form>
      </div>
</div>
<div class="row ">
<div class="table-responsive pt-3">
    <table class="table table-bordered display" id="table_id">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Code</th>
          <th scope="col">Continent</th>
        </tr>
      </thead>
   
    </table>
    </div>
</div>

<script>
  $(document).ready(function () {
    $('#table_id').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        "url": 'http://127.0.0.1:8000/api/country',
      "type": 'GET',
      "dataType": 'json',
      "dataSrc": 'data'
      },
      columns: [
        {
          data:'DT_RowIndex',
          name:'DT_RowIndex',
          orederable:false,
          searchable:false
        },
        {
          data: 'name',
          name: 'Name'
        },
        {
          data: 'code',
          name: 'Code'
        },
        {
          data: 'continent',
          name: 'Continent'
        },
     
      ]
    });
  });

  $.ajaxSetup({
    headers:{
      'C-CSRF-TOKEN':$('meta[name="csrd-token"]').attr('content')
    }
  });
  $('.tombol-simpan').click(function(){
         
         //  console.log(name + '-' + code + '-' + continent);
 
         $.ajax(
           {
             url:'http://127.0.0.1:8000/api/addcountry',
             type:'POST',
             data:{
               name: $('#name').val(),
               code: $('#code').val(),
               continent: $('#continent').val()
             },
               success:function(response){
               
                 $('#table_id').DataTable().ajax.reload();
               }
 
           }
         );
 
     });
  $('body').on('click','.tombol-tambah', function(e){
    e.preventDefault(); 
    $('#exampleModal').modal('show');

    
  });

</script>



@endsection