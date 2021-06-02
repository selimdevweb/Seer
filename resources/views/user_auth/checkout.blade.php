@extends('layouts.app')

@section('title')
    Seer | Page de paiement
@endsection

@section('content')
    <div class="main__content">
        <h1>Paiement sécurisé </h1>

        @foreach ($billetteries as $billetterie)
            <form role="form" action="{{ route('make-payment', $billetterie->id) }}" method="post" class="stripe-payment"
                data-cc-on-file="false" data-stripe-publishable-key="pk_test_51Iuxs5G7x6GsCgKuLOi6zIKivOd6FIgBfhpSycZLrXafn1WbmojkAA77ibefwFbhxyTvMqGfNpAAVNejzDlIzpPb00nT6IGceH"
                id="stripe-payment">
                @csrf

                <div>
                    <div class='col-xs-12 form-group required'>
                        <input class='form-control'
                            size='4' type='text' value="{{ auth()->user()->nom }}">
                    </div>
                </div>

                <input type="hidden" name="prix" value="{{ \Cart::get($billetterie->id)->getPriceSum() }}">

                <div>
                    <div class='required'>
                        <input autocomplete='off'
                            class='form-control card-num' size='20' type='text' placeholder="Numéro de carte">
                    </div>
                </div>

                <div class='main__checkout'>
                    <div class='required'>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='CVC'
                            size='4' type='text'>
                    </div>
                    <div class='required'>
                        <input
                            class='form-control card-expiry-month' placeholder='Mois' size='2' type='text'>
                    </div>
                    <div class='required'>
                        <input
                            class='form-control card-expiry-year' placeholder='Année' size='4' type='text'>
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-success btn-lg btn-block" type="submit">Commander {{ \Cart::get($billetterie->id)->getPriceSum()  }} €</button>
                </div>
            </form>
        @endforeach
    </div>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function () {
            var $form = $(".stripe-payment");
            $('form.stripe-payment').bind('submit', function (e) {
                var $form = $(".stripe-payment"),
                    inputVal = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputVal),
                    $errorStatus = $form.find('div.error'),
                    valid = true;
                $errorStatus.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorStatus.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-num').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeRes);
                }

            });

            function stripeRes(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });

    </script>

@endsection

