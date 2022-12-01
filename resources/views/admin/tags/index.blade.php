@extends('admin.layouts.app')
@section('title','الوسوم')



@section('content')


    @include('admin.layouts.success')
    @include('admin.layouts.failed')


    <form action="{{route('tags.store')}}" method="POST" class="mb-5">

          @csrf
          <x-admin.forms.input name="name" title="إسم الوسم" type="text"  value="{{old('name')}}"/>
          <button type="submit" class="btn btn-warning">إضافة وسم جديد</button>
    </form>

    <x-admin.forms.table :objects="$tags" :thead="['إسم الوسم','تم إنشاءه','تم تعديله']" :tbody="['name','created_at','updated_at']" deletePath="tags.destroy"/>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>


@endsection
