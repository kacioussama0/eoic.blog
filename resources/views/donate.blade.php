@extends('blog-layout.app')
@section('title','تبرع للهيئة')




@section('content')

    <div class="container-lg">
        <h1 class="py-3 text-center">{{__('forms.donate-to-organisation')}}</h1>

        <p class="text-muted text-center">
            تعتمد الهيئة في تنفيذ أعمالها وتسيير شؤونها على الموارد الآتية:
            العطايا بمختلف أنواعها: تبرعات؛ منح؛ وصايا؛ زكوات…الخ.
            إيرادات الأنشطة التي تنظمها الهيئة.
            المساهمات المالية التي ترد إلى الهيئة من المؤسسات الخاصة والعامة.
            مساهمات أخرى يقدمها أعضاءمن الهيئة أو من خارجها.
            وتتقيد الهيئة في قبول مواردها المالية بالقوانين النافذة في دولة المقر وفي البلدان التي لها فيها فروع.
        </p>

        <div class="row justify-content-center align-items-center">


            <div class="col-md-5">
                <div class="card border rounded-4 my-5 p-3 shadow-sm">
                    <div class="card-body text-center">
                        <img src="{{asset('assets/imgs/logo.svg')}}" alt="" class="mb-3" style="width: 100px">
                        <h3 class="w-50 mx-auto">{{$settings -> display_name()}}</h3>

                        <form action="{{route('donate.process')}}" method="POST">
                             @csrf
                            <input type="number" class="form-control w-50 mx-auto fs-2 text-muted border-0 text-center" id="price" name="price" required step="0.05" placeholder="0.00">
                            <label for="price" class="text-muted mb-3">EURO</label>

                            <button type="submit" class="btn btn-secondary w-100 rounded-pill text-dark py-2">{{__('forms.donate-with-paypal')}}<i class="fa fa-brands fa-paypal"></i> </button>
                        </form>

                    </div>
                </div>
            </div>


        </div>

    </div>

    <div id="smart-button-container">
        <div style="text-align: center"><label for="description"> </label><input type="text" name="descriptionInput" id="description" maxlength="127" value=""></div>
        <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Please enter a description</p>
        <div style="text-align: center"><label for="amount"> </label><input name="amountInput" type="number" id="amount" value="" ><span> EUR</span></div>
        <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Please enter a price</p>
        <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value="" ></div>
        <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
        <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
    <script>
        function initPayPalButton() {
            var description = document.querySelector('#smart-button-container #description');
            var amount = document.querySelector('#smart-button-container #amount');
            var descriptionError = document.querySelector('#smart-button-container #descriptionError');
            var priceError = document.querySelector('#smart-button-container #priceLabelError');
            var invoiceid = document.querySelector('#smart-button-container #invoiceid');
            var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
            var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

            var elArr = [description, amount];

            if (invoiceidDiv.firstChild.innerHTML.length > 1) {
                invoiceidDiv.style.display = "block";
            }

            var purchase_units = [];
            purchase_units[0] = {};
            purchase_units[0].amount = {};

            function validate(event) {
                return event.value.length > 0;
            }

            paypal.Buttons({
                style: {
                    color: 'gold',
                    shape: 'rect',
                    label: 'paypal',
                    layout: 'vertical',

                },

                onInit: function (data, actions) {
                    actions.disable();

                    if(invoiceidDiv.style.display === "block") {
                        elArr.push(invoiceid);
                    }

                    elArr.forEach(function (item) {
                        item.addEventListener('keyup', function (event) {
                            var result = elArr.every(validate);
                            if (result) {
                                actions.enable();
                            } else {
                                actions.disable();
                            }
                        });
                    });
                },

                onClick: function () {
                    if (description.value.length < 1) {
                        descriptionError.style.visibility = "visible";
                    } else {
                        descriptionError.style.visibility = "hidden";
                    }

                    if (amount.value.length < 1) {
                        priceError.style.visibility = "visible";
                    } else {
                        priceError.style.visibility = "hidden";
                    }

                    if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
                        invoiceidError.style.visibility = "visible";
                    } else {
                        invoiceidError.style.visibility = "hidden";
                    }

                    purchase_units[0].description = description.value;
                    purchase_units[0].amount.value = amount.value;

                    if(invoiceid.value !== '') {
                        purchase_units[0].invoice_id = invoiceid.value;
                    }
                },

                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: purchase_units,
                    });
                },

                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (orderData) {

                        // Full available details
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                        // Show a success message within this page, e.g.
                        const element = document.getElementById('paypal-button-container');
                        element.innerHTML = '';
                        element.innerHTML = '<h3>Thank you for your payment!</h3>';

                        // Or go to another URL:  actions.redirect('thank_you.html');

                    });
                },

                onError: function (err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();
    </script>

@endsection
