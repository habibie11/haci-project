@if ($_is_register_with_google || $_is_register_with_facebook || $_is_register_with_twitter ||
$_is_register_with_github)
<div class="text-center mt-4 mb-3">
    <div class="text-job text-muted">Atau Mendaftar Dengan</div>
</div>

<div class="row">
    <div class="col-md-12" align="center">
        @if ($_is_register_with_google)
        <a href="{{ route('social-register', ['google']) }}" class="btn btn-social-icon btn-facebook mr-1"
            style="background-color: rgba(220,20,20,1)">
            <i class="fab fa-google"></i>
        </a>
        @endif
        @if ($_is_register_with_facebook)
        <a href="{{ route('social-register', ['facebook']) }}" class="btn btn-social-icon btn-facebook mr-1">
            <i class="fab fa-facebook-f"></i>
        </a>
        @endif
        @if ($_is_register_with_twitter)
        <a href="{{ route('social-register', ['twitter']) }}" class="btn btn-social-icon btn-twitter mr-1">
            <i class="fab fa-twitter"></i>
        </a>
        @endif
        @if ($_is_register_with_github)
        <a href="{{ route('social-register', ['github']) }}" class="btn btn-social-icon btn-github mr-1">
            <i class="fab fa-github"></i>
        </a>
        @endif
    </div>
</div>
@endif