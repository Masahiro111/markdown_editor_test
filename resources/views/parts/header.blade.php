<nav x-data="{ open: false }" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
                    x-bind:aria-expanded="open.toString()">
                    <span class="sr-only">Open main menu</span>
                    <svg x-description="Icon when menu is closed" x-state:on="Menu open" x-state:off="Menu closed"
                        class="block h-6 w-6" :class="{ 'hidden': open, 'block': !(open) }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-description="Icon when menu is open" x-state:on="Menu open" x-state:off="Menu closed"
                        class="hidden h-6 w-6" :class="{ 'block': open, 'hidden': !(open) }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                        alt="Workflow">
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">

                        <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                            x-state:on="Current" x-state:off="Default" aria-current="page"
                            x-state-description="Current: &quot;bg-gray-900 text-white&quot;, Default: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Home</a>

                        <a href="#"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Comunity</a>

                        <a href="#"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Stock</a>

                        <a href="#"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Post
                            Article</a>

                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button type="button"
                    class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div x-data="Components.menu({ open: false })" x-init="init()"
                    @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)"
                    class="ml-3 relative">
                    <div>
                        <button type="button"
                            class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            id="user-menu-button" x-ref="button" @click="onButtonClick()"
                            @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                            aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                            @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </button>
                    </div>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                        x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical"
                        aria-labelledby="user-menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
                        @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                        @keydown.enter.prevent="open = false; focusButton()"
                        @keyup.space.prevent="open = false; focusButton()">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" x-state:on="Active"
                            x-state:off="Not Active" :class="{ 'bg-gray-100': activeIndex === 0 }" role="menuitem"
                            tabindex="-1" id="user-menu-item-0" @mouseenter="activeIndex = 0"
                            @mouseleave="activeIndex = -1" @click="open = false; focusButton()">My page</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                            :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem" tabindex="-1"
                            id="user-menu-item-1" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = -1"
                            @click="open = false; focusButton()">Draft</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                            :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1"
                            id="user-menu-item-2" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = -1"
                            @click="open = false; focusButton()">Request</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                            :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1"
                            id="user-menu-item-2" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = -1"
                            @click="open = false; focusButton()">Setting</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                            :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1"
                            id="user-menu-item-2" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = -1"
                            @click="open = false; focusButton()">Help</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                            :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1"
                            id="user-menu-item-2" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = -1"
                            @click="open = false; focusButton()">Log out</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden" id="mobile-menu" x-show="open">
        <div class="px-2 pt-2 pb-3 space-y-1">

            <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                x-state:on="Current" x-state:off="Default" aria-current="page"
                x-state-description="Current: &quot;bg-gray-900 text-white&quot;, Default: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Dashboard</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
                x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Team</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
                x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Projects</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
                x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Calendar</a>

        </div>
    </div>
</nav>