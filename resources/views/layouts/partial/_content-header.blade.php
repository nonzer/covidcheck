<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ $title }}</h1>
    <ol class="breadcrumb">
        @isset($s_title)
            <li><a href="#"><i class="fa {{ $icon }}"></i> {{ $title }}</a></li>
            <li class="active">{{ $s_title }}</li>
        @else
            <li class="active"><i class="fa {{ $icon }}"></i> {{ $title }}</li>
        @endisset
    </ol>
</section>