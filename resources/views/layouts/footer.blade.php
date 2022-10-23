  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0 text-center">
        Copyrights ©
        <script>
          document.write(new Date().getFullYear());
        </script>
        SFGHB, created by
        <a href="http://sfiloveinaction.org" target="_blank" class="footer-link fw-bolder">SFI ICT</a> All rights Reserved
      </div>
      {{-- <div>
        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>
        <a
          href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
          target="_blank"
          class="footer-link me-4"
          >Documentation</a
        >
        <a
          href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
          target="_blank"
          class="footer-link me-4"
          >Support</a
        >
      </div> --}}
    </div>
  </footer>
  <!-- / Footer -->

  {{-- Session Message --}}
  @if (session('message'))
      {{-- <div style="position: fixed; right: 10px; bottom: 20px" class="alert alert-success alert-dismissible fade show bottom-alert" id="bottomAlert" role="alert" style="background: #fff; color: #000">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div> --}}
      <div
        class="bs-toast toast fade show bg-danger"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
        style="position: fixed; right: 10px; bottom: 20px">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Notification</div>
          <small>Just now!</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          {{ session('message') }}
        </div>
      </div>
  @endif