<div class="row">
    <div class="col-lg-12">
        <div class="card custom-bg">
            <div class="card-header">
                <h3 class="card-title">Additional Information (optional)</h3>
            </div>
            <div class="card-body">
                <div class="panel-group1" id="accordion1" wire:ignore>
                    {{-- short description --}}
                    <div class="panel panel-default">
                        <div class="panel-heading1 ">
                            <h4 class="panel-title1">
                                <a class="text-capitalize accordion-toggle collapsed" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion" href="#addInfo1" aria-expanded="false">Add new
                                    Additional
                                    Info</a>
                            </h4>
                        </div>
                        <div id="addInfo1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="stand_up_en">Stand Up
                                                English</label>
                                            <input type="text" wire:model.defer='stand_up_en' id="stand_up_en"
                                                class="form-control {{$errors->has('stand_up_en')?'is-invalid':''}}"
                                                placeholder="Write a short English Stand Up" />
                                            <x-defaults.input-error for="stand_up_en" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="stand_up_ar">Stand Up
                                                Arabic</label>
                                            <input type="text" wire:model.defer='stand_up_ar' id="stand_up_ar"
                                                class="form-control {{$errors->has('stand_up_ar')?'is-invalid':''}}"
                                                placeholder="Write a short English Stand Up" />
                                            <x-defaults.input-error for="stand_up_ar" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="folded_en">English
                                                Folded (w/o wheels)</label>
                                            <input type="text" wire:model.defer='folded_en' id="folded_en"
                                                class="form-control {{$errors->has('folded_en')?'is-invalid':''}}"
                                                placeholder="Write a short English Folded (w/o wheels)" />
                                            <x-defaults.input-error for="folded_en" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="folded_ar">Arabic
                                                Folded (w/o wheels)</label>
                                            <input type="text" wire:model.defer='folded_ar' id="folded_ar"
                                                class="form-control {{$errors->has('folded_ar')?'is-invalid':''}}"
                                                placeholder="Write a short Arabic Folded (w/o wheels)" />
                                            <x-defaults.input-error for="folded_ar" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="frame_en">English
                                                Frame</label>
                                            <input type="text" wire:model.defer='frame_en' id="frame_en"
                                                class="form-control {{$errors->has('frame_en')?'is-invalid':''}}"
                                                placeholder="Write a short English Frame" />
                                            <x-defaults.input-error for="frame_en" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="frame_ar">Arabic
                                                Frame</label>
                                            <input type="text" wire:model.defer='frame_ar' id="frame_ar"
                                                class="form-control {{$errors->has('frame_ar')?'is-invalid':''}}"
                                                placeholder="Write a short Arabic Frame" />
                                            <x-defaults.input-error for="frame_ar" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="color_en">English
                                                Color</label>
                                            <input type="text" wire:model.defer='color_en' id="color_en"
                                                class="form-control {{$errors->has('color_en')?'is-invalid':''}}"
                                                placeholder="Example: Black, Blue, Red, White" />
                                            <x-defaults.input-error for="color_en" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="color_ar">Arabic
                                                Color</label>
                                            <input type="text" wire:model.defer='color_ar' id="color_ar"
                                                class="form-control {{$errors->has('color_ar')?'is-invalid':''}}"
                                                placeholder="مثل: ابيض, اسود, ازرق" />
                                            <x-defaults.input-error for="color_ar" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-capitalize form-label mt-0" for="size_en">Size</label>
                                            <input type="text" wire:model.defer='size_en' id="size_en"
                                                class="form-control {{$errors->has('size_en')?'is-invalid':''}}"
                                                placeholder="Example: M, S" />
                                            <x-defaults.input-error for="size_en" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
