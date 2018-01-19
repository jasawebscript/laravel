@push('body-scripts')
    <script>
        jqWait(function() {
            var validationVisible = false;
            var validationRules = {
                email: function (input) {
                    return /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i.test(input);
                },
                name: function (input) {
                    return input.length >= 2 && input.length <= 35;
                },
                country: function (input) {
                    return input.length === 2;
                },
                birthday: function (input) {
                    return input.length > 0;
                }
            };

            $('[data-validate]').each(function () {
                var input = $(this), rule = input.attr('data-validate'), fieldValid = false;
                var form = input.closest('form');

                input.keyup(test);
                input.change(test);

                form.submit(function (event) {
                    if(!fieldValid) {
                        event.preventDefault();
                        validationVisible = true;
                    }
                    updateValidation();
                });

                function test() {
                    if(typeof validationRules[rule] === 'function') {
                        fieldValid = validationRules[rule](input.val());
                    }
                    updateValidation();
                }

                function updateValidation() {
                    var group = input.closest('.form-group');
                    if(!validationVisible || fieldValid) {
                        group.removeClass('has-error');
                    } else {
                        group.addClass('has-error');
                    }
                }
            });
        });
    </script>
@endpush