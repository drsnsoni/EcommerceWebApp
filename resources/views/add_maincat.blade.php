@extends('layouts.app')

@section('content')
<div class="container">
<h2>Add Main Category</h2>
<form action="{{ route('store_maincategory') }}" method="POST">
    @method('post')
    @csrf
    <div class="mb-3">
    <label for="cars">Top Category:</label>
    <select name="topcat_id" id="top_category">
        @foreach (get_top_categories() as $top)
      <option value="{{ $top->id }}">{{ $top->name }}</option>
      @endforeach
    </select>
    </div>

    <div class="mb-3">
        <label for="category_name">Main Category Name</label>
        <input type="text" name="name" id="" class="form-controller">
    </div>

    <div class="mb-3">
        <label for="slug">Tag</label>
        <input type="text" name="tag" id="" class="form-controller">
    </div>
    <button type="submit">Add Main Category</button>
</form>
</div>
@endsection
