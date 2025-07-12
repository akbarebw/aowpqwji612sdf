<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="{!! route('home') !!}"><i class="fa fa-home"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title font-small-4">Beranda</span></a>
</li>

<li class="{{ Request::is('profil*') ? 'active' : '' }}">
    <a href="{!! route('profil') !!}"><i class="fa fa-user"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Profil</span></a>
</li>



{{--@canany(['penilaianPelaksanas.index','typeSafeguards.index'])--}}
<li class="mm-divider">
    <span data-i18n="nav.category.layouts">--Mater Data</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>

{{--@endcanany--}}

@canany(['agenda.index','posts.index','pages.index','galeris.index'])
<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Website</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
<li class="nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Pengaturan Website</span></a>
    <ul class="menu-content  m-0-1">
        @can('posts.index')

        <li class="{{ Request::is('posts*') ? 'active' : '' }}">
            <a href="{{ route('posts.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Post</span></a>
        </li>
        @endcan
        @can('postCategories.index')
        <li class="{{ Request::is('postCategories*') ? 'active' : '' }}">
            <a href="{{ route('postCategories.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Post Category</span></a>
        </li>
        @endcan

        @can('pages.index')
        <li class="{{ Request::is('pages*') ? 'active' : '' }}">
            <a href="{{ route('pages.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Page</span></a>
        </li>
        @endcan
        @can('pageCategories.index')
        <li class="{{ Request::is('pageCategories*') ? 'active' : '' }}">
            <a href="{{ route('pageCategories.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Page Category</span></a>
        </li>
        @endcan

        @can('agendaCategories.index')
        <li class="{{ Request::is('agendaCategories*') ? 'active' : '' }}">
            <a href="{{ route('agendaCategories.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Agenda Category</span></a>
        </li>
        @endcan

        @can('agendas.index')
        <li class="{{ Request::is('agendas*') ? 'active' : '' }}">
            <a href="{{ route('agendas.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Agenda</span></a>
        </li>
        @endcan

        @can('galeris.index')
        <li class="{{ Request::is('galeris*') ? 'active' : '' }}">
            <a href="{{ route('galeris.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Galeri</span></a>
        </li>
        @endcan

        @can('faqs.index')
        <li class="{{ Request::is('faqs*') ? 'active' : '' }}">
            <a href="{{ route('faqs.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Faq</span></a>
        </li>
        @endcan

        @can('faqCategories.index')
        <li class="{{ Request::is('faqCategories*') ? 'active' : '' }}">
            <a href="{{ route('faqCategories.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Faq Category</span></a>
        </li>
        @endcan

        @can('files.index')
        <li class="{{ Request::is('files*') ? 'active' : '' }}">
            <a href="{{ route('files.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Resource</span></a>
        </li>
        @endcan

        @can('fileCategories.index')
        <li class="{{ Request::is('fileCategories*') ? 'active' : '' }}">
            <a href="{{ route('fileCategories.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Resource Category</span></a>
        </li>
        @endcan

        @can('panduans.index')
        <li class="{{ Request::is('panduans*') ? 'active' : '' }}">
            <a href="{{ route('panduans.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title"> Panduan</span></a>
        </li>
        @endcan

    </ul>
</li>
@endcanany

@canany(['users.index','roles.index','permissions.index'])
<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Pengaturan</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
<li class="nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Pengaturan User</span></a>
    <ul class="menu-content m-0-1">
        @can('users.index')
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Akun Pengguna</span></a>
        </li>
        @endcan

        {{-- @role('ADM')--}}
        {{-- <li class="{{ Request::is('verifikasi-data-umum') ? 'active' : '' }}">--}}
        {{-- <a href="{!! route('verifikasiDataUmum') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Verifikasi Data Umum</span></a>--}}
        {{-- </li>--}}
        {{-- @endrole--}}

        @can('permissions.index')
        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Permissions</span></a>
        </li>
        @endcan

        @can('roles.index')
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Roles</span></a>
        </li>
        @endcan

    </ul>
</li>
@endcanany


{{--@can('penilaianDetailSafeguards.index')--}}
{{--<li class="{{ Request::is('penilaianDetailSafeguards*') ? 'active' : '' }}">--}}
{{-- <a href="{{ route('penilaianDetailSafeguards.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Penilaian Detail Safeguards</span></a>--}}
{{--</li>--}}
{{--@endcan--}}

{{--@can('units.index')--}}
{{--<li class="{{ Request::is('units*') ? 'active' : '' }}">--}}
{{-- <a href="{{ route('units.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Units</span></a>--}}
{{--</li>--}}
{{--@endcan--}}


{{--@can('penilaianDetailStatuses.index')--}}
{{--<li class="{{ Request::is('penilaianDetailStatuses*') ? 'active' : '' }}">--}}
{{-- <a href="{{ route('penilaianDetailStatuses.index') }}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Penilaian Detail Statuses</span></a>--}}
{{--</li>--}}
{{--@endcan--}}