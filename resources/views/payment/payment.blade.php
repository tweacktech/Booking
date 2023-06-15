<!-- @extends('layouts.admin')

@section('content') -->
  <div class="content-body">
            <div class="container-fluid">         
                  <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <!-- <span>Activities</span> -->
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Payment</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">payment</a></li>
                        </ol>
                    </div>
                </div>


                <div class="row justify-content-center">

                    <div class="col-lg-10 p-3">
                        <a style="position:fixed; background:#00659D; top:400px; left:30px; border-radius:50%; padding:20px;"
                            class=" shadow text-light fs-3" href="/checkout">
                            < </a>
                                <div class="card">
                                    <div class="text-end p-2">
                                        <a class="btn btn-sm btn-warning" href="/all_products">continue</a>
                                    </div>
                                    <div class="card-header py-4">
                                        <!-- <b class="fs-3"> AMOUNT: </b> -->
                                    </div>

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-6">


                                                <form id="paymentForm">
                                                    email<input class="form-control" type="email"  id="email-address"
                                                        value="{{Auth::user()->email}}"  /><br>

                                                   amount <input type="tel" class="form-control" id="amount" value=""
                                                        required  />
                                                        <br>
                                                    <div class="form-submit">
                                                        
                                                            <button class="btn btn-secondary btn-lg" type="submit"
                                                                onclick="payWithPaystack()"> PAY WIHT PAYSTACK </button>
                                                    </div>

                                                </form>

                                            </div>
                                        

                                        </div>
                                    </div>

                                </div>
                    </div>


                </div>
            </div>
            </div>


    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        const paymentForm = document.getElementById('paymentForm');

        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {

            e.preventDefault();

            let handler = PaystackPop.setup({

                key: 'pk_test_7ce279d181176a0c0af488855daf72c19ca5ff8e', // Replace with your public key

                email: document.getElementById("email-address").value,

                amount: document.getElementById("amount").value * 100,

                ref: '' + Math.floor((Math.random() * 1000000000) + 1
                ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

                // label: "Optional string that replaces customer email"

                onClose: function() {

                    alert('Window closed.');

                },

                callback: function(response) {

                    let message = response.reference;

                    window.location.href = "verify-payment/" + message;

                }

            });


            handler.openIframe();

        }
    </script>

    <!-- Footer -->
<!-- @endsection -->
