<!-- braintree dropin-ui -->
<?php 

 $gateway = new \Braintree\Gateway([
	 'environment' => config('services.braintree.environment'),
	 'merchantId' => config('services.braintree.merchantId'),
	 'publicKey' => config('services.braintree.publicKey'),
	 'privateKey' => config('services.braintree.privateKey')
 ]);

$braintree_token = $gateway->ClientToken()->generate();

?>
<section id="card-payment-section">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
    </div>
    <input id="nonce" name="payment_method_nonce" type="hidden" />
    <button type="button" id="payment_btn" class="btn btn-primary btn-block">Make Payment</button>
</section>
    <!-- end braintree dropin-ui -->
<!-- Modal -->
<div class="modal fade" id="depositAmoutWallet" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="depositAmoutWallet" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="depositAmoutWallet">Amount</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
          <form action="{{route('user-deposit-in-wallet-via-paypal')}}" method="POST" id="deposit_amount">
              @csrf
              <input type="hidden" id="payment_method_nonce" name="payment_method_nonce" required>
              <div class="form-group">
                <input type="number" class="form-control" min="0" max="10000000" name="amount" required>
              </div>
              <button  type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
<script type="text/javascript">

    var form = document.querySelector('#checkout-form');
    var client_token = "{{ @$braintree_token }}";
    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      paypal: {
            flow: 'vault'
        }
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr)

        alert('error'+ createErr);
        return;
      }

      $(document).on('click','#payment_btn',function () {

         instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);

            // $("#payment_btn").show();            

            return;
          }else{
          // Add the nonce to the form and submit
          document.getElementById('payment_method_nonce').value = payload.nonce;
        
            // $("#payment_method_nonce").val(payload.nonce);

            $("#depositAmoutWallet").modal("show");          
          }
          
        });
      });

    });

     $(document).on('change','.payment_options',function(){
        if($(this).is(':checked',true) && $(this).val() == 'card')
        {
            $("#place_order").attr('disabled','disabled');
            $("#card-payment-section").show();
        } else {
            $("#place_order").removeAttr('disabled');
            $("#card-payment-section").hide();
        }
    });


</script>