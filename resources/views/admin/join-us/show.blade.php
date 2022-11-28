@extends('admin.layouts.app')
@section('title',  $join -> id .'معلومات خاصة بالطلب رقم ')



@section('content')

    <div class="card border  border-secondary border-2">

        <h3 class="card-header bg-primary text-light" >الإسم الكامل : {{$join->full_name}}</h3>

        <div class="card-body mt-3 ">

           <div class="row mb-3 ">

               <div class="col-md border-start border-warning border-start border-warning">تاريخ الميلاد : {{$join->date_of_birth}}</div>

               <div class="col-md border-start border-warning border-start border-warning">مكان الميلاد : {{$join->place_of_birth}}</div>

           </div>

           <div class="row mb-3 ">

               <div class="col-md border-start border-warning">
                   الجنسية وبلد الإقامة : {{$join->nationality_and_residence}}

               </div>

               <div class="col-md border-start border-warning">
                  رقم بطاقة التعريف الوطني : {{$join->national_card_id}}
               </div>

           </div>

            <div class="row mb-3">
                <div class="col-md border-start border-warning">مكان إصدار البطاقة : {{$join-> national_card_place}}</div>

                <div class="col-md border-start border-warning">المستوى العلمي :{{$join-> level}}</div>
            </div>


            <div class="row mb-3">

                <div class="col-md border-start border-warning">التخصص الجامعي : {{$join-> level_speciality}}</div>

                <div class="col-md border-start border-warning">المهنة / المؤسسة : {{$join-> job}}</div>

            </div>


            <div class="row mb-3">

                <div class="col-md border-start border-warning">الهاتف : {{$join-> phone}}</div>

                <div class="col-md border-start border-warning">البريد الإلكتروني : {{$join-> email}}</div>

            </div>


            <div class="row mb-3">

                <div class="col-md border-start border-warning"> هل أنت منخرط في جمعيات أو منظمات أخرى؟ {{($join-> joined_associations == 1) ? 'نعم' : 'لا'}}</div>

                <div class="col-md border-start border-warning"> اذا كانت الإجابة نعم، أذكر المؤسسة وحدد صفتك داخلها {{ $join-> joined_associations_name }}</div>


            </div>


            <div class="row mb-3">

                <div class="col-md border-start border-warning"> هل انتميت لأحزاب سياسية ؟ {{($join-> joined_political_parts == 1) ? 'نعم' : 'لا'}}</div>

                <div class="col-md border-start border-warning"> اذا كانت الإجابة نعم، أذكر الحزب وحدد صفتك داخله {{$join-> joined_political_parts_name}}</div>

            </div>

            <div class="row mb-3">

                <div class="col-md border-start border-warning"> ماهي ميولاتك ؟ {{$join-> inclinations}}</div>

                <div class="col-md border-start border-warning"> ماهي قدراتك ؟ {{$join-> abilities}}</div>


            </div>

           <div class="row mb-3">

               <div class="col-md border-start border-warning"> ماذا يمكن أن تضيف في مجال حقوق الإنسان والقضايا العادلة ؟ {{$join-> additions_human_rights}}</div>

               <div class="col-md border-start border-warning"> ماذا يمكن أن تقدم في مجال الاعلام (تصميم، إنتاج فديو، تصوير ...) {{$join-> additions_media}}</div>



           </div>

        <div class="row">

            <div class="col-md border-start border-warning"> لماذا تريد الانضمام إلى المرصد؟ {{$join-> why_join}}</div>

        </div>

        </div>


    </div>


@endsection
