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
                   
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('pay') }}" method="POST" id="paymentForm">
                            @csrf
                          <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid md:grid-cols-3 gap-6 grid-cols-1">
                                    <div>
                                        <label for="price" class="block text-sm font-medium text-gray-700">How much you want to pay?</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                            $
                                            </span>
                                        </div>
                                        <input type="number" name="value"  min="5" step="0.01" 
                                        value="{{ mt_rand(500, 100000) / 100 }}"    
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                        <div class="absolute inset-y-0 right-0 flex items-center">
                                            <label for="currency" class="sr-only">Currency</label>
                                            <select id="currency" name="currency" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                                @foreach ($currencies ?? '' as $currency )
                                                    <option value="{{ $currency->iso }}">
                                                        {{ strtoupper($currency->iso) }}
                                                    </option>
                                                @endforeach                                          
                                            </select>
                                        </div>
                                        </div>
                                        <small class="text-gray-500">
                                            use values with up to decimal positions, using a dot " ."
                                        </small>
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
                                Pay
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
