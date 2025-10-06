<footer class="footer border-top pt-5 mt-5">
  <div class="container">
    <div class="row g-4 align-items-start">
      {{-- Enlaces (izquierda) --}}
      <div class="col-lg-7">
        <div class="row">
          <div class="col-6 col-md-4">
            <ul class="list-unstyled small mb-0">
              <li><a class="link-body-emphasis" href="{{ route('home') }}">Inicio</a></li>
              <li><a class="link-body-emphasis" href="{{ route('productos.index') }}">Comprar todo</a></li>
              <li><a class="link-body-emphasis" href="/nosotros">Nosotros</a></li>
              <li><a class="link-body-emphasis" href="/productos">Los productos</a></li>
              <li><a class="link-body-emphasis" href="/contacto">Contacto</a></li>
            </ul>
          </div>

          <div class="col-6 col-md-4">
            <ul class="list-unstyled small mb-0">
              <li><a class="link-body-emphasis" href="/faq">FAQ</a></li>
              <li><a class="link-body-emphasis" href="/envios">Envío y devoluciones</a></li>
              <li><a class="link-body-emphasis" href="/politica">Política de la tienda</a></li>
              <li><a class="link-body-emphasis" href="/pagos">Métodos de pago</a></li>
              <li><a class="link-body-emphasis" href="/distribuidores">Distribuidores</a></li>
            </ul>
          </div>

          <div class="col-12 col-md-4">
            <ul class="list-unstyled small mb-0">
              <li><a class="link-body-emphasis" href="#" target="_blank" rel="noopener">Facebook</a></li>
              <li><a class="link-body-emphasis" href="#" target="_blank" rel="noopener">Instagram</a></li>
              <li><a class="link-body-emphasis" href="#" target="_blank" rel="noopener">Twitter</a></li>
              <li><a class="link-body-emphasis" href="#" target="_blank" rel="noopener">Pinterest</a></li>
            </ul>
          </div>
        </div>
      </div>

      {{-- Mapa (derecha) --}}
      <div class="col-lg-5">
        <div class="ratio ratio-4x3 rounded overflow-hidden shadow-sm">
          <iframe
            src="https://maps.google.com/maps?q=Jir%C3%B3n%20Ica%20646%20Lima&z=16&output=embed"
            style="border:0;" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <address class="small text-muted mt-2 mb-0">Jirón Ica 646, Lima, Perú</address>
      </div>
    </div>

    <hr class="my-4">

    {{-- Social + correo (centro) --}}
    <div class="text-center pb-4">
      <div class="d-flex justify-content-center gap-3 mb-2">
        <a class="text-dark" href="#" aria-label="Facebook"><i class="bi bi-facebook fs-5"></i></a>
        <a class="text-dark" href="#" aria-label="Instagram"><i class="bi bi-instagram fs-5"></i></a>
        <a class="text-dark" href="#" aria-label="Twitter"><i class="bi bi-twitter-x fs-5"></i></a>
        <a class="text-dark" href="#" aria-label="Pinterest"><i class="bi bi-pinterest fs-5"></i></a>
      </div>
      <a href="mailto:OficialCasadelasJoyas@casadelasjoyas.com"
         class="fw-semibold text-decoration-none">
        OficialCasadelasJoyas@casadelasjoyas.com
      </a>
    </div>
  </div>
</footer>