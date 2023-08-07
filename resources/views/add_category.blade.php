@extends('layouts.app')

@section('content')
<div class="container">
<h2>Add Top Category</h2>
<form action="{{ route('store_topcategory') }}" method="POST">
    @method('post')
    @csrf
    <div class="mb-3">
        <label for="category_name">Category Name</label>
        <input type="text" name="name" id="" class="form-controller">
    </div>
    <div class="mb-3">
        <label for="slug">tag</label>
        <input type="text" name="tag" id="" class="form-controller">
    </div>
    <button type="submit">Add Top Category</button>
</form>
</div>
@endsection
