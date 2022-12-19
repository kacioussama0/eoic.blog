
<div class="card">
            <div class="card-body">


                <form wire:submit.prevent="create" >

                    @csrf



                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">العنوان بالعربية</label>
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                                @error('title')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الصورة بالعربية</label>
                                <input type="file" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" wire:model="thumbnail">
                                @error('thumbnail')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الكتاب بالعربية</label>
                                <input type="file" id="book" class="form-control @error('book') is-invalid @enderror" wire:model="book">
                                @error('book')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>






                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">العنوان بالإنجلزية</label>
                                <input type="text" id="title_en" class="form-control @error('title_en') is-invalid @enderror" wire:model="title_en">
                                @error('title_en')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الصورة بالإنجلزية</label>
                                <input type="file" id="thumbnail_en" class="form-control @error('thumbnail_en') is-invalid @enderror" wire:model="thumbnail_en">
                                @error('thumbnail_en')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الكتاب بالإنجلزية</label>
                                <input type="file" id="book_en" class="form-control @error('book_en') is-invalid @enderror" wire:model="book_en">
                                @error('book_en')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>



                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">العنوان بالفرنسية</label>
                                <input type="text" id="title_fr" class="form-control @error('title_fr') is-invalid @enderror" wire:model="title_fr">
                                @error('title_fr')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>


                            <div class="form-group  mb-3">
                                <label for="title" class="form-label">الصورة بالفرنسية</label>
                                <input type="file" id="thumbnail_fr" class="form-control @error('thumbnail_fr') is-invalid @enderror" wire:model="thumbnail_fr">
                                @error('thumbnail_fr')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>



                            <div class="form-group  mb-3">
                                <label for="title_fr" class="form-label">الكتاب بالفرنسية</label>
                                <input type="text" id="book_fr" class="form-control @error('book_fr') is-invalid @enderror" wire:model="book_fr">
                                @error('book_fr')
                                <span class="text-danger">{{__($message)}}</span>
                                @enderror
                            </div>

                        <div class="form-check form-switch mb-3">
                            <label for="is_published">المجلة منشورة</label>
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published"  wire:model="is_published" value="1">
                        </div>


                    <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >

                    <div class="progress my-3">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`"></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">إضافة مجلة</button>

            </div>

            </div>

            </form>

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        </div>
