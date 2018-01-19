<div class="form-group validation-g-recaptcha-response">
    <div class="g-recaptcha" data-sitekey={{ env('RECAPTCHA_SITEKEY') }}></div>
    <script type="text/javascript"
            src="https://www.google.com/recaptcha/api.js?hl={{ $currentLanguage }}">
    </script>
    <span class="validation-error"></span>
</div>