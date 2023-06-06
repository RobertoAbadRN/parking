<div class="sidebar-panel">
    <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
        <!-- Sidebar Panel Header -->
        

        <!-- Sidebar Panel Body -->
        <div class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6" x-data="{ expandedItem: null }" x-init="$el._x_simplebar = new SimpleBar($el);">
            @foreach ($sidebarMenu['items'] as $key => $menuItems)
                @if ($key > 0)
                    <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                @endif
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    @foreach ($menuItems as $keyMenu => $menu)
                        @if (isset($menu['submenu']))
                            <li x-data="accordionItem('{{ $keyMenu }}')">
                                <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' :
                                    'text-slate-600 dark:text-navy-200'"
                                    @click="expanded = !expanded"
                                    class="flex items-center justify-between py-2 text-xs+ tracking-wide  outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800  dark:hover:text-navy-50"
                                    href="javascript:void(0);">
                                    <span>{{ $menu['title'] }}</span>
                                    <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                
                        @else
                            <li @if ($menu['route_name'] === $pageName) x-init="$el.scrollIntoView({block:'center'});" @endif>
                                <a href="{{ route($menu['route_name']) }}"
                                    class="flex text-xs+ py-2  tracking-wide outline-none transition-colors duration-300 ease-in-out {{ $menu['route_name'] === $pageName ? 'text-primary dark:text-accent-light font-medium' : 'text-slate-600  hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50' }}">
                                    {{ $menu['title'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
</div>
