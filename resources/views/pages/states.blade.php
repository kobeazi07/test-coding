@extends('layouts')

@section('konten')

<div class="row mt-5">
<div class="">
            <form action="" mthod="post">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Name</label>
                    <input class="form-control" name="name" id="name" type="text"  aria-label="default input example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Country_id</label>
                    <div class="input-group mb-3">
                      <label class="input-group-text" for="inputGroupSelect01">Options</label>
                      <select class="form-select" name="country_id" id="country_id">
                        <option selected>Choose...</option>
                        @foreach($cid as $cid)
                        <option value="{{$cid->id}}">{{$cid->name}}</option>
                      @endforeach
                      </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Code</label>
                    <input class="form-control" name="code" id="code" type="text"  aria-label="default input example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Kepulauan_code</label>
                    <input class="form-control" name="kepulauan_code" id="kepulauan_code" type="text"  aria-label="default input example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">bagian</label>
                    <input class="form-control" name="bagian" id="bagian" type="text"  aria-label="default input example">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary tombol-simpan2">Save changes</button>
                </div>
            </form>
      </div>
</div>
<div class="row ">
<div class="table-responsive pt-3">
    <table class="table table-bordered display" id="table_id2">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Country_id</th>
          <th scope="col">Code</th>
          <th scope="col">Kepulauan_code</th>
          <th scope="col">bagian</th>
          
        </tr>
      </thead>
   
    </table>
    </div>
</div>


<!-- modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
    </div>
  </div>
</div> -->
<!-- akhir modal -->
<script>
  $(document).ready(function () {
    $('#table_id2').DataTable({
      processing: true,
      serverside: true,
      ajax: "{{ url('state_state') }}",
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
          data: 'country_id',
          name: 'country_id'
        },
        {
          data: 'code',
          name: 'Code'
        },
        {
          data: 'kepulauan_code',
          name: 'Kepulauan_codet'
        },
        {
          data: 'bagian',
          name: 'Bagian'
        }
      ]
    });
  });

  $.ajaxSetup({
    headers:{
      'C-CSRF-TOKEN':$('meta[name="csrd-token"]').attr('content')
    }
  });
  $('.tombol-simpan2').click(function(){
         
         //  console.log(name + '-' + code + '-' + continent);
    

         $.ajax(
           {
             url:'http://127.0.0.1:8000/api/addstate',
             type:'POST',
             data:{
               name: $('#name').val(),
               country_id: $('#country_id').val(),
               code: $('#code').val(),
               kepulauan_code: $('#kepulauan_code').val(),
               bagian: $('#bagian').val()
             },
               success:function(response){
               
                 $('#table_id2').DataTable().ajax.reload();
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