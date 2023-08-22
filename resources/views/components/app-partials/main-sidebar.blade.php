<div class="main-sidebar">
    <div
        class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
        <!-- Application Logo -->
        <div class="flex pt-4">
            <a href="/">
                <img class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                    src="{{ asset('favicon.png') }}" alt="logo" />
            </a>
        </div>

        <!-- Main Sections Links -->
        <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
            <!-- Dashobards -->
            <a href="{{ route('dashboards/crm-analytics') }}"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'dashboards' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                x-tooltip.placement.right="'Dashboards'">
                <!-- Change the fill color to blue for the active icon -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4.18753 11.3788C4.03002 11.759 4 11.9533 4 12V20.0018C4 20.5529 4.44652 21 5 21H8V15C8 13.8954 8.89543 13 10 13H14C15.1046 13 16 13.8954 16 15V21H19C19.5535 21 20 20.5529 20 20.0018V12C20 11.9533 19.97 11.759 19.8125 11.3788C19.6662 11.0256 19.4443 10.5926 19.1547 10.1025C18.5764 9.1238 17.765 7.97999 16.8568 6.89018C15.9465 5.79788 14.9639 4.78969 14.0502 4.06454C13.5935 3.70204 13.1736 3.42608 12.8055 3.2444C12.429 3.05862 12.1641 3 12 3C11.8359 3 11.571 3.05862 11.1945 3.2444C10.8264 3.42608 10.4065 3.70204 9.94978 4.06454C9.03609 4.78969 8.05348 5.79788 7.14322 6.89018C6.23505 7.97999 5.42361 9.1238 4.8453 10.1025C4.55568 10.5926 4.33385 11.0256 4.18753 11.3788ZM10.3094 1.45091C10.8353 1.19138 11.4141 1 12 1C12.5859 1 13.1647 1.19138 13.6906 1.45091C14.2248 1.71454 14.7659 2.07921 15.2935 2.49796C16.3486 3.33531 17.4285 4.45212 18.3932 5.60982C19.3601 6.77001 20.2361 8.0012 20.8766 9.08502C21.1963 9.62614 21.4667 10.1462 21.6602 10.6134C21.8425 11.0535 22 11.5467 22 12V20.0018C22 21.6599 20.6557 23 19 23H16C14.8954 23 14 22.1046 14 21V15H10V21C10 22.1046 9.10457 23 8 23H5C3.34434 23 2 21.6599 2 20.0018V12C2 11.5467 2.15748 11.0535 2.33982 10.6134C2.53334 10.1462 2.80369 9.62614 3.12345 9.08502C3.76389 8.0012 4.63995 6.77001 5.60678 5.60982C6.57152 4.45212 7.65141 3.33531 8.70647 2.49796C9.2341 2.07921 9.77521 1.71454 10.3094 1.45091Z"
                        fill="{{ $routePrefix === 'dashboards' ? '#007BFF' : '#F0AD4E' }}" />
                </svg>
            </a>



            <!-- properties -->
            @can('properties')
                <a href="{{ route('properties') }}"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'apps' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                    x-tooltip.placement.right="'Properties'">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.0036 14.0035C14.4889 14.0035 16.5036 11.9887 16.5036 9.50347C16.5036 7.01819 14.4889 5.00347 12.0036 5.00347C9.51831 5.00347 7.50359 7.01819 7.50359 9.50347C7.50359 11.9887 9.51831 14.0035 12.0036 14.0035ZM12.0036 12.0071C10.6209 12.0071 9.5 10.8862 9.5 9.50347C9.5 8.12077 10.6209 6.99988 12.0036 6.99988C13.3863 6.99988 14.5072 8.12077 14.5072 9.50347C14.5072 10.8862 13.3863 12.0071 12.0036 12.0071Z"
                            fill="{{ $routePrefix === 'properties' ? '#007BFF' : '#F0AD4E' }}" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.272 11.5818C22.5649 5.78816 18.0052 0.00354004 12 0.00354004C5.99649 0.00354004 1.43639 5.7961 2.72816 11.5825C3.72523 16.2821 7.7572 20.8465 10.1636 23.2269C11.1942 24.2463 12.8058 24.2463 13.8364 23.2269C16.2429 20.8464 20.2752 16.2816 21.272 11.5818ZM12 2.00354C16.7124 2.00354 20.3368 6.58981 19.32 11.1462C18.8316 13.3355 17.7359 15.3015 16.4501 17.119C15.1064 19.0184 13.5829 20.6644 12.4299 21.805C12.1786 22.0536 11.8214 22.0536 11.5701 21.805C10.4171 20.6645 8.89379 19.0186 7.55009 17.1193C6.26419 15.3017 5.16886 13.3361 4.68011 11.1467C3.66438 6.59682 7.29012 2.00354 12 2.00354Z"
                            fill="{{ $routePrefix === 'properties' ? '#007BFF' : '#F0AD4E' }}" />
                    </svg>
                </a>
            @endcan




            @can('users')
                <a href="{{ route('users') }}"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'layouts' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-blue-500 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                    x-tooltip.placement.right="'Users'">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.2222 6C6.62671 6 5.33331 7.2934 5.33331 8.88889C5.33331 10.4844 6.62672 11.7778 8.22222 11.7778C9.81771 11.7778 11.1111 10.4844 11.1111 8.88889C11.1111 7.2934 9.81769 6 8.2222 6ZM11.4656 12.547C12.475 11.6514 13.1111 10.3444 13.1111 8.88889C13.1111 6.18883 10.9223 4 8.2222 4C5.52214 4 3.33331 6.18883 3.33331 8.88889C3.33331 10.3444 3.96942 11.6514 4.9788 12.547C4.29602 12.8902 3.66582 13.3426 3.11534 13.8931C2.87121 14.1372 2.64632 14.3971 2.44169 14.6703C1.98306 15.2826 1.7671 15.965 1.80513 16.6537C1.84257 17.3318 2.1215 17.9389 2.52026 18.429C3.30495 19.3935 4.62067 20 6 20L10.4444 20C11.8238 20 13.1395 19.3935 13.9242 18.429C14.3229 17.9389 14.6019 17.3318 14.6393 16.6537C14.6773 15.965 14.4614 15.2826 14.0028 14.6703C13.7981 14.3971 13.5732 14.1372 13.3291 13.8931C12.7786 13.3426 12.1484 12.8902 11.4656 12.547ZM8.22222 13.7778C6.8372 13.7778 5.50891 14.328 4.52955 15.3073C4.35296 15.4839 4.19036 15.6718 4.04244 15.8693C3.83887 16.1411 3.79234 16.3669 3.80208 16.5434C3.81241 16.7305 3.89153 16.9454 4.07166 17.1668C4.44475 17.6254 5.1702 18 6 18L10.4444 18C11.2743 18 11.9997 17.6254 12.3728 17.1668C12.5529 16.9454 12.632 16.7305 12.6424 16.5434C12.6521 16.3669 12.6056 16.1411 12.402 15.8693C12.2541 15.6718 12.0915 15.4839 11.9149 15.3073C10.9355 14.328 9.60724 13.7778 8.22222 13.7778ZM18.5 8C19.0523 8 19.5 8.44772 19.5 9V10.5H21C21.5523 10.5 22 10.9477 22 11.5C22 12.0523 21.5523 12.5 21 12.5H19.5V14C19.5 14.5523 19.0523 15 18.5 15C17.9477 15 17.5 14.5523 17.5 14V12.5H16C15.4477 12.5 15 12.0523 15 11.5C15 10.9477 15.4477 10.5 16 10.5H17.5V9C17.5 8.44772 17.9477 8 18.5 8Z"
                            fill="{{ $routePrefix === 'users' ? '#007BFF' : '#F0AD4E' }}" />
                    </svg>
                </a>
            @endcan



            @can('recidents')
                <a href="{{ route('recidents') }}"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'layouts' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                    x-tooltip.placement.right="'Residents'">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.18936 3.44053C6.2221 2.96968 7.38648 2.87283 8.48282 3.16659C9.01628 3.30953 9.33287 3.85787 9.18993 4.39133C9.04698 4.9248 8.49865 5.24138 7.96518 5.09844C7.31735 4.92485 6.6293 4.98208 6.01905 5.26031C5.40879 5.53854 4.91436 6.02043 4.62055 6.62334C4.32674 7.22624 4.25186 7.91259 4.40874 8.56467C4.56563 9.21675 4.94452 9.79392 5.48042 10.1972C5.77115 10.416 5.92011 10.7754 5.86935 11.1357C5.8186 11.496 5.57614 11.8003 5.23628 11.9303C4.55694 12.19 3.93286 12.5913 3.40869 13.1154C3.23209 13.292 3.06949 13.4799 2.92157 13.6774C2.61334 14.0889 2.63344 14.4336 2.79565 14.7423C2.98719 15.1068 3.42732 15.4847 4.04987 15.6806C4.5767 15.8463 4.86944 16.4077 4.70371 16.9345C4.53799 17.4614 3.97656 17.7541 3.44972 17.5884C2.42792 17.267 1.50917 16.5936 1.02521 15.6727C0.511928 14.6959 0.539903 13.521 1.32082 12.4784C1.52546 12.2052 1.75034 11.9453 1.99447 11.7012C2.37088 11.3248 2.78457 10.9942 3.22685 10.7131C2.87086 10.2101 2.61052 9.64053 2.46424 9.03252C2.19873 7.929 2.32545 6.76749 2.82267 5.74719C3.31989 4.72688 4.15663 3.91138 5.18936 3.44053ZM17.9807 5.26031C17.3704 4.98208 16.6824 4.92485 16.0345 5.09844C15.5011 5.24138 14.9527 4.9248 14.8098 4.39133C14.6668 3.85787 14.9834 3.30953 15.5169 3.16659C16.6132 2.87283 17.7776 2.96968 18.8103 3.44053C19.8431 3.91138 20.6798 4.72688 21.177 5.74719C21.6742 6.76749 21.801 7.929 21.5355 9.03252C21.3892 9.64053 21.1288 10.2101 20.7728 10.7131C21.2151 10.9942 21.6288 11.3248 22.0052 11.7012C22.2494 11.9453 22.4742 12.2052 22.6789 12.4784C23.4598 13.521 23.4878 14.6959 22.9745 15.6727C22.4905 16.5936 21.5718 17.267 20.55 17.5884C20.0231 17.7541 19.4617 17.4614 19.296 16.9345C19.1303 16.4077 19.423 15.8463 19.9498 15.6806C20.5724 15.4847 21.0125 15.1068 21.2041 14.7423C21.3663 14.4336 21.3864 14.0889 21.0781 13.6774C20.9302 13.4799 20.7676 13.292 20.591 13.1154C20.0668 12.5913 19.4428 12.19 18.7634 11.9303C18.4236 11.8003 18.1811 11.496 18.1304 11.1357C18.0796 10.7754 18.2285 10.416 18.5193 10.1972C19.0552 9.79392 19.4341 9.21675 19.591 8.56467C19.7478 7.91259 19.673 7.22624 19.3792 6.62334C19.0853 6.02043 18.5909 5.53854 17.9807 5.26031ZM12 7C10.4045 7 9.11109 8.2934 9.11109 9.88889C9.11109 11.4844 10.4045 12.7778 12 12.7778C13.5955 12.7778 14.8889 11.4844 14.8889 9.88889C14.8889 8.2934 13.5955 7 12 7ZM15.2434 13.5471C16.2528 12.6515 16.8889 11.3444 16.8889 9.88889C16.8889 7.18883 14.7 5 12 5C9.29992 5 7.11109 7.18883 7.11109 9.88889C7.11109 11.3444 7.7472 12.6515 8.75659 13.5471C8.07381 13.8902 7.4436 14.3427 6.89312 14.8932C6.64899 15.1373 6.4241 15.3972 6.21947 15.6704C5.76084 16.2826 5.54487 16.9651 5.5829 17.6538C5.62035 18.3319 5.89927 18.939 6.29803 19.4291C7.08272 20.3936 8.39844 21.0001 9.77778 21.0001H14.2222C15.6016 21.0001 16.9173 20.3936 17.702 19.4291C18.1007 18.939 18.3797 18.3319 18.4171 17.6538C18.4551 16.9651 18.2392 16.2826 17.7805 15.6704C17.5759 15.3972 17.351 15.1373 17.1069 14.8932C16.5564 14.3427 15.9262 13.8902 15.2434 13.5471ZM12 14.7778C10.615 14.7778 9.28669 15.328 8.30733 16.3074C8.13074 16.484 7.96814 16.6719 7.82021 16.8694C7.61665 17.1411 7.57012 17.367 7.57986 17.5435C7.59019 17.7306 7.66931 17.9455 7.84944 18.1669C8.22253 18.6255 8.94797 19.0001 9.77778 19.0001H14.2222C15.052 19.0001 15.7775 18.6255 16.1506 18.1669C16.3307 17.9455 16.4098 17.7306 16.4201 17.5435C16.4299 17.367 16.3834 17.1411 16.1798 16.8694C16.0319 16.6719 15.8693 16.484 15.6927 16.3074C14.7133 15.328 13.385 14.7778 12 14.7778Z"
                            fill="{{ $routePrefix === 'recidents' ? '#007BFF' : '#F0AD4E' }}" />
                    </svg>

                </a>
            @endcan



            @can('vehicles')
                <a href="{{ route('vehicles') }}"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'forms' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                    x-tooltip.placement.right="'Vehicles'">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.90255 9.3983L2.8906 9.40627C2.3342 9.7772 2 10.4017 2 11.0704V19C2 19.5523 2.44772 20 3 20H4C4.55228 20 5 19.5523 5 19V18H19V19C19 19.5523 19.4477 20 20 20H21C21.5523 20 22 19.5523 22 19V11.0704C22 10.4017 21.6658 9.7772 21.1094 9.40627L21.0974 9.3983C21.4619 9.1878 21.792 8.98103 21.8561 8.88889C22.0108 8.66667 22.0819 8 21.8561 8H20L18.8292 5.65836C18.321 4.64201 17.2822 4 16.1459 4H7.8541C6.71779 4 5.679 4.64201 5.17082 5.65836L4 8H2.14388C1.91814 8 1.9892 8.66667 2.14388 8.88889C2.20802 8.98103 2.5381 9.1878 2.90255 9.3983ZM6.10196 6.05882L4.39216 9.26471C4.21453 9.59776 4.45587 10 4.83333 10H19.1667C19.5441 10 19.7855 9.59776 19.6078 9.26471L17.898 6.05882C17.5505 5.4071 16.872 5 16.1333 5H7.86667C7.12805 5 6.44955 5.4071 6.10196 6.05882ZM3 13.0799V11.8705C3 11.4846 3.41861 11.2442 3.75194 11.4386L7.09077 13.3863C7.5509 13.6547 7.32817 14.3607 6.79731 14.3164L3.91695 14.0764C3.39866 14.0332 3 13.6 3 13.0799ZM21 11.8705V13.0799C21 13.6 20.6013 14.0332 20.083 14.0764L17.2027 14.3164C16.6718 14.3607 16.4491 13.6547 16.9092 13.3863L20.2481 11.4386C20.5814 11.2442 21 11.4846 21 11.8705Z"
                            fill="{{ $routePrefix === 'vehicles' ? '#007BFF' : '#F0AD4E' }}" />
                    </svg>
                </a>
            @endcan



            <!-- visitors_pass -->
            @can('visitors')
                <a href="{{ route('visitors_pass') }}"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'components' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                    x-tooltip.placement.right="'visitors_pass'">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 12C6.44772 12 6 11.5523 6 11C6 10.4477 6.44772 10 7 10H17C17.5523 10 18 10.4477 18 11C18 11.5523 17.5523 12 17 12L7 12Z"
                            fill="{{ $routePrefix === 'visitors_pass' ? '#007BFF' : '#F0AD4E' }}" />
                        <path
                            d="M6 15C6 15.5523 6.44772 16 7 16H13C13.5523 16 14 15.5523 14 15C14 14.4477 13.5523 14 13 14H7C6.44772 14 6 14.4477 6 15Z"
                            fill="{{ $routePrefix === 'visitors_pass' ? '#007BFF' : '#F0AD4E' }}" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7 1C6.44772 1 6 1.44772 6 2V3H4C2.89543 3 2 3.89543 2 5V19C2 21.2091 3.79086 23 6 23H18C20.2091 23 22 21.2091 22 19V5C22 3.89543 21.1046 3 20 3H18V2C18 1.44772 17.5523 1 17 1C16.4477 1 16 1.44772 16 2V3H13V2C13 1.44772 12.5523 1 12 1C11.4477 1 11 1.44772 11 2V3H8V2C8 1.44772 7.55228 1 7 1ZM16 5H13V6C13 6.55228 12.5523 7 12 7C11.4477 7 11 6.55228 11 6V5H8V6C8 6.55228 7.55228 7 7 7C6.44772 7 6 6.55228 6 6V5H5C4.44772 5 4 5.44772 4 6V19C4 20.1046 4.89543 21 6 21H18C19.1046 21 20 20.1046 20 19V6C20 5.44772 19.5523 5 19 5H18V6C18 6.55228 17.5523 7 17 7C16.4477 7 16 6.55228 16 6V5Z"
                            fill="{{ $routePrefix === 'visitors_pass' ? '#007BFF' : '#F0AD4E' }}" />
                    </svg>
                </a>
            @endcan



            <!-- document -->
            @can('documents')
                <a href="{{ route('documents') }}"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'elements' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                    x-tooltip.placement.right="'Documents'">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6 1C4.34315 1 3 2.34315 3 4V20C3 21.6569 4.34315 23 6 23H18C19.6569 23 21 21.6569 21 20V8.82843C21 8.03278 20.6839 7.26972 20.1213 6.70711L15.2929 1.87868C14.7303 1.31607 13.9672 1 13.1716 1H6ZM5 4C5 3.44772 5.44772 3 6 3H12V8C12 9.10457 12.8954 10 14 10H19V20C19 20.5523 18.5523 21 18 21H6C5.44772 21 5 20.5523 5 20V4ZM18.5858 8L14 3.41421V8H18.5858Z"
                            fill="{{ $routePrefix === 'elements' ? '#007BFF' : ($routePrefix === 'documents' ? '#007BFF' : '#F0AD4E') }}" />
                    </svg>
                </a>
            @endcan



            @can('settings')
                <a href="{{ route('settings') }}"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'elements' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                    x-tooltip.placement.right="'Settings'">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.59938 6.22413C3.362 4.82033 4.68002 3.64638 6.07306 4.02084L7.12777 4.30435C7.96485 4.52937 8.85305 4.19092 9.31887 3.46943L10.3298 1.90368C11.1077 0.698775 12.8923 0.698773 13.6702 1.90368L14.6811 3.46943C15.1469 4.19092 16.0351 4.52937 16.8722 4.30435L17.9269 4.02084C19.32 3.64638 20.638 4.82033 20.4006 6.22413L20.1405 7.76265C20.0068 8.55335 20.3773 9.3442 21.0747 9.75663L22.0388 10.3268C23.3204 11.0847 23.3204 12.9153 22.0388 13.6732L21.0747 14.2434C20.3773 14.6558 20.0068 15.4467 20.1405 16.2374L20.4006 17.7759C20.638 19.1797 19.32 20.3536 17.9269 19.9792L16.8722 19.6957C16.0351 19.4706 15.1469 19.8091 14.6811 20.5306L13.6702 22.0963C12.8923 23.3012 11.1077 23.3012 10.3298 22.0963L9.31887 20.5306C8.85305 19.8091 7.96485 19.4706 7.12777 19.6957L6.07306 19.9792C4.68002 20.3536 3.362 19.1797 3.59938 17.7759L3.85954 16.2374C3.99324 15.4467 3.62271 14.6558 2.92531 14.2434L1.96116 13.6732C0.679612 12.9153 0.679614 11.0847 1.96116 10.3268L2.92531 9.75663C3.62271 9.3442 3.99324 8.55335 3.85954 7.76265L3.59938 6.22413ZM9.03042 6.14621H6.06085V9.0731L3.09127 12L6.06085 14.9269V17.8538H9.03042L12 20.7807L14.9696 17.8538H17.9392V14.9269L20.9087 12L17.9392 9.0731V6.14621H14.9696L12 3.21931L9.03042 6.14621Z"
                            fill="{{ $routePrefix === 'settings' ? '#007BFF' : '#F0AD4E' }}" />
                        <path
                            d="M16.4515 12C16.4515 14.4247 14.4572 16.3903 11.9971 16.3903C9.53706 16.3903 7.54277 14.4247 7.54277 12C7.54277 9.57528 9.53706 7.60965 11.9971 7.60965C14.4572 7.60965 16.4515 9.57528 16.4515 12ZM9.51963 12C9.51963 13.3486 10.6288 14.4419 11.9971 14.4419C13.3654 14.4419 14.4746 13.3486 14.4746 12C14.4746 10.6514 13.3654 9.5581 11.9971 9.5581C10.6288 9.5581 9.51963 10.6514 9.51963 12Z"
                            fill="#F0AD4E" />
                    </svg>
                </a>
            @endcan


            <!-- roles -->
            @can('roles')
                <a href="{{ route('roles.index') }}"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'elements' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20' }}"
                    x-tooltip.placement.right="'Roles'">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" class="w-6 h-6">
                        <path fill="{{ $routePrefix === 'roles' ? '#007BFF' : '#F0AD4E' }}"
                            d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                    </svg>
                </a>
            @endcan


        </div>

        <!-- Bottom Links -->
        <div class="flex flex-col items-center space-y-3 py-3">

            <!-- Profile -->
            <div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false" class="flex">
                <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
                    <img class="rounded-full" src="{{ asset('images/profile.png') }}" alt="avatar" />
                    <span
                        class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
                </button>
                <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
                    <div
                        class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                        <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                            <div class="avatar h-14 w-14">
                                <img class="rounded-full" src="{{ asset('images/profile.png') }}" alt="avatar" />
                            </div>
                            <div>
                                <a href="#"
                                    class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                    Travis Fuller
                                </a>
                                <p class="text-xs text-slate-400 dark:text-navy-300">
                                    Product Designer
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col pt-2 pb-5">
                            <a href="#"
                                class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>

                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                        Profile
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        Your profile setting
                                    </div>
                                </div>
                            </a>
                            <a href="#"
                                class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-info text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>

                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                        Messages
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        Your messages and tasks
                                    </div>
                                </div>
                            </a>
                            <a href="#"
                                class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>

                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                        Team
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        Your team activity
                                    </div>
                                </div>
                            </a>
                            <a href="#"
                                class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-error text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>

                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                        Activity
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        Your activity and events
                                    </div>
                                </div>
                            </a>
                            <a href="#"
                                class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-success text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>

                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                        Settings
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        Webapp settings
                                    </div>
                                </div>
                            </a>
                            <div class="mt-3 px-4">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
