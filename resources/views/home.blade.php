@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0" style="font-weight: bold; font-size: 48px; color: #fff; background-color: #007bff; padding: 10px 20px; border-radius: 15px; font-family: 'Arial', sans-serif; 
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2), -2px -2px 5px rgba(0, 0, 0, 0.2);">
    {{ __('aL') }}
</h4>



                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ __('Success!') }}</strong> {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <p class="text-muted">{{ __('Pesan Codingan Ke bang aL ⬇️.') }}</p>
                        <img src="/images/dashboard-illustration.png" alt="" class="img-fluid mb-4" style="max-height: 200px;">
                        
                        <a href="https://wa.me/62882017075201?text=Halo%20saya%20ingin%20bertanya%20tentang%20produk%20Anda" 
   class="btn btn-primary btn-lg" 
   target="_blank">
    {{ __('Hubungi WhatsApp') }}
</a>
<a href="https://sociabuzz.com/alfariz/tribe" class="btn btn-outline-secondary btn-lg ms-2" target="_blank">
    {{ __('Kuy Donasi 🙌') }}
</a>
                    </div>
                </div>
                <div class="card-footer bg-light text-center text-muted">
                    {{ __('Dosmer - Creadit by alfrz © 2025') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
