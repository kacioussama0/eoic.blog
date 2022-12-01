@extends('admin.layouts.app')
@section('title','التصنيفات')



@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.failed')

    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#ar-tab" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><span class="fi fi-sa"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#en-tab" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><span class="fi fi-gb"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#fr-tab" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><span class="fi fi-fr"></span></button>
                </li>
                <li class="nav-item" role="presentation">
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade  show active" id="ar-tab" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                    @permission('categories-create')
                    <form action="{{route('categories.store')}}" method="POST" class="mb-5">
                        @csrf
                        <x-admin.forms.input name="category_name" title="إسم التصنيف" type="text"  value="{{old('category_name')}}"/>
                        <button type="submit" class="btn btn-warning">إضافة تصنيف جديد</button>
                    </form>
                    @endpermission

                    <x-admin.forms.table :objects="$categories" :thead="['إسم التصنيف','تم إنشاءه','تم تعديله']" :tbody="['name','created_at','updated_at']" deletePath="categories.destroy"/>

                </div>
                <div class="tab-pane fade" id="en-tab" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="fr-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
            </div>
        </div>
    </div>

@endsection
