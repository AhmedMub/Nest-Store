{{-- Smile, breathe, and go slowly :) . - Thich Nhat Hanh --}}
<div class="col-lg-12">
    <div class="card custom-bg">
        <div class="card-header">
            <h3 class="card-title">Upload Product Images<span class="text-red">*</span></h3>
        </div>
        <div class="card-body">
            <div class="panel-group1">
                <div wire:ignore x-data x-init="() => {

                    {{-- /ativate filepond-plugin-image-preview.  --}}
                    FilePond.registerPlugin(FilePondPluginImagePreview);

                    const ProductMultiImages = FilePond.create($refs.multiImgs);
                    ProductMultiImages.setOptions({

                        {{-- By default, multiple will be off, but we turn it on at the component level on a per use basis: so add multiple to component --}}
                        allowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
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
                    this.addEventListener('multiImagesReset', e => {
                        ProductMultiImages.removeFiles();
                    });
                }">
                    <input type="file" x-ref="multiImgs">

                </div>
            </div>
            <x-defaults.input-error for="multiImgs" />
        </div>
    </div>
</div>
