<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make Payment') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                  <div class="card">
                    <div class="card-header">Complete the security steps</div>
                    <div class="card-body">
                        <p>
                        You need to follow some steps with you
                        </p>  
                    </div>
                  </div>
                    
                    
                </div>
            </div>

            


        </div>        
    </div>
    @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe('{{ config('services.stripe.key') }}');

            stripe.handleCardAction("{{ $clientSecret }}")
                .then(function(result){
                    if(result.error){
                        window.location.replace("{{ route('cancelled') }}")
                    }else{
                        window.location.replace("{{ route('approval') }}")
                    }
                });

        </script>
    @endpush

    
</x-app-layout>
