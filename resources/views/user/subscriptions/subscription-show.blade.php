<x-app-layout>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-card-title title="{{ __('Stripe payment') }}"></x-card-title>

                <div class="flex items-center justify-center mb-32">
                    <div class="grid rounded-lg w-11/12 md:w-9/12 lg:w-2/2">
                        <form method="POST" action="{{ route('user-payment-store', $subscription->id) }}" id="payment-form">
                            @csrf
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="flex mt-5">
                                        <h1 class="text-gray-600 font-bold md:text-xl text-xl">{{ __('Payment detail') }}</h1>
                                    </div>
                                </div>

                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <div class="grid grid-cols-1 mt-5">
                                        <x-label name="package">{{ __('Package') }}</x-label>
                                        <x-input class="mt-3 mb-3 bg-gray-100" name="package" value="{{ $subscription->package_name }}" disabled></x-input>
                                        <x-label name="amount">{{ __('Amount') }}</x-label>
                                        <x-input class="mt-3 mb-3 bg-gray-100" name="amount" value="{{ auth()->user()->reseller_id ? $subscription->reseller_price : $subscription->user_price }}" disabled></x-input>
                                        <x-label name="cardholder-name">{{ __('Cardholder Name') }}</x-label>
                                        <x-input class="mt-3 mb-3" name="cardholder-name" id="cardholder-name" value="{{ auth()->user()->name }}"></x-input>
                                        <x-label name="card_detail">{{ __('Card detail') }}</x-label>
                                        <div id="card-element"></div>
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <div class="grid grid-cols-1 justify-center mt-6">
                                        <x-button-save>{{ __('Purchase') }}</x-button-save>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let stripe = Stripe("{{ env('STRIPE_KEY') }}")
            let elements = stripe.elements()
            let style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            }
            let card = elements.create('card', {style: style})
            card.mount('#card-element')

            card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            var cardHolderName = document.getElementById('cardholder-name');
            form.addEventListener('submit', async function(event) {
                event.preventDefault();
                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', card, {
                        billing_details: { name: cardHolderName.value }
                    }
                );
                if (error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                } else {
                    // Send the token to your server.
                    // console.log(paymentMethod);
                    stripeTokenHandler(paymentMethod);
                }
            });
            // Submit the form with the token ID.
            function stripeTokenHandler(paymentMethod) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'paymentMethod');
                hiddenInput.setAttribute('value', paymentMethod.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
        </script>
    @endpush
</x-app-layout>
