@php $c = strip_tags((string) ($html ?? ''), '<p><br><strong><em><ul><ol><li><h2><h3>'); $c = preg_replace('/<(\w+)[\s\/][^>]*>/', '<$1>', $c); @endphp
<div class="prose">{!! $c !!}</div>
