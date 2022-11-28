@extends('admin.layouts.app')
@section('title','الإحصائيات')
@section('icon','bi bi-speedometer2')



@section('content')

  <div class="row text-center">
      @if(Auth::user()->hasRole('owner'))

      <div class="col-md-3">
          <div class="card bg-primary text-light">
              <h3 class="card-header"><a href="{{route('users.index')}}" class="text-light">الأعضاء</a></h3>
              <div class="card-body">
                  <h3 class="display-1">{{count($users)}}</h3>
              </div>
          </div>
      </div>

      @endif

      <div class="col-md-3">
          <div class="card  bg-warning text-light">
              <h3 class="card-header">
                  <a href="{{route('tags.index')}}" class="text-light">الوسوم</a>
              </h3>
              <div class="card-body">
                  <h3 class="display-1">{{count($tags)}}</h3>
              </div>
          </div>
      </div>

      <div class="col-md-3">
          <div class="card  bg-secondary text-light">
              <h3 class="card-header">
                  <a href="{{route('posts.index')}}" class="text-light">المقالات</a>
              </h3>
              <div class="card-body">
                  <h3 class="display-1">{{count($posts)}}
                  </h3>
              </div>
          </div>
      </div>

      <div class="col-md-3">
          <div class="card  bg-success text-light">
              <h3 class="card-header">
                  <a href="{{route('categories.index')}}" class="text-light">التصنيفات</a>
              </h3>
              <div class="card-body">
                  <h3 class="display-1">{{count($categories)}}</h3>
              </div>
          </div>
      </div>

      <div class="col-md-3">
          <div class="card  bg-success text-light">
              <h3 class="card-header">
                  <a href="{{route('news.index')}}" class="text-light">أخر الأخبار</a>
              </h3>
              <div class="card-body">
                  <h3 class="display-1">{{count($latest_news)}}</h3>
              </div>
          </div>
      </div>


      <div class="col-md-3">
          <div class="card  bg-success text-light">
              <h3 class="card-header">
                  <a href="{{route('messages.index')}}" class="text-light">الرسائل</a>
              </h3>
              <div class="card-body">
                  <h3 class="display-1">{{count($messages)}}</h3>
              </div>
          </div>
      </div>

  </div>

@endsection
