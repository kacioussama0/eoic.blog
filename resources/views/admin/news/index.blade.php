@extends('admin.layouts.app')
@section('title','أخر الأخبار')



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
        </div>
    @endif



    <a href="{{route('news.create')}}" class="btn btn-lg btn-primary mb-4">إضافة خبر جديد</a>


        <x-admin.forms.table :objects="$news" :thead="['الخبر','منشور','تم إنشاءه','تم تعديله']" :tbody="['title','is_published','created_at','updated_at']" deletePath="news.destroy"/>


    </div>

@endsection
