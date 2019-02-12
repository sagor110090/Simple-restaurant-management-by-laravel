@extends('layouts.app')

@section('content')


<div class="col-md-12 ">
    <div class="card ">
        <div class="card-header">
    
    
        </div>
    
        <div class="card-body ">
            <form action="{{ route('item.update',$items->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <input type="text" class="form-control" value="{{$items->name}}" name="name" placeholder="Enter Item name"  ><br>
                <select class="form-control" value="$items->category_id" name="category">
                @foreach ($categorys as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              

                </select>
               
                <input type="file" class="form-control" value="{{$items->image}}" name="image" placeholder="Enter image"  ><br>
                <input type="number" class="form-control" value="{{$items->price}}" name="Price" placeholder="Enter price"  ><br>
                <textarea name="description"  value="" placeholder="Enter Description" class="form-control" id="" cols="30" rows="5">{{$items->description}}</textarea><br>
                <input class="btn btn-success" type="submit" value="submit">
                 
            </form>
    
        </div>
    
    </div>

</div>

   


@endsection