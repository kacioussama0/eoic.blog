@extends('admin.layouts.app')
@section('title','أسئلة شائعة')



@section('content')



    @if (\Session::has('success'))
        <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('success') !!}</p>
        </div>
    @endif

    <a href="{{route('faq.create')}}" class="btn btn-lg btn-primary mb-4">إضافة سؤال جديد</a>


    <div class="table-responsive rounded">

        <table class="table table-striped table-primary border rounded">

            <thead>

                <tr>
                    <th>السؤال</th>
                    <th>الجواب</th>
                    <th>تم إنشاءه</th>
                    <th>تم تعديله</th>
                    <th>الإجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach($questions as $question)

                    <tr>

                        <td>{{$question->question}}</td>
                        <td>{{$question->answer}}</td>
                        <td>{{$question->created_at}}</td>
                        <td>{{$question->updated_at}}</td>
                        <td>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    الإجراءات
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{route('faq.edit',$question)}}"  class="dropdown-item">تعديل</a></li>
                                    <li>
                                        <form action="{{route('faq.destroy',$question)}}" method="POST" onsubmit="return confirm('هل أنت متأكد ?')" class="d-inline-block w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item">حذف</button>

                                        </form>
                                    </li>


                                </ul>
                            </div>
                        </td>

                    </tr>


                @endforeach

            </tbody>

        </table>



    </div>


@endsection
