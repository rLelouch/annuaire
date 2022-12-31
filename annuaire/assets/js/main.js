// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()

/*let params = (new URL(document.location)).searchParams;
let page = parseInt(params.get('page'));
$('.pagination > .page-item')[page].addClass('active');
console.log('page');*/

$('.pagination >.page-item > .page-link > a').click((e) => {
  console.log('page');
  e.target.addClass('active');
});
