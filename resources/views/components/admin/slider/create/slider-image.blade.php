<div class="card custom-bg">
    <div class="card-header">
        <h3 class="card-title"> {{$title}} <span class="text-red">*</span></h3>
    </div>
    <div class="card-body">
        <div class="panel-group1">
            <div wire:ignore x-data x-init="() => {

                {{-- /ativate filepond-plugin-image-preview.  --}}
                FilePond.registerPlugin(FilePondPluginImagePreview);

                const SliderImage = FilePond.create($refs.slider);
                SliderImage.setOptions({
                    server: {
                        process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                            @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
                        },
                        revert: (filename, load) => {
                            @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                        },
                    }
                });

                {{-- Remove the images after uploud  --}}
                this.addEventListener('ResetImage', e => {
                    SliderImage.removeFile();
                });
            }">
                <input type="file" x-ref="slider">

            </div>
        </div>
        <x-defaults.input-error for="sliderImage" />
    </div>
</div>
