<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscribe') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <div class="mt-1 md:mt-0 md:col-span-2">
                        <form action="{{ route('subscribe.store') }}" method="POST" id="paymentForm">
                            @csrf
                          <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="container  mx-auto pl-3 mt-4">                                
                                <label class="block text-sm font-medium text-gray-700">Select your plan</label>
                                    <div class="form-group" >
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            @foreach ($plans as $plan)
                                                <label
                                                    class="btn btn-outline-primary rounded m-2 p-1 "
                                                    
                                                >
                                                <input
                                                type="radio"
                                                name="plan"
                                                value="{{ $plan->slug }}"
                                                required
                                            >
                                            <p class="h2 font-weight-bold text-capitalize">
                                                {{ $plan->slug }}
                                            </p>

                                            <p class="display-4 text-capitalize">
                                                {{ $plan->visual_price }}
                                            </p>
                                                    
                                                </label>
                                            @endforeach
                                        </div>
                                      
                                    </div>                                
                            </div>

                            <div class="container  mx-auto pl-3">                                
                                <label class="block text-sm font-medium text-gray-700">Select the desired payment platform</label>
                                    <div class="form-group" id="toggler">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            @foreach ($paymentPlatforms as $paymentPlatform)
                                                <label
                                                    class="btn btn-outline-primary rounded m-2 p-1 "
                                                    data-target="#{{ $paymentPlatform->name }}Collapse"
                                                    data-toggle="collapse"
                                                >
                                                    <input
                                                        type="radio"
                                                        name="payment_platform"
                                                        value="{{ $paymentPlatform->id }}"
                                                        required
                                                    >
                                                    <img class="img-thumbnail" src="{{ asset($paymentPlatform->image) }}" alt="payment">
                                                </label>
                                            @endforeach
                                        </div>
                                        @foreach ($paymentPlatforms as $paymentPlatform)
                                            <div
                                                id="{{ $paymentPlatform->name }}Collapse"
                                                class="collapse"
                                                data-parent="#toggler"
                                            >
                                                @includeIf ('components.' . strtolower($paymentPlatform->name) . '-collapse')
                                            </div>
                                        @endforeach
                                    </div>                                
                            </div>
                          
                            <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                              <button type="submit" id="payButton"
                              class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm 
                              font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"                                                    
                              >
                                Subscribe
                              </button>
                            </div>

                          </div>
                        </form>
                    </div>
                    
                    
                </div>
            </div>

            


        </div>        
    </div>

    
</x-app-layout>
