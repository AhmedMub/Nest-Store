{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="largemodal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">edit Admin credentials</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" wire:submit.prevent='update'>
                @csrf
                <div class="modal-body card-body py-2">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="fname">first name <span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='fname' id="fname" type="text"
                                    class="form-control {{$errors->has('fname')?'is-invalid':''}}"
                                    placeholder="Write First Name" />
                                <x-defaults.input-error for="fname" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="sname">second name <span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='sname' id="sname" type="text"
                                    class="form-control {{$errors->has('sname')?'is-invalid':''}}"
                                    placeholder="Write Second Name" />
                                <x-defaults.input-error for="sname" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="email">Email <span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='email' id="email" type="text"
                                    class="form-control {{$errors->has('email')?'is-invalid':''}}"
                                    placeholder="Write Valid Email" />
                                <x-defaults.input-error for="email" />
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="phone">Phon number <span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='phone' id="phone" type="text"
                                    class="form-control {{$errors->has('phone')?'is-invalid':''}}"
                                    placeholder="Write Valid Phone" />
                                <x-defaults.input-error for="phone" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="password">New Password <span
                                        class="text-red">*</span></label>
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                    <a href="javascript:void(0)"
                                        class="input-group-text bg-white text-muted {{$errors->has('password')?'passInvalid':''}}">
                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input wire:model.defer='password' id="password" type="password"
                                        class="input100 border-start-0 ms-0 form-control {{$errors->has('password')?'is-invalid':''}}"
                                        placeholder="New Password" />
                                    <x-defaults.input-error for="password" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="password_confirmation">Confirm
                                    Password <span class="text-red">*</span></label>
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                    <a href="javascript:void(0)"
                                        class="input-group-text bg-white text-muted {{$errors->has('password_confirmation')?'passInvalid':''}}">
                                        <i class=" zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input wire:model.defer='password_confirmation' id="password_confirmation"
                                        type="password"
                                        class="input100 border-start-0 ms-0 form-control {{$errors->has('password_confirmation')?'is-invalid':''}}"
                                        placeholder="Confirm Password" />
                                    <x-defaults.input-error for="password_confirmation" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="mainCat">Change Admin Role <span
                                        class="text-red">*</span></label>
                                <select autocomplete="off" class="form-select" wire:model.defer="role">
                                    <option selected value="">--selecte role--</option>
                                    @if (isset($roles))
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}" class="text-uppercase"> {{$role->name}} </option>
                                    @endforeach
                                    @endif
                                </select>
                                <x-defaults.input-error for="role" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-loading-button btn="save changes" class="btn btn-primary" icon="bi bi-box-arrow-in-up" />
                    <a href="javascript:void(0)" class="btn btn-light text-capitalize" data-bs-dismiss="modal">close</a>
                </div>
            </form>
        </div>
    </div>
</div>
