<main class="main page-404">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <p class="mb-20"><img src="{{asset('storage/default_images/default_icons/'.$image)}}" alt=""
                            class="hover-up" /></p>
                    <h1 class="display-2 mb-30">{{$message}}</h1>
                    <p class="font-lg text-grey-700 mb-30">
                        {{$messageBody}}
                    </p>
                    <a class="btn btn-default submit-auto-width font-xs hover-up mt-30"
                        href="{{route('invoice', $invoice)}}"><i class="fi-rs-download mr-5"></i>Show Order Invoice</a>
                </div>
            </div>
        </div>
    </div>
</main>
