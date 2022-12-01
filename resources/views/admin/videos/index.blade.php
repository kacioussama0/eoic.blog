@extends('admin.layouts.app')
@section('title','الفيديوهات')



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
        </div>
    @endif



    <a href="{{route('videos.create')}}" class="btn btn-lg btn-primary mb-4">إضافة فيديو جديد</a>


        <x-admin.forms.table :objects="$videos" :thead="['العنوان','منشور','تم إنشاءه','تم تعديله']" :tbody="['title','is_published','created_at','updated_at']" deletePath="videos.destroy"/>


    </div>

@endsection
