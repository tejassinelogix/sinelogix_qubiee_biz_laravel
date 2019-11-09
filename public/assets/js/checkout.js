// Create a Stripe client.
//var stripe = Stripe('pk_test_6Fuq7NyjA1a2qh62S3jZf65i');
Stripe.setPublishedkey('pk_test_TYooMQauvdEDq54NiTphI7jx');

var $form = $('#checkout-form');

$form.submit(function(event){
  $('#charge-error').addClass('hidden');
  $form.find('button').prop('disabled', true);
  Stripe.card.createToken({
    number: $('#card-number').val(),
    cvc: $('#card-cvc').val(),
    exp_month: $('#card-expiry-month').val(),
    exp_year: $('#card-expiry-year').val(),
    name: $('#card-name')
  }, stripeResponseHandler);
  return false;
});

function stripeResponseHandler(status, response){
  if(response.error){
    $('#charge-error').removeClass('hidden');
    $('#charge-error').text(response.error.message);
    $form.find('button').prop('disabled', false);
  }
  else{
    var token = response.id;
    alert(token);
    $form.append($('<input type="hidden" name="stripeToken" />').val(token));

    $form.get(0).submit();
  }
}
