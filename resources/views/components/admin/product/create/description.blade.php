<div class="row">
    <div class="col-lg-12">
        <div class="card custom-bg">
            <div class="card-header">
                <h3 class="card-title">Product Descriptions</h3>
            </div>
            <div class="card-body">
                <div class="panel-group1" id="accordion1">

                    {{-- short description --}}
                    <div class="panel panel-default">
                        <div class="panel-heading1 ">
                            <h4 class="panel-title1">
                                <a class="text-capitalize accordion-toggle collapsed" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion" href="#collapseFour" aria-expanded="false">short
                                    description <span class="text-red">*</span></a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse show" role="tabpanel"
                            aria-expanded="false">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">English <span
                                            class="text-red">*</span></label>
                                    <textarea wire:model.defer='short_desc_en' id="short_desc_en"
                                        class="form-control {{$errors->has('short_desc_en')?'is-invalid':''}}"
                                        placeholder="Write a short English description"
                                        style="height: 100px"></textarea>
                                    <x-defaults.input-error for="short_desc_en" />
                                </div>
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">Arabic <span
                                            class="text-red">*</span></label>
                                    <textarea wire:model.defer='short_desc_ar' id="short_desc_ar"
                                        class="form-control {{$errors->has('short_desc_ar')?'is-invalid':''}}"
                                        placeholder="Write a short Arabic description" style="height: 100px"></textarea>
                                    <x-defaults.input-error for="short_desc_ar" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- long product description --}}
                    <div class="panel panel-default" wire:ignore>
                        <div class="panel-heading1">
                            <h4 class="panel-title1">
                                <a class="text-capitalize accordion-toggle collapsed" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion" href="#collapseSix" aria-expanded="false">long product
                                    description</a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">English</label>
                                    <textarea wire:model.defer='long_desc_en' id="long_desc_en"
                                        class="form-control {{$errors->has('long_desc_en')?'is-invalid':''}}"></textarea>
                                    <x-defaults.input-error for="long_desc_en" />
                                </div>
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">Arabic</label>
                                    <textarea wire:model.defer='long_desc_ar' id="long_desc_ar"
                                        class="form-control {{$errors->has('long_desc_ar')?'is-invalid':''}}"
                                        placeholder="Write a short Arabic description" style="height: 100px"></textarea>
                                    <x-defaults.input-error for="long_desc_ar" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Packaging & Delivery --}}
                    <div class="panel panel-default" wire:ignore>
                        <div class="panel-heading1">
                            <h4 class="panel-title1">
                                <a class="text-capitalize accordion-toggle collapsed" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion" href="#collapseEight" aria-expanded="false">Packaging &
                                    Delivery</a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">English</label>
                                    <textarea wire:model.defer='packaging_delivery_en' id="packaging_delivery_en"
                                        class="form-control {{$errors->has('packaging_delivery_en')?'is-invalid':''}}"
                                        placeholder="Write an english Packaging & Delivery description"
                                        style="height: 100px"></textarea>
                                    <x-defaults.input-error for="packaging_delivery_en" />
                                </div>
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">Arabic</label>
                                    <textarea wire:model.defer='packaging_delivery_ar' id="packaging_delivery_ar"
                                        class="form-control {{$errors->has('packaging_delivery_ar')?'is-invalid':''}}"
                                        placeholder="Write an Arabic Packaging & Delivery description"
                                        style="height: 100px"></textarea>
                                    <x-defaults.input-error for="packaging_delivery_ar" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Suggested Use --}}
                    <div class="panel panel-default" wire:ignore>
                        <div class="panel-heading1">
                            <h4 class="panel-title1">
                                <a class="text-capitalize accordion-toggle collapsed" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion" href="#collapseFifteen" aria-expanded="false">Suggested
                                    Use</a>
                            </h4>
                        </div>
                        <div id="collapseFifteen" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">English</label>
                                    <textarea wire:model.defer='suggested_use_en' id="suggested_use_en"
                                        class="form-control {{$errors->has('suggested_use_en')?'is-invalid':''}}"
                                        placeholder="Write an English Suggested Use" style="height: 100px"></textarea>
                                    <x-defaults.input-error for="suggested_use_en" />
                                </div>
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">Arabic</label>
                                    <textarea wire:model.defer='suggested_use_ar' id="suggested_use_ar"
                                        class="form-control {{$errors->has('suggested_use_ar')?'is-invalid':''}}"
                                        placeholder="Write an Arabic Suggested Use" style="height: 100px"></textarea>
                                    <x-defaults.input-error for="suggested_use_ar" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Other Ingredients --}}
                    <div class="panel panel-default" wire:ignore>
                        <div class="panel-heading1">
                            <h4 class="panel-title1">
                                <a class="text-capitalize accordion-toggle collapsed" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion" href="#collapseEleven" aria-expanded="false">Other
                                    Ingredients</a>
                            </h4>
                        </div>
                        <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">English</label>
                                    <textarea wire:model.defer='other_ingredients_en' id="other_ingredients_en"
                                        class="form-control {{$errors->has('other_ingredients_en')?'is-invalid':''}}"
                                        placeholder="Write an English Other Ingredients"
                                        style="height: 100px"></textarea>
                                    <x-defaults.input-error for="other_ingredients_en" />
                                </div>
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">Arabic</label>
                                    <textarea wire:model.defer='other_ingredients_ar' id="other_ingredients_ar"
                                        class="form-control {{$errors->has('other_ingredients_ar')?'is-invalid':''}}"
                                        placeholder="Write an Arabic Other Ingredients"
                                        style="height: 100px"></textarea>
                                    <x-defaults.input-error for="other_ingredients_ar" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Warnings --}}
                    <div class="panel panel-default" wire:ignore>
                        <div class="panel-heading1">
                            <h4 class="panel-title1">
                                <a class="text-capitalize accordion-toggle collapsed" data-bs-toggle="collapse"
                                    data-bs-parent="#accordion" href="#collapseThrteen"
                                    aria-expanded="false">Warnings</a>
                            </h4>
                        </div>
                        <div id="collapseThrteen" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="text-capitalize form-label mt-0">English</label>
                                    <textarea wire:model.defer='warnings_en' id="warnings_en"
                                        class="form-control {{$errors->has('warnings_en')?'is-invalid':''}}"
                                        placeholder="Write an English Warnings" style="height: 100px"></textarea>
                                    <x-defaults.input-error for="warnings_en" />
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="text-capitalize form-label mt-0">Arabic</label>
                                        <textarea wire:model.defer='warnings_ar' id="warnings_ar"
                                            class="form-control {{$errors->has('warnings_ar')?'is-invalid':''}}"
                                            placeholder="Write an English Warnings" style="height: 100px"></textarea>
                                        <x-defaults.input-error for="warnings_ar" />
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
