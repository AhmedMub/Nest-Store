{{-- Smile, breathe, and go slowly :) . - Thich Nhat Hanh --}}
<div class="col-lg-12">
    <div class="card custom-bg">
        <div class="card-header">
            <h3 class="card-title">Change Product Main Images</h3>
        </div>
        <div class="card-body">
            <div class="panel-group1">
                <div wire:ignore x-data x-init="() => {

                    {{-- /ativate filepond-plugin-image-preview.  --}}
                    FilePond.registerPlugin(FilePondPluginImagePreview);

                    const ProductMainImg = FilePond.create($refs.mainImage);
                    ProductMainImg.setOptions({
                        server: {
                            process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
                            },
                            revert: (filename, load) => {
                                @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                            },
                        }
                    });
                }">
                    <input type="file" x-ref="mainImage">

                </div>
            </div>
            <x-defaults.input-error for="mainImage" />
        </div>
    </div>
</div>
