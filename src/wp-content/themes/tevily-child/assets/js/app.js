// import { DisplayLabel } from './components/DisplayLabel';

let Main = {
  init: async function () {

    // initialize demo javascript component - async/await invokes some 
    //  level of babel transformation 
    const displayLabel = new DisplayLabel();
    await displayLabel.init();

  }
};


console.log($('.more-link'));
// Main.init();



$('#currency_selector select').on('change', function () {
  const currency = $(this).val();
  console.log(currency);

  $.ajax({
    url: "/wp-admin/admin-ajax.php",
    method: 'POST',
    data: {
      action: 'change_currency',
      currency: currency,
    },
    success: function (response) {
      if (response.success) {
        location.reload();
      } else {
        alert(response.data.message);
      }
    },
    error: function () {
      alert('Error changing currency. Please try again.');
    },
  });
});