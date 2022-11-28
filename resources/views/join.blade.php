@extends('blog-layout.app')
@section('title','إنخرط معنا')

@section('content')




    <div class="container">

        <div class="uk-card">

            <div class="uk-card-title p-5 ">
                <h1 class="uk-text-center">إنخرط مع المرصد</h1>
            </div>




            <div class="uk-card-body">


                    @if (\Session::has('success'))
                        <div class="uk-alert uk-alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif

                <form action="{{route('join-us')}}" method="POST">


                    @csrf

                    <div class="row">

                        <x-forms.input name="full_name" type="text" title="إسمك الكامل"/>
                        <x-forms.input name="date_of_birth" type="date" title="تاريخ الميلاد :"/>

                    </div>


                    <div class="row">

                        <x-forms.input name="place_of_birth" type="text" title="مكان الميلاد :"/>
                        <x-forms.input name="nationality_and_residence" type="text" title="الجنسية وبلد الإقامة :"/>


                    </div>


                    <div class="row">


                        <x-forms.input name="national_card_id" type="text" title="رقم بطاقة التعريف الوطني"/>
                        <x-forms.input name="national_card_place" type="text" title="مكان إصدار البطاقة"/>

                    </div>


                    <div class="row">

                        <x-forms.input name="address" type="text" title="العنوان ( البلدية/ الولاية) :"/>


                    </div>

                    <div class="row">

                        <x-forms.select name="level"  title="المستوى العلمي :" :choices="['ثانوي','ليسانس','ماستر','دكتوراه','أخرى']"/>




                        <div class="uk-margin-bottom col-md">

                            <x-forms.input name="level_speciality" type="text" title="التخصص الجامعي"/>


                        </div>


                    </div>



                    <div class="row">


                        <x-forms.input name="job" type="text" title="المهنة / المؤسسة"/>
                        <x-forms.input name="phone" type="tel" title="الهاتف"/>




                    </div>


                    <div class="row">

                        <x-forms.input name="email" type="email" title="البريد الإلكتروني"/>


                        <div class="uk-margin-bottom col-md">

                            <label for="joined_associations" class="uk-label uk-label-warning">هل أنت منخرط في جمعيات أو منظمات أخرى؟ </label>
                            <select name="joined_associations" id="joined_associations" class="uk-input">
                                <option value="1">نعم</option>
                                <option value="0">لا</option>

                            </select>

                        </div>



                    </div>


                    <div class="row">

                        <x-forms.input name="joined_associations_name" type="text" title="اذا كانت الإجابة نعم، أذكر المؤسسة وحدد صفتك داخلها"/>



                        <div class="uk-margin-bottom col-md">

                            <label for="joined_political_parts" class="uk-label uk-label-warning">هل انتميت لأحزاب سياسية؟</label>
                            <select name="joined_political_parts" id="joined_political_parts" class="uk-input">
                                <option value="1">نعم</option>
                                <option value="0">لا</option>

                            </select>

                        </div>


                    </div>


                    <div class="row">

                        <x-forms.input name="joined_political_parts_name" type="text" title="اذا كانت الإجابة نعم، أذكر الحزب وحدد صفتك داخله"/>
                        <x-forms.input name="inclinations" type="text" title="ماهي ميولاتك ؟"/>




                    </div>

                    <div class="row">


                        <x-forms.input name="abilities" type="text" title="أدخل قدراتك"/>
                        <x-forms.input name="additions_human_rights" type="text" title="ماذا يمكن أن تضيف في مجال حقوق الإنسان والقضايا العادلة ؟"/>




                    </div>

                    <div class="row">

                        <x-forms.input name="additions_media" type="text" title="ماذا يمكن أن تقدم في مجال الاعلام (تصميم، إنتاج فديو، تصوير ...)"/>
                        <x-forms.input name="why_join" type="text" title="لماذا تريد الانضمام إلى المرصد؟"/>

                    </div>


                    <input type="submit" value="إرسال" class="uk-button-primary uk-width-1-1 p-2">


                </form>

            </div>


        </div>


    </div>

@endsection
