@extends('layouts.app')

@section('content')


<div class="col-md-12 ">
    <div class="card ">
        <div class="card-header">
    
    
        </div>
    
        <div class="card-body ">
            <form action="{{ route('item.store' ) }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <input type="text" class="form-control" name="name" placeholder="Enter Item name"  ><br>
                <select class="form-control" name="category">
                @foreach ($categorys as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              

                </select>
               
                <input type="file" class="form-control" name="image" placeholder="Enter image"  ><br>
                <input type="number" class="form-control" name="Price" placeholder="Enter price"  ><br>
                <textarea name="description" placeholder="Enter Description" class="form-control" id="" cols="30" rows="5"></textarea><br>
                <input class="btn btn-success" type="submit" value="submit">
                 
            </form>
    
        </div>
    
    </div>

</div>

   


@endsection