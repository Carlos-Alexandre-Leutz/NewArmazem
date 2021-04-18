var AdminArmazem = {};

export default class AdminApp {

  /**
   * What happens when page loads.
   */
  constructor() {

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#target-' + $(input).prop('id')).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }

    $('.change-banner-image').change(function () {
      readURL(this);
    });

    jQuery(function () {
      $(document).on('change', '.banner-order', function () {

        var $current = $(this);
        var value = $current.val();

        $('.banner-order').removeClass('is-invalid');

        var duplicates = [];

        $('.banner-order').each(function () {
          duplicates[$(this).prop('id')] = [];
        });

        $('.banner-order').each(function () {
          var value = $(this).val();
          var id = $(this).prop('id');

          $('.banner-order').each(function () {
            var _value = $(this).val();
            var _id = $(this).prop('id');
            if (value === _value) {
              if (id !== _id)
                duplicates[id].push(_id);
            }
          });
        });

        Object.keys(duplicates).forEach(function (key) {
          var duplicateOrder = duplicates[key];
          $.each(duplicateOrder, function (key, value) {
            $('#' + value).addClass('is-invalid');
          });
        });
      })
    });
  }
}