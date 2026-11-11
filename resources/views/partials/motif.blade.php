{{-- Schémas décoratifs des cartes de service (sans texte, sans chiffre) --}}
@php $m = in_array($name ?? '', ['conseil', 'web', 'mobile', 'marketing', 'formation', 'assistance'], true) ? $name : 'conseil'; @endphp
<svg viewBox="0 0 320 180" fill="none" aria-hidden="true" focusable="false">
@switch($m)
@case('web')
  <rect x="40" y="18" width="240" height="144" rx="12" fill="#fff" fill-opacity=".04" stroke="currentColor" stroke-opacity=".6" stroke-width="1.5"/>
  <path d="M40 44h240" stroke="currentColor" stroke-opacity=".35"/>
  <circle cx="56" cy="31" r="3" class="fr"/><circle cx="67" cy="31" r="3" class="fo"/><circle cx="78" cy="31" r="3" class="fb"/>
  <rect x="58" y="60" width="100" height="10" rx="5" fill="currentColor"/>
  <rect x="58" y="78" width="130" height="5" rx="2.5" fill="currentColor" opacity=".45"/>
  <rect x="58" y="90" width="90" height="5" rx="2.5" fill="currentColor" opacity=".45"/>
  <rect x="58" y="104" width="46" height="14" rx="7" fill="currentColor"/>
  <g transform="translate(232 86)"><path d="M0-32 27.7-16v32L0 32-27.7 16v-32z" fill="currentColor" fill-opacity=".16" stroke="currentColor" stroke-width="1.5"/><path d="M0-17 14.7-8.5v17L0 17-14.7 8.5v-17z" class="fo"/></g>
  <rect x="58" y="130" width="60" height="22" rx="6" fill="currentColor" opacity=".12"/>
  <rect x="130" y="130" width="60" height="22" rx="6" fill="currentColor" opacity=".12"/>
  <rect x="202" y="130" width="60" height="22" rx="6" fill="currentColor" opacity=".12"/>
@break
@case('mobile')
  <rect x="116" y="10" width="88" height="160" rx="16" fill="#fff" fill-opacity=".04" stroke="currentColor" stroke-opacity=".7" stroke-width="1.5"/>
  <rect x="146" y="17" width="28" height="5" rx="2.5" fill="currentColor" opacity=".4"/>
  <rect x="127" y="34" width="66" height="22" rx="7" fill="currentColor" opacity=".14"/><g transform="translate(139 45)"><path d="M0-6 5.2-3v6L0 6-5.2 3v-6z" class="fo"/></g><rect x="150" y="41" width="34" height="4" rx="2" fill="currentColor" opacity=".6"/><rect x="150" y="48" width="22" height="3" rx="1.5" fill="currentColor" opacity=".35"/>
  <rect x="127" y="62" width="66" height="22" rx="7" fill="currentColor" opacity=".14"/><g transform="translate(139 73)"><path d="M0-6 5.2-3v6L0 6-5.2 3v-6z" class="ft"/></g><rect x="150" y="69" width="34" height="4" rx="2" fill="currentColor" opacity=".6"/><rect x="150" y="76" width="22" height="3" rx="1.5" fill="currentColor" opacity=".35"/>
  <rect x="127" y="90" width="66" height="22" rx="7" fill="currentColor" opacity=".14"/><g transform="translate(139 101)"><path d="M0-6 5.2-3v6L0 6-5.2 3v-6z" class="fr"/></g><rect x="150" y="97" width="34" height="4" rx="2" fill="currentColor" opacity=".6"/><rect x="150" y="104" width="22" height="3" rx="1.5" fill="currentColor" opacity=".35"/>
  <rect x="127" y="120" width="66" height="26" rx="8" fill="currentColor" fill-opacity=".9"/>
  <path d="M126 152h68" stroke="currentColor" stroke-opacity=".3"/>
  <g transform="translate(138 161)"><path d="M0-5 4.3-2.5v5L0 5-4.3 2.5v-5z" class="fb"/></g><g transform="translate(160 161)"><path d="M0-5 4.3-2.5v5L0 5-4.3 2.5v-5z" class="ft"/></g><g transform="translate(182 161)"><path d="M0-5 4.3-2.5v5L0 5-4.3 2.5v-5z" class="fo"/></g>
  <g transform="translate(64 62)"><path d="M0-22 19-11v22L0 22-19 11v-22z" fill="currentColor" fill-opacity=".14" stroke="currentColor" stroke-width="1.5"/></g>
  <g transform="translate(262 120)"><path d="M0-28 24.2-14v28L0 28-24.2 14v-28z" fill="currentColor" fill-opacity=".14" stroke="currentColor" stroke-width="1.5"/><path d="M0-13 11.3-6.5v13L0 13-11.3 6.5v-13z" class="fb"/></g>
