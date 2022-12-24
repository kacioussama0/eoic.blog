@extends('admin.layouts.app')

@section('title',__('forms.articles'))



@section('content')

    <span class="d-flex justify-content-between flex-sm-row flex-column">

            <a href="{{route('posts.create')}}" class="btn btn-lg btn-primary mb-4">{{__('forms.add-articles')}}</a>
            <a href="{{url('admin/junk')}}" class="btn btn-lg btn-danger mb-4">{{__('forms.deleted-articles')}}</a>

    </span>

    @include('admin.layouts.success')


    <div class="card">
                        <div class="table-responsive rounded align-middle text-center">

                            <table class="table table-striped table-waning border rounded align-middle">

                                <thead >

                                <tr class="sticky-top">
                                    <th>{{__('forms.title')}}</th>
                                    <th>{{__('forms.category')}}</th>
                                    <th>
                                        <i class="fi fi-gb"></i>
                                    </th>

                                    <th>
                                        <i class="fi fi-fr"></i>
                                    </th>

                                    <th>{{__('forms.picture')}}</th>
                                    <th>{{__('forms.created-at')}}</th>
                                    <th>{{__('forms.edited-at')}}</th>
                                    <th>{{__('forms.published')}}</th>
                                    <th>{{__('forms.procedures')}}</th>
                                </tr>

                                </thead>

                                <tbody>

                                @foreach($posts as $post)

                                    <tr>

                                        <td>{{$post->title}}</td>

                                        <td>
                                            <span class="badge bg-secondary p-2" style="font-size: 16px">{{$post->category->name}}</span>
                                        </td>

                                        <td>
                                            {{$post->title_en ? __('forms.yes') : __('forms.no')}}

                                        </td>

                                        <td>
                                            {{$post->title_fr ? __('forms.yes') : __('forms.no')}}


                                        </td>

                                        <td>
                                            <img src="{{File::exists(public_path('storage/' . $post->image)) ? asset('storage/' . $post->image) : asset('assets/imgs/logo.svg') }}" alt="" style="width: 80px ; height: 80px ; object-fit: cover ; border-radius: 5Px">
                                        </td>



                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->updated_at}}</td>
                                        <td>{{($post->is_published == 'on') ? __('forms.yes') : __('forms.no')}}</td>
                                        <td>





                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{__('forms.procedures')}}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{route('posts.show',$post)}}" class="dropdown-item">{{__('forms.show-case')}}</a></li>
                                                    <li> <a href="{{route('posts.edit',$post)}}"  class="dropdown-item">{{__('forms.edit')}}</a></li>

                                                    <li>
                                                        <form action="{{route('posts.destroy',$post)}}" method="POST" onsubmit="return confirm('{{__('forms.you-sure')}}')" class="d-inline-block w-100">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item">{{__('forms.delete')}}</button>

                                                        </form>
                                                    </li>
                                                </ul>

                                            </div>


                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>

                            </table>

                            <div class="d-flex justify-content-center">{{$posts -> links()}}</div>
                        </div>







@endsection


