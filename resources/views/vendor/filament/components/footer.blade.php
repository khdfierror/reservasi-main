{{ \Filament\Facades\Filament::renderHook('footer.before') }}

<div class="filament-footer flex items-center justify-center">
    {{ \Filament\Facades\Filament::renderHook('footer.start') }}
    <div class="text-sm mx-3 font-medium">
        <span>&copy;</span>
        <span>{{ date('Y') }}</span>
        <span>All Right Reserved.</span>
    </div>

    {{ \Filament\Facades\Filament::renderHook('footer.end') }}
</div>

{{ \Filament\Facades\Filament::renderHook('footer.after') }}
