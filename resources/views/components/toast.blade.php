@if (Session::has('message'))
    <div class="bs-toast toast toast-placement-ex m-2 animate__animated animate__fadeInRight {{ Session::get('color') }} top-0 end-0 show" role="alert"
        aria-live="assertive" aria-atomic="true" data-delay="2000" id="myToast">
        <div class="toast-header">
            <i class="fas fa-bell me-2"></i>
            <div class="me-auto fw-semibold">System Clean</div>
            <small>Justo Ahora</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{ Session::get('message') }}</div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var myToast = document.getElementById('myToast');
                var bsToast = new bootstrap.Toast(myToast);
                bsToast.hide();
            }, 5000);
        });
    </script>
@endif
