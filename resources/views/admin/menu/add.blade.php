@extends('admin.main')

@section('header')
    {{-- <script src="/ckeitor/ckeditor.js"></script> --}}
@endsection
@section('content')
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div clas="form-group">
                <label for="menu">Name Category: </label>
                <input type="text" name="name" class="form-control" placeholder="Enter name category">
            </div>

            <div clas="form-group">
                <label for="menu">Parent Category: </label>
                <select class="form-control" name="parent_id">
                    <option value="0"> Parent Category </option>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                </select>
            </div>

            <div clas="form-group">
                <label for="menu">Desciption: </label>
                <textarea name="description" class="form-control"> </textarea>
            </div>

            <div clas="form-group">
                <label for="menu">Content: </label>
                <textarea name="content" id="content" class="form-control"> </textarea>
            </div>

            <div>
                <label> Active</label>
            <div class="custom-control custom-radio">

                <input class="custom-control-input" value="1" type="radio" id="active" name="active">
                <label for="active" class="custom-control-label">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="0" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">No</label>
            </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
    </form>
@endsection

{{-- @section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection --}}
