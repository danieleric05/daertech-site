<section class="section cta" aria-labelledby="cta-t"><div class="container">
  <h2 id="cta-t">Parlons de votre projet</h2>
  <p>Décrivez-nous votre situation : nous revenons vers vous pour voir comment vous aider.</p>
  <div class="btn-row">
    <a class="btn btn-light" href="{{ route('contact') }}">Nous écrire</a>
    @if(!empty($settings['whatsapp']))<a class="btn btn-wa" href="https://wa.me/{{ $settings['whatsapp'] }}" rel="noopener noreferrer">Écrire sur WhatsApp</a>@endif
  </div>
</div></section>