@break
@case('marketing')
  <path d="M30 150h260" stroke="currentColor" stroke-opacity=".4"/>
  <rect x="48" y="112" width="30" height="38" rx="6" fill="currentColor" opacity=".25"/>
  <rect x="96" y="92" width="30" height="58" rx="6" fill="currentColor" opacity=".35"/>
  <rect x="144" y="68" width="30" height="82" rx="6" fill="currentColor" opacity=".5"/>
  <rect x="192" y="44" width="30" height="106" rx="6" fill="currentColor" opacity=".7"/>
  <path d="M52 100 108 78l48-24 56-26 48-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="m248 14 12 8-14 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
  <g transform="translate(52 100)"><path d="M0-9 7.8-4.5v9L0 9-7.8 4.5v-9z" class="fb"/></g>
  <g transform="translate(108 78)"><path d="M0-9 7.8-4.5v9L0 9-7.8 4.5v-9z" class="ft"/></g>
  <g transform="translate(156 54)"><path d="M0-9 7.8-4.5v9L0 9-7.8 4.5v-9z" class="fo"/></g>
  <g transform="translate(264 62)"><path d="M0-24 20.8-12v24L0 24-20.8 12v-24z" fill="currentColor" fill-opacity=".14" stroke="currentColor" stroke-width="1.5"/><path d="M0-11 9.5-5.5v11L0 11-9.5 5.5v-11z" class="fr"/></g>
@break
@case('formation')
  <path d="M30 156h260" stroke="currentColor" stroke-opacity=".4"/>
  <rect x="46" y="124" width="58" height="32" rx="6" fill="currentColor" opacity=".25"/>
  <rect x="108" y="98" width="58" height="58" rx="6" fill="currentColor" opacity=".38"/>
  <rect x="170" y="72" width="58" height="84" rx="6" fill="currentColor" opacity=".55"/>
  <rect x="232" y="46" width="58" height="110" rx="6" fill="currentColor" opacity=".78"/>
  <path d="M60 112c30 0 34-26 64-26s34-26 64-26 34-26 70-26" stroke="currentColor" stroke-width="2" stroke-dasharray="3 7" stroke-linecap="round" opacity=".8"/>
  <g transform="translate(262 22)"><path d="M0-17 14.7-8.5v17L0 17-14.7 8.5v-17z" class="fo"/><path d="m-6 0 4.5 4.5 8-9" stroke="#060912" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></g>
  <g transform="translate(75 100)"><path d="M0-9 7.8-4.5v9L0 9-7.8 4.5v-9z" class="fb"/></g>
  <g transform="translate(138 74)"><path d="M0-9 7.8-4.5v9L0 9-7.8 4.5v-9z" class="ft"/></g>
@break
@case('assistance')
  <rect x="34" y="22" width="156" height="58" rx="14" fill="#fff" fill-opacity=".05" stroke="currentColor" stroke-opacity=".7" stroke-width="1.5"/>
  <path d="m58 80-4 16 20-16" fill="#0b1220" stroke="currentColor" stroke-opacity=".7" stroke-width="1.5" stroke-linejoin="round"/>
  <rect x="52" y="38" width="96" height="6" rx="3" fill="currentColor" opacity=".7"/><rect x="52" y="52" width="120" height="5" rx="2.5" fill="currentColor" opacity=".4"/><rect x="52" y="63" width="70" height="5" rx="2.5" fill="currentColor" opacity=".4"/>
  <rect x="130" y="104" width="156" height="52" rx="14" fill="currentColor" fill-opacity=".9"/>
  <path d="m262 156 4 14-18-14" fill="currentColor"/>
  <rect x="148" y="120" width="100" height="6" rx="3" fill="#060912" opacity=".75"/><rect x="148" y="134" width="70" height="5" rx="2.5" fill="#060912" opacity=".5"/>
  <g transform="translate(264 38)"><path d="M0-24 20.8-12v24L0 24-20.8 12v-24z" fill="currentColor" fill-opacity=".14" stroke="currentColor" stroke-width="1.5"/><path d="M0-11 9.5-5.5v11L0 11-9.5 5.5v-11z" class="fo"/></g>
  <g transform="translate(62 138)"><path d="M0-17 14.7-8.5v17L0 17-14.7 8.5v-17z" class="fb"/><path d="m-6 0 4.5 4.5 8-9" stroke="#060912" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></g>
@break
@default
  <path d="M30 140C90 140 80 60 150 60s90 70 140-20" stroke="currentColor" stroke-width="2" stroke-dasharray="3 7" stroke-linecap="round" opacity=".75"/>
  <g transform="translate(30 140)"><path d="M0-16 13.9-8v16L0 16-13.9 8v-16z" class="fb"/></g>
  <g transform="translate(150 60)"><path d="M0-20 17.3-10v20L0 20-17.3 10v-20z" class="ft"/></g>
  <g transform="translate(290 40)"><path d="M0-26 22.5-13v26L0 26-22.5 13v-26z" fill="currentColor" fill-opacity=".18" stroke="currentColor" stroke-width="2"/><path d="m-8 0 6 6 11-12" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></g>
  <rect x="12" y="162" width="36" height="5" rx="2.5" fill="currentColor" opacity=".4"/><rect x="132" y="86" width="36" height="5" rx="2.5" fill="currentColor" opacity=".4"/><rect x="236" y="76" width="48" height="5" rx="2.5" fill="currentColor" opacity=".4"/>
  <g transform="translate(92 112)"><path d="M0-8 6.9-4v8L0 8-6.9 4v-8z" class="fo"/></g>
  <g transform="translate(216 98)"><path d="M0-8 6.9-4v8L0 8-6.9 4v-8z" class="fr"/></g>
@endswitch
</svg>
