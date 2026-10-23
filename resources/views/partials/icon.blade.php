@php $p = [
 'conseil' => 'M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.3 1 2.3h6c0-1 .4-1.8 1-2.3A7 7 0 0 0 12 2z',
 'web' => 'M3 4h18v14H3zM8 21h8M12 18v3',
 'mobile' => 'M7 2h10v20H7zM11 18h2',
 'marketing' => 'M3 3v18h18M7 15l4-5 3 3 5-7',
 'formation' => 'M2 9l10-5 10 5-10 5zM6 11v5c3 2 9 2 12 0v-5',
 'assistance' => 'M4 13v-1a8 8 0 0 1 16 0v1M4 13h3v5H4zM17 13h3v5h-3zM20 18c0 2-2 3-5 3',
]; @endphp
<span class="icon i-{{ isset($p[$name ?? '']) ? $name : 'conseil' }}" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="{{ $p[$name ?? ''] ?? $p['conseil'] }}"/></svg></span>
