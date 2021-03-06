@extends('layouts.app')

@section('titel','Slide Show')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
   
@endpush
@section('content')

<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
              <a href="{{ route('slide.create') }} ">

                <button class="btn btn-facebook">
                    <i class="material-icons">
                        add_shopping_cart
                        </i>
                     
                  

                </button>
                    

              </a>
                
                <p class="card-category"> add Item for this table</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="item_table">
        <thead>
           
            <tr>
                <th>#</th>
                <th>Name</th>
                 
                <th>image</th>
                
                <th>Action</th>
    
            </tr>
        </thead>
        <tbody>
@foreach ($slide as $item)
     
                <tr>
                        <td>#</td>
                        <td>{{$item->name}}</td>
                        
                         
                       <td><img src="{{ asset('public/'.Storage::url($item->image))  }} " alt="" height="30px" width="30px"></td> 
                        
                        <td>
                            <a href="{{ route('slide.edit',$item->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                            <form id="delete-form-{{ $item->id }}" action="{{ route('slide.destroy',$item->id) }}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $item->id }}').submit();
                            }else {
                                event.preventDefault();
                                    }"><i class="material-icons">delete</i></button>
                        </td>
                
                    </tr>
                

        


@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@push('script')

 
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 
<script type="text/javascript">
    $(document).ready(function() {
    $('#item_table').DataTable();
} );
</script>   
@endpush
