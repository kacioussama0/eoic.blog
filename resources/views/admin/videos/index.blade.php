@extends('admin.layouts.app')
@section('title',__('forms.videos'))



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
        </div>
    @endif



    <a href="{{route('videos.create')}}" class="btn btn-lg btn-primary mb-4">{{__('forms.add-video')}}</a>




    @if(count($videos))
        <div class="table-responsive rounded">

            <table class="table table-striped table-warning border rounded">

                <thead>

                <tr>
                    <th>{{__('forms.title')}}</th>
                    <th>{{__('forms.share')}}</th>
                    <th>{{__('forms.created-at')}}</th>
                    <th>{{__('forms.edited-at')}}</th>
                    <th>{{__('forms.procedures')}}</th>
                </tr>

                </thead>

                <tbody>

                @foreach($videos as $video)

                    <tr>

                        <td>{{$video->title}}</td>
                        <td>{{$video->is_published ? 'Yes' : 'No'}}</td>
                        <td>{{$video -> created_at}}</td>
                        <td>{{$video -> updated_at}}</td>

                        <td>
                            <a href="{{route('videos.edit',$video)}}" class="btn btn-success">{{__('forms.edit')}}</a>
                            <form action="{{route('videos.destroy',$video)}}" method="POST" onsubmit="return confirm('{{__('forms.you-sure')}}')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('forms.delete')}}</button>
                            </form>
                        </td>

                    </tr>

                @endforeach
                </tbody>

            </table>


        </div>
    @else
        <div class="alert alert-danger py-5 text-center">
            <h1>{{__('forms.empty')}}</h1>
        </div>

        @endif


    </div>

@endsection
