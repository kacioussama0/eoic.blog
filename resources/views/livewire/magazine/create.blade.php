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
                <form wire:submit.prevent="create" enctype="multipart/form-data">

                    @csrf
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade  show active" id="ar-tab" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">العنوان</label>
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                                @error('title')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الصورة</label>
                                <input type="file" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" wire:model="thumbnail">
                                @error('thumbnail')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الكتاب</label>
                                <input type="file" id="thumbnail" class="form-control @error('book') is-invalid @enderror" wire:model="book">
                                @error('book')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>


                            <div class="form-check form-switch mb-3">
                                <label for="is_published">المجلة منشورة</label>
                                <input class="form-check-input" type="checkbox" name="is_published" id="is_published"  wire:model="is_published" value="1">
                            </div>



                        </div>
                        <div class="tab-pane fade" id="en-tab" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">


                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">العنوان</label>
                                <input type="text" id="thumbnail" class="form-control @error('title_en') is-invalid @enderror" wire:model="title_en">
                                @error('title_en')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الصورة</label>
                                <input type="file" id="thumbnail" class="form-control @error('thumbnail_en') is-invalid @enderror" wire:model="thumbnail_en">
                                @error('thumbnail_en')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الكتاب</label>
                                <input type="file" id="thumbnail" class="form-control @error('book_en') is-invalid @enderror" wire:model="book_en">
                                @error('book_en')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>


                        </div>
                        <div class="tab-pane fade" id="fr-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">العنوان</label>
                                <input type="text" id="thumbnail" class="form-control @error('title_fr') is-invalid @enderror" wire:model="title_fr">
                                @error('title_fr')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>


                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الصورة</label>
                                <input type="file" id="thumbnail" class="form-control @error('thumbnail_fr') is-invalid @enderror" wire:model="thumbnail_fr">
                                @error('thumbnail_fr')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>



                            <div class="form-group  mb-3">
                                <label for="title_fr" class="form-label">الكتاب</label>
                                <input type="text" id="thumbnail" class="form-control @error('book_fr') is-invalid @enderror" wire:model="book_fr">
                                @error('book_fr')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary w-100">إضافة مجلة</button>

            </div>
            </form>

        </div>
