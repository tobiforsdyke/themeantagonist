jQuery(document).ready(function($) {

  // Listener for a click on link item (a) within the .open-search class and performs the function
  $(document).on('click','.open-search a', function(e){
    e.preventDefault();
    // console.log('CLICKED');

    $('.search-form-container').slideToggle(100);
  });

});
