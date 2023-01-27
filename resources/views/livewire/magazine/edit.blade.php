
<div class="card">
    <div class="card-body">

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form wire:submit.prevent="create" >

            @csrf

            <div
                x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >

                <div class="form-group  mb-3">
                    <label for="title" class="form-label">{{__('forms.title-in-ar')}}</label>
                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                    @error('title')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>

                <div class="form-group  mb-3">
                    <label for="title" class="form-label">{{__('forms.picture-in-ar')}}</label>
                    <input type="file" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" wire:model="thumbnail">
                    @error('thumbnail')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>



                @if ($thumbnail)
                    <img src="{{ $thumbnail->temporaryUrl() }}" class="img-fluid" style="width: 200PX">
                @endif

                <div class="form-group  mb-3">
                    <label for="title" class="form-label">{{__('forms.book-in-ar')}}</label>
                    <input type="file" id="book" class="form-control @error('book') is-invalid @enderror" wire:model="book">
                    @error('book')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>


                <div class="form-check form-switch mb-3">
                    <label for="is_published">{{__('forms.share')}}</label>
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published"  wire:model="is_published" value="1">
                </div>


                <div class="form-group  mb-3">
                    <label for="title" class="form-label">{{__('forms.title-in-en')}}</label>
                    <input type="text" id="title_en" class="form-control @error('title_en') is-invalid @enderror" wire:model="title_en">
                    @error('title_en')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>

                <div class="form-group  mb-3">
                    <label for="title" class="form-label">{{__('forms.picture-in-en')}}</label>
                    <input type="file" id="thumbnail_en" class="form-control @error('thumbnail_en') is-invalid @enderror" wire:model="thumbnail_en">
                    @error('thumbnail_en')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>

                @if ($thumbnail_en)
                    <img src="{{ $thumbnail_en->temporaryUrl() }}" class="img-fluid" style="width: 200PX">
                @endif

                <div class="form-group  mb-3">
                    <label for="title" class="form-label">{{__('forms.book-in-en')}}</label>
                    <input type="file" id="book_en" class="form-control @error('book_en') is-invalid @enderror" wire:model="book_en">
                    @error('book_en')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>


                <div class="form-group  mb-3">
                    <label for="title" class="form-label"> {{__('forms.title-in-fr')}}</label>
                    <input type="text" id="title_fr" class="form-control @error('title_fr') is-invalid @enderror" wire:model="title_fr">
                    @error('title_fr')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>


                <div class="form-group  mb-3">
                    <label for="title" class="form-label">{{__('forms.picture-in-fr')}}</label>
                    <input type="file" id="thumbnail_fr" class="form-control @error('thumbnail_fr') is-invalid @enderror" wire:model="thumbnail_fr">
                    @error('thumbnail_fr')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>



                <div class="form-group  mb-3">
                    <label for="title_fr" class="form-label">{{__('forms.book-in-fr')}}</label>
                    <input type="file" id="book_fr" class="form-control @error('book_fr') is-invalid @enderror" wire:model="book_fr">
                    @error('book_fr')
                    <span class="text-danger">{{__($message)}}</span>
                    @enderror
                </div>



                <div class="progress my-3">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`"></div>
                </div>
                <button type="submit" class="btn btn-primary w-100" wire:loading.attr="disabled"> {{__('forms.add-magazines')}}

                    <div class="spinner-border text-light" role="status" wire:loading wire:target="book">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>

            </div>

    </div>

    </form>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</div>
