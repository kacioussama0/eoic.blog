@extends('admin.layouts.app')
@section('title',__('forms.deleted-articles'))



@section('content')


    @include('admin.layouts.success')

@if(count($trashedPosts))
    <div class="table-responsive rounded">

        <table class="table table-striped table-waning border rounded">

            <thead>

                <tr>
                    <th>{{__('forms.title')}}</th>
                    <th>{{__('forms.category')}}</th>
                    <th>{{__('forms.picture')}}</th>
                    <th>{{__('forms.created-at')}}</th>
                    <th>{{__('forms.edited-at')}}</th>
                    <th>{{__('forms.published')}}</th>
                    <th>{{__('forms.procedures')}}</th>
                </tr>

            </thead>

            <tbody>

                @foreach($trashedPosts as $post)

                    <tr>

                        <td>{{$post->title}}</td>
                        <td>1</td>
                        <td>
                            <img src="{{!File::exists($post->image) ? asset('storage/' . $post->image) : asset('imgs/logo.svg') }}" alt="" style="width: 80px ; height: 80px ; object-fit: cover ; border-radius: 5Px">
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>{{($post->is_published == 'on') ? __('forms.yes') : __('forms.no')}}</td>
                        <td>





                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__('forms.procedures')}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{route('posts.restore',$post->id)}}"  class="dropdown-item">{{__('forms.restore')}}</a></li>
                                    <li> <a href="{{route('posts.delete',$post->id)}}"  class="dropdown-item">{{__('forms.destroy')}}</a></li>

                                </ul>
                            </div>


                        </td>

                    </tr>


                @endforeach

            </tbody>


        </table>

        <div class="d-flex justify-content-center">{{$trashedPosts -> links()}}</div>

    @else
        <div class="alert alert-danger py-5 text-center">
            <h1>{{__('forms.empty')}}</h1>
        </div>

    </div>

@endif
@endsection
